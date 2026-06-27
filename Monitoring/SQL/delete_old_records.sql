DELETE FROM public.sm_monitoring_usage_actions
WHERE sm_monusgact_usage_id IN (
	SELECT sm_monusage_id
	FROM public.sm_monitoring_usages
	WHERE sm_monusage_timestamp < '2025-01-01'
)

DELETE FROM public.sm_monitoring_usages
WHERE sm_monusage_timestamp < '2025-01-01'
