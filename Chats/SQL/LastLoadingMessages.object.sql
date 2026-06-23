<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
		'chat_id' => ['required' => true, 'domain' => 'chat_id'],
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

SELECT
    a.*
FROM c5_chat_messages a
WHERE a.c5_chatmessage_tenant_id = <% int $tenant_id %>
	AND a.c5_chatmessage_c5_chat_id = <% int $chat_id %>
	AND a.c5_chatmessage_no_data_model_role_code = 'assistant'
	AND a.c5_chatmessage_is_loading = 1
	AND NOT EXISTS (
		SELECT 1
		FROM c5_chat_messages b
		WHERE b.c5_chatmessage_tenant_id = <% int $tenant_id %>
			AND b.c5_chatmessage_c5_chat_id = <% int $chat_id %>
			AND a.c5_chatmessage_id < b.c5_chatmessage_id
			AND b.c5_chatmessage_no_data_model_role_code <> 'acknowledgement'
	)
