<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id']
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

DO $$
DECLARE tenant_id integer = <% int $tenant_id %>;
BEGIN
    DROP TABLE IF EXISTS temp_table_um_users;
    CREATE TEMPORARY TABLE temp_table_um_users AS
        SELECT
            *
        FROM um_users
        WHERE um_user_tenant_id = tenant_id
            AND um_user_inactive = 0;
END $$;

SELECT * FROM temp_table_um_users ORDER BY um_user_id ASC;