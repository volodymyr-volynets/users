<?php

namespace Numbers\Users\Users\Form\Credential;
class Passwords extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_passwords';
	public $module_code = 'UM';
	public $title = 'U/M Passwords Form';
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
		'values_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Credential\Password\Values',
			'details_pk' => ['um_passwval_name'],
			'required' => true,
			'order' => 800,
		],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_password_code' => [
				'um_password_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
				'um_password_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_password_name' => [
				'um_password_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
		],
		'values_container' => [
			'row1' => [
				'um_passwval_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50, 'onblur' => 'this.form.submit();'],
				'um_passwval_encrypted_password' => ['order' => 2, 'label_name' => 'Value', 'domain' => 'encrypted_password', 'null' => true, 'required' => true, 'percent' => 45],
				'um_passwval_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Passwords',
		'model' => '\Numbers\Users\Users\Model\Credential\Passwords',
		'details' => [
			'\Numbers\Users\Users\Model\Credential\Password\Values' => [
				'name' => 'Values',
				'pk' => ['um_passwval_tenant_id', 'um_passwval_password_code', 'um_passwval_name'],
				'type' => '1M',
				'map' => ['um_password_tenant_id' => 'um_passwval_tenant_id', 'um_password_code' => 'um_passwval_password_code']
			],
		]
	];

	public function loadOriginalValues(& $form) {
		$crypt = new \Crypt();
		foreach ($form->original_values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
			$form->original_values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->decrypt($v['um_passwval_encrypted_password']);
		}
	}

	public function loadValues(& $form) {
		$crypt = new \Crypt();
		foreach ($form->values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
			$form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->decrypt($v['um_passwval_encrypted_password']);
		}
	}

	public function validate(& $form) {
		if (!$form->hasErrors()) {
			$crypt = new \Crypt();
			foreach ($form->values['\Numbers\Users\Users\Model\Credential\Password\Values'] as $k => $v) {
				$form->values['\Numbers\Users\Users\Model\Credential\Password\Values'][$k]['um_passwval_encrypted_password'] = $crypt->encrypt($v['um_passwval_encrypted_password']);
			}
			$form->values['um_password_value_counter'] = count($form->values['\Numbers\Users\Users\Model\Credential\Password\Values']);
		}
	}
}