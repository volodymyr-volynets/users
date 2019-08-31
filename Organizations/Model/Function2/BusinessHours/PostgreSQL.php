<?php

namespace Numbers\Users\Organizations\Model\Function2\BusinessHours;
class PostgreSQL extends \Object\Function2 {
	public $db_link;
	public $db_link_flag;
	public $schema;
	public $module_code = 'ON';
	public $title = 'O/N Business Hours Calculator (PostgreSQL)';
	public $name = 'on_calculate_business_time';
	public $backend = 'PostgreSQL';
	public $header = 'on_calculate_business_time(tenant_id integer, organization_id integer, datetime timestamp, duration interval, business_hours int)';
	public $sql_version = '1.0.1';
	public $definition = 'CREATE OR REPLACE FUNCTION public.on_calculate_business_time(tenant_id integer, organization_id integer, datetime timestamp, duration interval, business_hours int)
	RETURNS timestamp
	LANGUAGE plpgsql
	STRICT
AS $function$
DECLARE
	result timestamp;
	business_hours_rows record;
BEGIN
	/* process business hours */
	IF business_hours <> 0 THEN
		SELECT
			1
		INTO business_hours_rows
		FROM public.on_organization_business_hours a
		INNER JOIN public.in_timezones b ON a.on_orgbhour_tenant_id = b.in_timezone_tenant_id AND a.on_orgbhour_timezone_code = b.in_timezone_code
		WHERE a.on_orgbhour_tenant_id = tenant_id AND a.on_orgbhour_organization_id = organization_id AND a.on_orgbhour_inactive = 0
		LIMIT 1;
		/* if we do not have business hours */
		IF business_hours_rows IS NULL THEN
			result:= datetime + duration;
			RETURN result;
		END IF;
		/* calculate business hours */
		SELECT
			MAX(outter_sub.time_column) time_column
		INTO result
		FROM (
			SELECT
				sub.time_column time_column,
				row_number() OVER() rnum
			FROM (
				SELECT (datetime + generate_series(0, (extract(epoch FROM duration::interval) / 900)::int * 12) * interval \'15 min\') time_column
			) sub
			WHERE sub.time_column::date NOT IN (
					SELECT on_holiday_date
					FROM public.on_organization_holidays a
					WHERE a.on_holiday_tenant_id = tenant_id
						AND a.on_holiday_inactive = 0
						AND EXISTS (
							SELECT
								1
							FROM public.on_organization_holiday_organizations AS inner_a
							WHERE inner_a.on_holiorg_tenant_id = 2
								AND a.on_holiday_id = inner_a.on_holiorg_holiday_id
								AND inner_a.on_holiorg_organization_id = organization_id
						)
				)
				AND EXISTS (
					SELECT
						on_orgbhour_day_id,
						on_orgbhour_start_time,
						on_orgbhour_end_time,
						in_timezone_hours_offset
					FROM public.on_organization_business_hours a
					INNER JOIN public.in_timezones b ON a.on_orgbhour_tenant_id = b.in_timezone_tenant_id AND a.on_orgbhour_timezone_code = b.in_timezone_code
					WHERE a.on_orgbhour_tenant_id = tenant_id
						AND a.on_orgbhour_organization_id = organization_id
						AND a.on_orgbhour_inactive = 0
						AND extract(ISODOW from sub.time_column) = a.on_orgbhour_day_id
						AND sub.time_column::time >= a.on_orgbhour_start_time
						AND sub.time_column::time <= a.on_orgbhour_end_time
				)
		) outter_sub
		WHERE (outter_sub.rnum * \'15 min\'::interval <= duration::interval);
	ELSE
		result:= datetime + duration;
	END IF;
	RETURN result;
END;
$function$;';
}