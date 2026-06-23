<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'code_prefix' => ['required' => true, 'domain' => 'code'],
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

DO $$
DECLARE tenant_id INTEGER = <% int $tenant_id %>;
DECLARE code_prefix VARCHAR = '<% string $code_prefix %>';
DECLARE total_teams INTEGER;
BEGIN
    SELECT COUNT(um_team_id)
    INTO total_teams
    FROM um_user_teams
    WHERE um_team_tenant_id = tenant_id
        AND um_team_code LIKE code_prefix;

    IF total_teams = 0 THEN
        RAISE NOTICE 'The number of teams is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of teams: %', total_teams;

<% php %>
    $tables = [
        ['um_team_apis', 'um_temapi_tenant_id', 'um_temapi_team_id'],
        ['um_team_features', 'um_temfeature_tenant_id', 'um_temfeature_team_id'],
        ['um_team_notifications', 'um_temnoti_tenant_id', 'um_temnoti_team_id'],
        ['um_team_organizations', 'um_temorg_tenant_id', 'um_temorg_team_id'],
        ['um_team_permission_actions', 'um_temperaction_tenant_id', 'um_temperaction_team_id'],
        ['um_team_permission_subresources', 'um_temsubres_tenant_id', 'um_temsubres_team_id'],
        ['um_team_permissions', 'um_temperm_tenant_id', 'um_temperm_team_id'],
        ['um_team_policy_groups', 'um_tempolgrp_tenant_id', 'um_tempolgrp_team_id'],
        ['um_team_policies', 'um_tempolicy_tenant_id', 'um_tempolicy_team_id'],
        ['um_team_system_flags', 'um_temsysflag_tenant_id', 'um_temsysflag_team_id'],
        ['um_user_team_map', 'um_usrtmmap_tenant_id', 'um_usrtmmap_team_id'],

        ['um_user_teams__audit', 'wg_audit_tenant_id', 'wg_audit_team_id'],

        ['um_user_teams', 'um_team_tenant_id', 'um_team_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT um_team_id
            FROM um_user_teams
            WHERE um_team_tenant_id = tenant_id
                AND um_team_code LIKE code_prefix
        );

<% end foreach %>

END $$;
