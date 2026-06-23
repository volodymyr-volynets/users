<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'start_date' => ['required' => true, 'type' => 'date'],
        'end_date' => ['required' => true, 'type' => 'date']
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

SELECT
	COUNT(*) AS counter,
	SUM(um_usrlogin_ip_new) AS ip_new,
	(
		SELECT COUNT(*)
		FROM um_users
		WHERE um_user_tenant_id = <% int $tenant_id %>
			AND um_user_inactive = 0
	) AS total_active_users
FROM public.um_user_logins
WHERE um_usrlogin_tenant_id = <% int $tenant_id %>
	AND um_usrlogin_timestamp::date >= <% string|quote $start_date %>::date
	AND um_usrlogin_timestamp::date <= <% string|quote $end_date %>::date
