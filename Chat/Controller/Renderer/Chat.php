<?php

namespace Numbers\Users\Chat\Controller\Renderer;
class Chat extends \Object\Controller {
	public $title = 'Chat Renderer';
	public function actionIndex() {
		$input = \Request::input();
		// load group
		$input['group_id'] = (int) $input['group_id'];
		$group = \Numbers\Users\Chat\DataSource\Groups::getStatic([
			'where' => [
				'only_this_group_id' => $input['group_id']
			],
			'pk' => null
		]);
		$group_name = $group[0]['ct_group_name'] ?? $group[0]['user_names'][0] ?? null;
		// send bar
		$send_button = \HTML::inputGroup([
			//'left' => \HTML::icon(['type' => 'far fa-smile']),
			'value' => \HTML::input(['id' => 'chat_mini_group_id_' . $input['group_id'] . '_value_field', 'placeholder' => i18n(null, 'Send a message')]),
			'right' => \HTML::a(['href' => 'javascript:void(0);', 'value' => \HTML::icon(['type' => 'fas fa-mouse-pointer'])])
		]);
		$chat_messages = '<div class="chat_mini_message_holder">&nbsp;</div>';
		// build grid
		$grid = [
			'options' => [
				'Header Row' => [
					'Header' => [
						'Groups' => [
							'value' => $chat_messages,
							'options' => [
								'percent' => 100,
							]
						],
					]
				],
				'Body Row' => [
					'Header' => [
						'Groups' => [
							'value' => $send_button,
							'options' => [
								'percent' => 100,
							]
						],
					]
				]
			]
		];
		$grid = \HTML::grid($grid);
		$chat_content = '<div class="chat_mini_main_holder" id="chat_mini_group_id_' . $input['group_id'] . '">' . \HTML::segment([
			'type' => 'info',
			'value' => $grid,
			'header' => [
				'icon' => ['type' => 'far fa-comments'],
				'title' => i18n(null, 'Chat with: [group_name]', ['replace' => ['[group_name]' => $group_name]]) . '<a href="javascript:void(0);" class="pull-right" onclick="Numbers.Chat.closeChat(' . $input['group_id'] . ');">' . \HTML::icon(['type' => 'fas fa-times']) . '</a>'
			]
		]) . '</div>';
		\Layout::renderAs([
			'success' => true,
			'error' => [],
			'data' => $chat_content
		], 'application/json');
	}
}