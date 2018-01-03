<?php

namespace Numbers\Users\Chat\Controller;
class Chat extends \Object\Controller\Authorized {
	public function actionIndex() {
		// include js and css
		\Layout::addJs('/numbers/media_submodules/Numbers_Users_Chat_Media_JS_Base.js');
		\Layout::addCss('/numbers/media_submodules/Numbers_Users_Chat_Media_CSS_Base.css');
		// add new users form
		$form = new \Numbers\Users\Chat\Form\AddNewUser([
			'input' => \Request::input()
		]);
		$form_content = $form->render();
		// groups list
		$groups_content = '';
		$groups = \Numbers\Users\Chat\DataSource\Groups::getStatic([]);
		foreach ($groups as $k => $v) {
			$name = $v['ct_group_name'];
			$icon = '';
			// single user group
			if (count($v['user_names']) == 1) {
				$name = current($v['user_names']);
				$icon_id = current($v['photos']);
				if ($icon_id > 0) {
					$icon.= \Numbers\Users\Documents\Base\Helper\Preview::renderImage($icon_id, 32, 32);
				} else {
					$icon.= \Numbers\Users\Documents\Base\Helper\Preview::renderIcon($name, 32, 32);
				}
			} else { // multi user
				foreach ($v['photos'] as $k2 => $v2) {
					if ($v2 > 0) {
						$icon.= \Numbers\Users\Documents\Base\Helper\Preview::renderImage($v2, 16, 16);
					} else {
						$icon.= \Numbers\Users\Documents\Base\Helper\Preview::renderIcon($v['user_names'][$k2], 16, 16);
					}
				}
			}
			$groups_content.= '<table width="100%"><tr><td width="99%"><a href="javascript:void(0);" onclick="Numbers.Chat.startNewChat(' . $v['ct_group_id'] . ');">' . $icon . ' ' . $name . '</a></td><td width="1%"><a href="javascript:void(0);">' . \HTML::icon(['type' => 'far fa-trash-alt']) . '</a></td></tr></table>';
			$groups_content.= '<hr class="simple" />';
		}
		if (empty($groups)) {
			$groups_content.= \HTML::message(['options' => i18n(null, \Object\Content\Messages::NO_ROWS_FOUND), 'type' => 'warning']);
		}
		// build grid
		$grid = [
			'options' => [
				'Header Row' => [
					'Header' => [
						'Groups' => [
							'value' => \HTML::segment([
								'type' => 'primary',
								'value' => $groups_content,
								'header' => [
									'icon' => ['type' => 'fas fa-users'],
									'title' => i18n(null, 'People / Groups:')
								]
							]),
							'options' => [
								'percent' => 25,
							]
						],
						'Create group' => [
							'value' => \HTML::segment([
								'type' => 'success',
								'value' => $form_content,
								'header' => [
									'icon' => ['type' => 'fas fa-user-plus'],
									'title' => i18n(null, 'Search and add people:')
								]
							]),
							'options' => [
								'percent' => 75,
							]
						]
					]
				]
			]
		];
		echo \HTML::grid($grid);
	}
}