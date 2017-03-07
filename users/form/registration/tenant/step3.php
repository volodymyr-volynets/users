<?php

class numbers_users_users_form_registration_tenant_step3 extends object_form_wrapper_base {
	public $form_link = 'tenant_registration_step3';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'pencil-square-o'],
				'title' => 'Register New Tenant:'
			]
		]
	];
	public $containers = [
		'default' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'default' => [
			'separator_2' => [
				self::separator_horisontal => ['order' => 1, 'row_order' => 50, 'label_name' => 'Set Administrator\'s Password', 'icon' => 'user', 'percent' => 100],
			],
			'um_user_login_password' => [
				'um_user_login_password' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true, 'autofocus' => true, 'empty_value' => true],
			],
			'um_user_login_password2' => [
				'um_user_login_password2' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Password (Repeat)', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => true, 'empty_value' => true],
			],
			self::buttons => [
				self::button_submit => self::button_submit_data
			]
		]
	];

	public $tenant_registration_data;

	public function refresh(& $form) {
		$token = $form->options['input']['token'] ?? null;
		$token_error_message = 'Registration token is not valid or expired!';
		if (empty($token)) {
			$form->error('danger', $token_error_message);
		} else {
			$crypt = new crypt();
			$token_data = $crypt->token_validate($token);
			if ($token_data === false || $token_data['token'] != 'registration.tenant') {
				$form->error('danger', $token_error_message);
			} else {
				$tenant_registration_model = new numbers_users_users_model_registration_tenants();
				$tenant_registration_data = $tenant_registration_model->get([
					'where' => [
						'um_regten_id' => $token_data['id'],
						'um_regten_status' => 0
					],
					'single_row' => true
				]);
				if (empty($tenant_registration_data)) {
					$form->error('danger', $token_error_message);
				} else {
					$this->tenant_registration_data = $tenant_registration_data;
				}
			}
		}
	}

	public function validate(& $form) {
		if ($form->values['um_user_login_password'] != $form->values['um_user_login_password2']) {
			$form->error('danger', 'Passwords do not match!', 'um_user_login_password');
			$form->error('danger', 'Passwords do not match!', 'um_user_login_password2');
		}
	}

	public function save(& $form) {
		$error_message = 'Registration error, please try again later!';
		do {
			$tenant_model = new numbers_tenants_tenants_model_tenants();
			$organization_model = new numbers_users_organizations_model_organizations();
			$tenant_model->db_object->begin();
			// step 1 create a tenant
			$tenant_result = $tenant_model->collection()->merge([
				'tm_tenant_code' => $this->tenant_registration_data['um_regten_tenant_code'],
				'tm_tenant_name' => $this->tenant_registration_data['um_regten_tenant_name'],
				'tm_tenant_email' => $this->tenant_registration_data['um_regten_tenant_email'],
				'tm_tenant_phone' => $this->tenant_registration_data['um_regten_tenant_phone'],
			]);
			if (!$tenant_result['success']) {
				$form->error('danger', $error_message);
				break;
			}
			// use new tenant
			$tenant_id = $tenant_result['new_serials']['tm_tenant_id'];
			tenant::set_override_tenant_id($tenant_id);
			// step 2 create organization
			$organization_result = $organization_model->collection()->merge([
				'on_organization_code' => $this->tenant_registration_data['um_regten_organization_code'],
				'on_organization_name' => $this->tenant_registration_data['um_regten_organization_name'],
			]);
			if (!$organization_result['success']) {
				$form->error('danger', $error_message);
				break;
			}
			// use old tenant
			tenant::set_override_tenant_id(null);
			$tenant_model->db_object->commit();
			// regirect to success step
			request::redirect(application::get('mvc.full') . '?__wizard_step=4');
		} while(0);
		/**
		'um_regten_id' => ['name' => 'Registration #', 'domain' => 'group_id_sequence'],
		'um_regten_inserted' => ['name' => 'Inserted', 'type' => 'timestamp'],
		'um_regten_status' => ['name' => 'Inserted', 'domain' => 'status_id', 'default' => 0],
		// tenant information
		'um_regten_tenant_name' => ['name' => 'Screen Name', 'domain' => 'name'],
		'um_regten_tenant_code' => ['name' => 'Code', 'domain' => 'domain_part'],
		'um_regten_tenant_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'um_regten_tenant_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		// organization
		'um_regten_organization_name' => ['name' => 'Organization Name', 'domain' => 'name'],
		'um_regten_organization_code' => ['name' => 'Organization Code', 'domain' => 'group_code'],
		// user
		'um_regten_user_first_name' => ['name' => 'User First Name', 'domain' => 'personal_name'],
		'um_regten_user_last_name' => ['name' => 'User Last Name', 'domain' => 'personal_name'],
		'um_regten_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'um_regten_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'um_regten_user_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
		'um_regten_user_login_username' => ['name' => 'Username', 'domain' => 'login', 'null' => true],
		 */
		return false;
	}
}