/**
 * Chat
 */
Numbers.Chat = {

	/**
	 * Start new chat
	 *
	 * @param int group_id
	 */
	startNewChat: function(group_id) {
		// see if chat already exists
		if ($('#chat_mini_group_id_' + group_id).length > 0) return;
		// if we have other chats
		var chat_right = 0;
		if ($('.chat_mini_main_holder').length) {
			chat_right = $('.chat_mini_main_holder').length * 300 + ($('.chat_mini_main_holder').length * 5);
		}
		chat_right+= 5;
		// call to get skeleton
		$.ajax({
			url: '/Numbers/Users/Chat/Controller/Renderer/Chat',
			method: 'post',
			data: '__ajax=1&group_id=' + group_id,
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					$('body').prepend(data.data);
					$('#chat_mini_group_id_' + group_id).css('right', chat_right);
				} else {
					print_r2(data.error);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				print_r2(jqXHR.responseText);
			}
		});
	},

	/**
	 * Close chat
	 *
	 * @param int group_id
	 */
	closeChat: function(group_id) {
		$('#chat_mini_group_id_' + group_id).remove();
	}
};