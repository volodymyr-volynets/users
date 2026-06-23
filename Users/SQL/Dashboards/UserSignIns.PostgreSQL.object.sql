<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'start_date' => ['required' => true, 'type' => 'date'],
        'end_date' => ['required' => true, 'type' => 'date']
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

SELECT
	COALESCE(date1, date_list) AS date2,
	COALESCE(counter, 0) AS counter,
	COALESCE(ip_new, 0) AS ip_new
FROM (
	SELECT
		um_usrlogin_timestamp::date date1,
		COUNT(*) AS counter,
		SUM(um_usrlogin_ip_new) ip_new
	FROM public.um_user_logins
	WHERE um_usrlogin_tenant_id = <% int $tenant_id %>
		AND um_usrlogin_timestamp::date >= <% string|quote $start_date %>::date
		AND um_usrlogin_timestamp::date <= <% string|quote $end_date %>::date
	GROUP BY um_usrlogin_timestamp::date
) a
RIGHT JOIN (
	SELECT generate_series(
        <% string|quote $start_date %>::date,
        <% string|quote $end_date %>::date,
        interval '1 day'
    )::date AS date_list
) b ON date1 = date_list
ORDER BY date2
