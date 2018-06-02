<?php

namespace Numbers\Users\APIs\Form;
class Users extends \Object\Form\Wrapper\Base {
	public $form_link = 'ua_users';
	public $module_code = 'UA';
	public $title = 'U/A Users Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'ua_apiusr_id' => [
				'ua_apiusr_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'navigation' => true],
				'ua_apiusr_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
			],
			'ua_apiusr_name' => [
				'ua_apiusr_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 70, 'required' => true],
				'ua_apiusr_hold' => ['order' => 2, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 15],
				'ua_apiusr_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			'ua_apiusr_login_username' => [
				'ua_apiusr_login_username' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Username', 'domain' => 'login', 'null' => true, 'required' => true, 'percent' => 50],
				'ua_apiusr_login_password_new' => ['order' => 2, 'label_name' => 'Password', 'domain' => 'password', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'password', 'empty_value' => true],
			],
			'ua_apiusr_user_id' => [
				'ua_apiusr_user_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Assigned User', 'domain' => 'user_id', 'null' => true, 'required' => true, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];

	public $collection = [
		'name' => 'Users',
		'model' => '\Numbers\Users\APIs\Model\Users',
	];

	public function validate(& $form) {
		if (!$form->values_loaded && empty($form->values['ua_apiusr_login_password_new'])) {
			$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'ua_apiusr_login_password_new');
		}
		if (!$form->hasErrors()) {
			if (!empty($form->values['ua_apiusr_login_password_new'])) {
				$crypt = new \Crypt();
				$form->values['ua_apiusr_login_password'] = $crypt->passwordHash($form->values['ua_apiusr_login_password_new']);
			}
		}
	}
}