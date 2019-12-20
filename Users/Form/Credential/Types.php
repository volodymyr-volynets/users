<?php

namespace Numbers\Users\Users\Form\Credential;
class Types extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_passtype_types';
	public $module_code = 'UM';
	public $title = 'U/M Password Types Form';
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
			'details_key' => '\Numbers\Users\Users\Model\Credential\Type\Values',
			'details_pk' => ['um_passtpval_name'],
			'required' => true,
			'order' => 800,
		],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_passtype_code' => [
				'um_passtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
				'um_passtype_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_passtype_name' => [
				'um_passtype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
		],
		'values_container' => [
			'row1' => [
				'um_passtpval_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50, 'onblur' => 'this.form.submit();'],
				'um_passtpval_encrypted_password' => ['order' => 2, 'label_name' => 'Value', 'domain' => 'encrypted_password', 'null' => true, 'required' => 'c', 'percent' => 40],
				'um_passtpval_preset' => ['order' => 3, 'label_name' => 'Preset', 'type' => 'boolean', 'percent' => 5],
				'um_passtpval_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_passtpval_timestamp' => ['label_name' => 'Timestamp', 'type' => 'timestamp', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Password Types',
		'model' => '\Numbers\Users\Users\Model\Credential\Types',
		'details' => [
			'\Numbers\Users\Users\Model\Credential\Type\Values' => [
				'name' => 'Values',
				'pk' => ['um_passtpval_tenant_id', 'um_passtpval_passtype_code', 'um_passtpval_name'],
				'type' => '1M',
				'map' => ['um_passtype_tenant_id' => 'um_passtpval_tenant_id', 'um_passtype_code' => 'um_passtpval_passtype_code']
			],
		]
	];

	public function loadOriginalValues(& $form) {
		$crypt = new \Crypt();
		foreach ($form->original_values['\Numbers\Users\Users\Model\Credential\Type\Values'] as $k => $v) {
			if (isset($v['um_passtpval_encrypted_password'])) {
				$form->original_values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_encrypted_password'] = $crypt->decrypt($v['um_passtpval_encrypted_password']);
			}
		}
	}

	public function loadValues(& $form) {
		$crypt = new \Crypt();
		foreach ($form->values['\Numbers\Users\Users\Model\Credential\Type\Values'] as $k => $v) {
			if (isset($v['um_passtpval_encrypted_password'])) {
				$form->values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_encrypted_password'] = $crypt->decrypt($v['um_passtpval_encrypted_password']);
			}
		}
	}

	public function validate(& $form) {
		if (!$form->hasErrors()) {
			$crypt = new \Crypt();
			foreach ($form->values['\Numbers\Users\Users\Model\Credential\Type\Values'] as $k => $v) {
				if (!empty($v['um_passtpval_preset'])) {
					$form->values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_encrypted_password'] = null;
				} else {
					if (empty($v['um_passtpval_encrypted_password'])) {
						$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, "\Numbers\Users\Users\Model\Credential\Type\Values[{$k}][um_passtpval_encrypted_password]");
					}
				}
				if (isset($v['um_passtpval_encrypted_password'])) {
					$form->values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_encrypted_password'] = $crypt->encrypt($v['um_passtpval_encrypted_password']);
				}
				// timestamp
				if (empty($form->values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_timestamp'])) {
					$form->values['\Numbers\Users\Users\Model\Credential\Type\Values'][$k]['um_passtpval_timestamp'] = \Format::now('timestamp');
				}
			}
			$form->values['um_passtype_value_counter'] = count($form->values['\Numbers\Users\Users\Model\Credential\Type\Values']);
		}
	}
}