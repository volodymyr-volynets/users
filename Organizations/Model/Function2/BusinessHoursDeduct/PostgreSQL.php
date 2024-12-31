<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Function2\BusinessHoursDeduct;

use Object\Function2;

class PostgreSQL extends Function2
{
    public $db_link;
    public $db_link_flag;
    public $schema;
    public $module_code = 'ON';
    public $title = 'O/N Business Hours Deduction Calculator (PostgreSQL)';
    public $name = 'on_calculate_business_deduct';
    public $backend = 'PostgreSQL';
    public $header = 'on_calculate_business_deduct(tenant_id integer, organization_id integer, datetime timestamp, duration interval, business_hours int)';
    public $sql_version = '1.0.0';
    public $definition = 'CREATE OR REPLACE FUNCTION public.on_calculate_business_deduct(tenant_id integer, organization_id integer, datetime timestamp, duration interval, business_hours int)
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
		WHERE a.on_orgbhour_tenant_id = tenant_id AND a.on_orgbhour_organization_id = organization_id AND a.on_orgbhour_inactive = 0
		LIMIT 1;
		/* if we do not have business hours */
		IF business_hours_rows IS NULL THEN
			result:= datetime - duration;
			RETURN result;
		END IF;
		/* calculate business hours */
		SELECT
			MIN(outter_sub.time_column) time_column
		INTO result
		FROM (
			SELECT
				sub.time_column time_column,
				row_number() OVER() rnum
			FROM (
				SELECT (datetime - generate_series(0, (extract(epoch FROM duration::interval) / 60)::int * 12 + 10080) * interval \'1 min\') time_column
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
							WHERE inner_a.on_holiorg_tenant_id = tenant_id
								AND a.on_holiday_id = inner_a.on_holiorg_holiday_id
								AND inner_a.on_holiorg_organization_id = organization_id
						)
				)
				AND EXISTS (
					SELECT
						1
					FROM public.on_organization_business_hours a
					WHERE a.on_orgbhour_tenant_id = tenant_id
						AND a.on_orgbhour_organization_id = organization_id
						AND a.on_orgbhour_inactive = 0
						AND extract(ISODOW from sub.time_column) = a.on_orgbhour_day_id
						AND sub.time_column::time >= a.on_orgbhour_start_time
						AND sub.time_column::time <= a.on_orgbhour_end_time
				)
		) outter_sub
		WHERE (outter_sub.rnum * \'1 min\'::interval <= duration::interval);
	ELSE
		result:= datetime - duration;
	END IF;
	RETURN result;
END;
$function$;';
}
