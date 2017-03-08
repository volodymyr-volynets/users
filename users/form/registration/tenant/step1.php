<?php

class numbers_users_users_form_registration_tenant_step1 extends object_form_wrapper_base {
	public $form_link = 'tenant_registration_step1';
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
			'um_regten_tenant_name' => [
				'um_regten_tenant_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Tenant Name', 'domain' => 'name', 'percent' => 50, 'required' => true, 'autofocus' => true],
				'um_regten_tenant_code' => ['order' => 2, 'label_name' => 'Domain Name', 'domain' => 'domain_part', 'percent' => 50, 'required' => true, 'validator_method' => 'object_validator_uppercase2::validate'],
			],
			'um_regten_tenant_email' => [
				'um_regten_tenant_email' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Email', 'domain' => 'email', 'percent' => 50, 'required' => true],
				'um_regten_tenant_phone' => ['order' => 2, 'label_name' => 'Phone', 'domain' => 'phone', 'percent' => 50]
			],
			'separator_1' => [
				self::separator_horisontal => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization', 'icon' => 'sitemap', 'percent' => 100],
			],
			'on_organization_name' => [
				'um_regten_organization_name' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Organization Name', 'domain' => 'name', 'percent' => 50, 'required' => true],
				'um_regten_organization_code' => ['order' => 2, 'label_name' => 'Organization Code', 'domain' => 'group_code', 'percent' => 50, 'required' => true],
			],
			'separator_2' => [
				self::separator_horisontal => ['order' => 1, 'row_order' => 500, 'label_name' => 'Administrator', 'icon' => 'user', 'percent' => 100],
			],
			'um_regten_user_first_name' => [
				'um_regten_user_first_name' => ['order' => 1, 'row_order' => 600, 'label_name' => 'First Name', 'domain' => 'personal_name', 'percent' => 50, 'required' => true],
				'um_regten_user_last_name' => ['order' => 2, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'percent' => 50, 'required' => true]
			],
			'um_user_email' => [
				'um_regten_user_email' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Email', 'domain' => 'email', 'percent' => 50, 'required' => true],
				'um_regten_user_login_username' => ['order' => 2, 'label_name' => 'Username', 'domain' => 'login', 'percent' => 50, 'null' => true]
			],
			'um_regten_user_phone' => [
				'um_regten_user_phone' => ['order' => 1, 'row_order' => 800, 'label_name' => 'Phone', 'domain' => 'phone', 'percent' => 50],
				'um_regten_user_cell' => ['order' => 2, 'label_name' => 'Cell', 'domain' => 'phone', 'percent' => 50]
			],
			'captcha' => [
				'captcha' => ['order' => 1, 'row_order' => 900, 'label_name' => 'Security Question', 'type' => 'text', 'required' => true, 'percent' => 50, 'method' => 'captcha', 'empty_value' => true],
			],
			self::buttons => [
				self::button_submit => self::button_submit_data
			]
		]
	];

	public function validate(& $form) {
		if (!empty($form->values['um_regten_tenant_code'])) {
			$tenant_result = numbers_tenants_tenants_model_tenants::get_static([
				'where' => [
					'tm_tenant_code' => $form->values['um_regten_tenant_code']
				],
				'single_row' => true
			]);
			if (!empty($tenant_result)) {
				$form->error('danger', 'This domain name is already taken!', 'um_regten_tenant_code');
			}
		}
	}

	public function save(& $form) {
		// save the record
		$form->values['um_regten_inserted'] = format::now('timestamp');
		$result = numbers_users_users_model_registration_tenants::collection_static()->merge($form->values);
		if (!$result['success']) {
			$form->error('danger', 'Registration error, please try again later!');
			return false;
		} else {
			// send email message
			$subject = "Tenant Registration Confirmation";
			$message = <<<TTT
Thank you for registering new tenant,

<a href="[url]" target="_parent">Click here</a> to continue the registration process.

Or paste this into a browser:

[url]

Please note that this link is only active for [token_valid_hours] hours after receipt. After this time limit has expired the token will not work and you will need to resubmit the registration request.

Thank you!
TTT;
			// generate token
			$crypt = new crypt();
			$replaces = [
				'[url]' => application::get('mvc.full_with_host') . '?__wizard_step=3&token=' . $crypt->token_create($result['new_serials']['um_regten_id'], 'registration.tenant'),
				'[token_valid_hours]' => $crypt->object->token_valid_hours
			];
			// send mail
			$mail_result = mail::send_simple($form->values['um_regten_user_email'], i18n(null, $subject), i18n(null, nl2br($message), ['replace' => $replaces]));
			if (!$mail_result['success']) {
				$form->error('danger', 'Registration error, please try again later!');
				return false;
			}
			$mask = new object_mask_email();
			request::redirect(application::get('mvc.full') . '?__wizard_step=2&email=' . $mask->mask($form->values['um_regten_user_email']));
		}
		return false;
	}
}