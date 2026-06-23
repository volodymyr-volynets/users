BEGIN;

DELETE FROM public.c5_chat_user_thread_unreads;
UPDATE public.c5_chat_users SET c5_chatuser_unread_c5_chatmessage_id = 0, c5_chatuser_unread_count = 0;

DELETE FROM public.c5_chat_messages__documents;
DELETE FROM public.c5_chat_message_reactions;
DELETE FROM public.c5_chat_message_reads;
DELETE FROM public.c5_chat_messages;

-- batches
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHAT_CONVERSATION');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHAT_CONVERSATION');
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHAT_THREAD');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHAT_THREAD');
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHATS');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHATS');

-- sessions with AI
DELETE FROM public.c5_chat_invites;
DELETE FROM public.c5_chat_sessions;
DELETE FROM public.c5_chat_users WHERE c5_chatuser_c5_chat_id IN (SELECT c5_chat_id FROM public.c5_chats WHERE c5_chat_c5_chattype_code = 'GENERAL');
DELETE FROM public.c5_chats WHERE c5_chat_c5_chattype_code = 'GENERAL';

COMMIT;