<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id']
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

SELECT
    COUNT(*) AS counter
FROM um_users
WHERE um_user_tenant_id = <% int $tenant_id %>
    AND um_user_inactive = 0
