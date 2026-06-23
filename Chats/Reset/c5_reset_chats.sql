BEGIN;

DELETE FROM public.c5_chat_message_reactions;
DELETE FROM public.c5_chat_message_reads;
DELETE FROM public.c5_chat_messages;

DELETE FROM public.c5_chat_users;
DELETE FROM public.c5_chat_sessions;
DELETE FROM public.c5_chat_invites;
-- groups
DELETE FROM public.c5_chat_group_channels;
DELETE FROM public.c5_chat_group_map;
DELETE FROM public.c5_chat_group_users;
DELETE FROM public.c5_chat_groups;
-- chats
DELETE FROM public.c5_chats;
-- channels
DELETE FROM public.c5_chat_channels;
-- batches
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHAT_CONVERSATION');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHAT_CONVERSATION');
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHAT_THREAD');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHAT_THREAD');
DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code IN ('C5_CHATS');
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code IN ('C5_CHATS');

COMMIT;