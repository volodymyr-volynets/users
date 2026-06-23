<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'start_date' => ['required' => true, 'type' => 'date'],
        'end_date' => ['required' => true, 'type' => 'date']
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

SELECT
	SUM(counter) AS total_sessions,
	SUM(active_sessions) AS active_sessions,
	SUM(user_ids) AS distinct_users
FROM (
	SELECT
		sm_session_started::date AS date2,
		COUNT(*) AS counter,
		COUNT(*) AS active_sessions,
		COUNT (DISTINCT sm_session_user_id) AS user_ids
	FROM public.sm_sessions a
	WHERE sm_session_tenant_id = <% int $tenant_id %>
		AND sm_session_started::date >= <% string|quote $start_date %>
		AND sm_session_started::date <= <% string|quote $end_date %>
	GROUP BY sm_session_started::date

	UNION ALL

	SELECT
		sm_sesshist_started::date AS date2,
		COUNT(*) AS counter,
		0 AS active_sessions,
		COUNT (DISTINCT sm_sesshist_user_id) AS user_ids
	FROM public.sm_session_history b
	WHERE sm_sesshist_tenant_id = <% int $tenant_id %>
		AND sm_sesshist_started::date >= <% string|quote $start_date %>
		AND sm_sesshist_started::date <= <% string|quote $end_date %>
	GROUP BY sm_sesshist_started::date
) outer_a
