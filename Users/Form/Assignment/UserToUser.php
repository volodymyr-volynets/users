<?php

namespace Numbers\Users\Users\Form\Assignment;
class UserToUser extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_user_to_user_assignment';
	public $module_code = 'UM';
	public $title = 'U/M User To User Assignment Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_usrassign_assignusrtype_id' => [
				'um_usrassign_assignusrtype_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment', 'domain' => 'assignment_id', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_usrassign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_usrassign_parent_role_id' => [
				'um_usrassign_parent_role_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent Role', 'domain' => 'role_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles', 'readonly' => true],
				'um_usrassign_child_role_id' => ['order' => 2, 'label_name' => 'Child Role', 'domain' => 'role_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles', 'readonly' => true],
			],
			'um_usrassign_parent_user_id' => [
				'um_usrassign_parent_user_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parent User', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'options_depends' => ['selected_roles' => 'um_usrassign_parent_role_id']],
				'um_usrassign_child_user_id' => ['order' => 2, 'label_name' => 'Child User', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'options_depends' => ['selected_roles' => 'um_usrassign_child_role_id']],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'User To User Assignment',
		'model' => '\Numbers\Users\Users\Model\User\Assignments'
	];

	public function refresh(& $form) {
		if (!empty($form->misc_settings['__form_onchange_field_values_key'][0])) {
			if ($form->misc_settings['__form_onchange_field_values_key'][0] == 'um_usrassign_assignusrtype_id') {
				$data = \Numbers\Users\Users\Model\User\Assignment\Types::getStatic([
					'where' => [
						'um_assignusrtype_id' => $form->values['um_usrassign_assignusrtype_id'],
					],
					'pk' => null,
					'single_row' => true,
				]);
				$form->values['um_usrassign_parent_role_id'] = $data['um_assignusrtype_parent_role_id'];
				$form->values['um_usrassign_child_role_id'] = $data['um_assignusrtype_child_role_id'];
			}
		}
	}

	public function validate(& $form) {
		if ($form->hasErrors()) return;
		$data = \Numbers\Users\Users\Model\User\Assignment\Types::getStatic([
			'where' => [
				'um_assignusrtype_id' => $form->values['um_usrassign_assignusrtype_id'],
			],
			'pk' => null,
			'single_row' => true,
		]);
		if (empty($data['um_assignusrtype_multiple'])) {
			$other_users = \Numbers\Users\Users\Model\User\Assignments::getStatic([
				'where' => [
					'um_usrassign_assignusrtype_id' => $form->values['um_usrassign_assignusrtype_id'],
					'um_usrassign_parent_user_id' => $form->values['um_usrassign_parent_user_id'],
					'um_usrassign_child_user_id;<>' => $form->values['um_usrassign_child_user_id'],
				],
				'pk' => null,
				'limit' => 1,
			]);
			if (!empty($other_users)) {
				$form->error(DANGER, \Numbers\Users\Users\Helper\Messages::ASSIGNMENT_EXISTS, 'um_usrassign_parent_user_id');
			}
		}
	}
}