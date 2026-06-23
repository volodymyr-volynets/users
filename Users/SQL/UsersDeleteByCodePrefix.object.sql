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
DECLARE total_users INTEGER;
BEGIN
    SELECT COUNT(um_user_id)
    INTO total_users
    FROM um_users
    WHERE um_user_tenant_id = tenant_id
        AND um_user_code LIKE code_prefix;

    IF total_users = 0 THEN
        RAISE NOTICE 'The number of users is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of users: %', total_users;

<% php %>
    $tables = [
        ['um_user_alerts', 'um_usralert_tenant_id', 'um_usralert_um_user_id'],
        ['um_user_api_methods', 'um_usrapmethod_tenant_id', 'um_usrapmethod_user_id'],
        ['um_user_apis', 'um_usrapi_tenant_id', 'um_usrapi_user_id'],
        ['um_user_assigments', 'um_usrassign_tenant_id', 'um_usrassign_parent_user_id'],
        ['um_user_assigments', 'um_usrassign_tenant_id', 'um_usrassign_child_user_id'],
        ['um_user_assignment_customers', 'um_assigncustomer_tenant_id', 'um_assigncustomer_user_id'],
        ['um_user_features', 'um_usrfeature_tenant_id', 'um_usrfeature_user_id'],
        ['um_user_group_map', 'um_usrgrmap_tenant_id', 'um_usrgrmap_user_id'],
        ['um_user_integration_mappings', 'um_usrintegmap_tenant_id', 'um_usrintegmap_user_id'],
        ['um_user_internalization', 'um_usri18n_tenant_id', 'um_usri18n_user_id'],
        ['um_user_languages', 'um_usrsplang_tenant_id', 'um_usrsplang_user_id'],
        ['um_user_linked_accounts', 'um_usrlinked_tenant_id', 'um_usrlinked_user_id'],
        ['um_user_logins', 'um_usrlogin_tenant_id', 'um_usrlogin_user_id'],
        ['um_user_mentions', 'um_usrmention_tenant_id', 'um_usrmention_user_id'],
        ['um_user_notifications', 'um_usrnoti_tenant_id', 'um_usrnoti_user_id'],
        ['um_user_organizations', 'um_usrorg_tenant_id', 'um_usrorg_user_id'],
        ['um_user_permission_actions', 'um_usrperaction_tenant_id', 'um_usrperaction_user_id'],
        ['um_user_permission_subresources', 'um_usrsubres_tenant_id', 'um_usrsubres_user_id'],
        ['um_user_permissions', 'um_usrperm_tenant_id', 'um_usrperm_user_id'],
        ['um_user_piis', 'um_usrpii_tenant_id', 'um_usrpii_user_id'],
        ['um_user_policy_groups', 'um_usrpolgrp_tenant_id', 'um_usrpolgrp_user_id'],
        ['um_user_policies', 'um_usrpolicy_tenant_id', 'um_usrpolicy_user_id'],
        ['um_user_preferences', 'um_usrpreference_tenant_id', 'um_usrpreference_user_id'],
        ['um_user_resource_favorites', 'um_usrresfavorite_tenant_id', 'um_usrresfavorite_user_id'],
        ['um_user_resource_visited', 'um_usrresvisit_tenant_id', 'um_usrresvisit_user_id'],
        ['um_user_roles', 'um_usrrol_tenant_id', 'um_usrrol_user_id'],
        ['um_user_security_answers', 'um_usrsecanswer_tenant_id', 'um_usrsecanswer_user_id'],
        ['um_user_skills', 'um_usrskill_tenant_id', 'um_usrskill_user_id'],
        ['um_user_system_flags', 'um_usrsysflag_tenant_id', 'um_usrsysflag_user_id'],
        ['um_user_team_map', 'um_usrtmmap_tenant_id', 'um_usrtmmap_user_id'],

        ['um_users__addresses__attributes', 'wg_attribute_tenant_id', 'wg_attribute_user_id'],
        ['um_users__addresses', 'wg_address_tenant_id', 'wg_address_user_id'],
        ['um_users__attributes', 'wg_attribute_tenant_id', 'wg_attribute_user_id'],
        ['um_users__audit', 'wg_audit_tenant_id', 'wg_audit_user_id'],
        ['um_users__comments', 'wg_comment_tenant_id', 'wg_comment_user_id'],
        ['um_users__documents', 'wg_document_tenant_id', 'wg_document_user_id'],
        ['um_users__tags', 'wg_tag_tenant_id', 'wg_tag_user_id'],

        ['um_users', 'um_user_tenant_id', 'um_user_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT um_user_id
            FROM um_users
            WHERE um_user_tenant_id = tenant_id
                AND um_user_code LIKE code_prefix
        );

<% end foreach %>

END $$;
