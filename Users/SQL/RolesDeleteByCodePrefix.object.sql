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
DECLARE total_roles INTEGER;
BEGIN
    SELECT COUNT(um_role_id)
    INTO total_roles
    FROM um_roles
    WHERE um_role_tenant_id = tenant_id
        AND um_role_code LIKE code_prefix;

    IF total_roles = 0 THEN
        RAISE NOTICE 'The number of roles is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of roles: %', total_roles;

<% php %>
    $tables = [
        ['um_role_api_methods', 'um_rolapmethod_tenant_id', 'um_rolapmethod_role_id'],
        ['um_role_apis', 'um_rolapi_tenant_id', 'um_rolapi_role_id'],
        ['um_role_children', 'um_rolrol_tenant_id', 'um_rolrol_parent_role_id'],
        ['um_role_children', 'um_rolrol_tenant_id', 'um_rolrol_child_role_id'],
        ['um_role_features', 'um_rolfeature_tenant_id', 'um_rolfeature_role_id'],
        ['um_role_notifications', 'um_rolnoti_tenant_id', 'um_rolnoti_role_id'],
        ['um_role_organizations', 'um_rolorg_tenant_id', 'um_rolorg_role_id'],
        ['um_role_permission_actions', 'um_rolperaction_tenant_id', 'um_rolperaction_role_id'],
        ['um_role_permission_subresources', 'um_rolsubres_tenant_id', 'um_rolsubres_role_id'],
        ['um_role_permissions', 'um_rolperm_tenant_id', 'um_rolperm_role_id'],
        ['um_role_policy_groups', 'um_rolpolgrp_tenant_id', 'um_rolpolgrp_role_id'],
        ['um_role_policies', 'um_rolpolicy_tenant_id', 'um_rolpolicy_role_id'],
        ['um_role_system_flags', 'um_rolsysflag_tenant_id', 'um_rolsysflag_role_id'],
        ['um_user_roles', 'um_usrrol_tenant_id', 'um_usrrol_role_id'],

        ['um_roles__audit', 'wg_audit_tenant_id', 'wg_audit_role_id'],

        ['um_roles', 'um_role_tenant_id', 'um_role_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT um_role_id
            FROM um_roles
            WHERE um_role_tenant_id = tenant_id
                AND um_role_code LIKE code_prefix
        );

<% end foreach %>

END $$;
