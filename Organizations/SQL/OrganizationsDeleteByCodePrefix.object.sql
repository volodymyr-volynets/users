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
DECLARE total_orgs INTEGER;
BEGIN
    SELECT COUNT(on_organization_id)
    INTO total_orgs
    FROM on_organizations
    WHERE on_organization_tenant_id = tenant_id
        AND on_organization_code LIKE code_prefix;

    IF total_orgs = 0 THEN
        RAISE NOTICE 'The number of organizations is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of organizations: %', total_orgs;

<% php %>
    $tables = [
        ['on_organization_type_map', 'on_orgtpmap_tenant_id', 'on_orgtpmap_organization_id'],
        ['on_organization_integration_mappings', 'on_orgintegmap_tenant_id', 'on_orgintegmap_organization_id'],
        ['on_organization_holiday_organizations', 'on_holiorg_tenant_id', 'on_holiorg_organization_id'],
        ['on_organization_business_hours', 'on_orgbhour_tenant_id', 'on_orgbhour_organization_id'],

        ['on_organizations__tags', 'wg_tag_tenant_id', 'wg_tag_organization_id'],
        ['on_organizations__documents', 'wg_document_tenant_id', 'wg_document_organization_id'],
        ['on_organizations__comments', 'wg_comment_tenant_id', 'wg_comment_organization_id'],
        ['on_organizations__audit', 'wg_audit_tenant_id', 'wg_audit_organization_id'],
        ['on_organizations__attributes', 'wg_attribute_tenant_id', 'wg_attribute_organization_id'],
        ['on_organizations__addresses__attributes', 'wg_attribute_tenant_id', 'wg_attribute_organization_id'],
        ['on_organizations__addresses', 'wg_address_tenant_id', 'wg_address_organization_id'],

        ['on_organizations', 'on_organization_tenant_id', 'on_organization_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT on_organization_id
            FROM on_organizations
            WHERE on_organization_tenant_id = tenant_id
                AND on_organization_code LIKE code_prefix
        );

<% end foreach %>

END $$;
