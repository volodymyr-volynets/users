<?php

namespace Numbers\Users\Users\Form;
class Users extends \Object\Form\Wrapper\Base {
	public $form_link = 'users';
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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
		'permissions_container' => ['default_row_type' => 'grid', 'order' => 34000],
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Roles',
			'details_pk' => ['um_usrrol_role_id'],
			'required' => true,
			'order' => 35000
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Organizations',
			'details_pk' => ['um_usrorg_organization_id'],
			'required' => true,
			'order' => 35001
		],
		'internalization_container' => [
			'type' => 'details',
			'details_11' => true,
			'details_rendering_type' => 'grid_with_label',
			'details_key' => '\Numbers\Users\Users\Model\User\Internalization',
			'details_pk' => ['um_usri18n_user_id'],
		],
		'assignments_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\Users\Users\Model\User\Assignment\Virtual',
			'details_pk' => ['um_usrassign_assignment_code'],
			'details_cannot_delete' => true,
			'details_empty_warning_message' => true,
			'order' => 35002
		],
		'assignments_reverse_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse',
			'details_pk' => ['um_usrassign_assignment_code'],
			'details_cannot_delete' => true,
			'details_empty_warning_message' => true,
			'order' => 35003
		]
	];
	public $rows = [
		'top' => [
			'um_user_id' => ['order' => 100],
			'um_user_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'login' => ['order' => 200, 'label_name' => 'Login'],
			'organizations' => ['order' => 300, 'label_name' => 'Organizations'],
			'roles' => ['order' => 400, 'label_name' => 'Roles'],
			'assignments' => ['order' => 500, 'label_name' => 'Assignments'],
			\Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA,
			\Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA,
		]
	];
	public $elements = [
		'top' => [
			'um_user_id' => [
				'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
			],
			'um_user_name' => [
				'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
				'contact' => ['container' => 'contact_container', 'order' => 200]
			],
			'login' => [
				'login' => ['container' => 'login_container', 'order' => 100],
				'separator' => ['container' => 'separator_container', 'order' => 200],
				'internalization' => ['container' => 'internalization_container', 'order' => 300],
			],
			'roles' => [
				'roles' => ['container' => 'roles_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'assignments' => [
				'assignments' => ['container' => 'assignments_container', 'order' => 100],
				'separator_container' => ['container' => 'separator_container', 'order' => 200],
				'assignments_reverse' => ['container' => 'assignments_reverse_container', 'order' => 300],
			]
		],
		'general_container' => [
			'um_user_type_id' => [
				'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
				'\Numbers\Users\Users\Model\User\Group\Map' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'um_usrgrmap_group_id', 'percent' => 70, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Users\Model\User\Groups::optionsActive'],
				'um_user_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
				'um_user_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_user_title' => [
				'um_user_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
				'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
				'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
			],
			'um_user_company' => [
				'um_user_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
			],
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'envelope-o', 'percent' => 100],
			],
			'um_user_email' => [
				'um_user_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'um_user_phone' => [
				'um_user_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'um_user_cell' => [
				'um_user_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			]
		],
		'login_container' => [
			'um_user_login_enabled' => [
				'um_user_login_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Login Enabled', 'type' => 'boolean', 'percent' => 50],
				'um_user_login_username' => ['order' => 2, 'label_name' => 'Username', 'domain' => 'login', 'null' => true, 'percent' => 50, 'required' => 'c']
			],
			'um_user_login_last_set' => [
				'um_user_login_last_set' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Password Last Changed', 'type' => 'date', 'persistent' => true, 'method' => 'calendar', 'calendar_icon' => 'right', 'percent' => 50, 'readonly' => true],
				'um_user_login_password_new' => ['order' => 2, 'label_name' => 'Reset Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => false, 'empty_value' => true]
			]
		],
		'separator_container' => [
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'label_name' => 'Internalization', 'icon' => 'adjust', 'percent' => 100],
			],
		],
		'internalization_container' => [
			'um_usri18n_group_id' => [
				'um_usri18n_group_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Group', 'domain' => 'group_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Groups::optionsActive'],
			],
			'um_usri18n_language_code' => [
				'um_usri18n_language_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Language', 'domain' => 'language_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes::optionsActive'],
				'um_usri18n_locale_code' => ['order' => 2, 'label_name' => 'Locale', 'domain' => 'locale_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Locales::optionsActive'],
			],
			'um_usri18n_timezone_code' => [
				'um_usri18n_timezone_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Timezone', 'domain' => 'timezone_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Timezones::optionsActive'],
				'um_usri18n_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive'],
			],
			'format' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 500, 'label_name' => 'Format', 'icon' => 'hourglass-o', 'percent' => 100],
			],
			'um_usri18n_format_date' => [
				'um_usri18n_format_date' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Date Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
				'um_usri18n_format_time' => ['order' => 2, 'label_name' => 'Time Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
				'um_usri18n_format_datetime' => ['order' => 3, 'label_name' => 'Datetime Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
				'um_usri18n_format_timestamp' => ['order' => 4, 'label_name' => 'Timestamp Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s.u', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds']
			],
			'um_usri18n_format_amount_frm' => [
				'um_usri18n_format_amount_frm' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Amounts In Forms', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts'],
				'um_usri18n_format_amount_fs' => ['order' => 2, 'label_name' => 'Amounts In Financial Statement', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts']
			]
		],
		'roles_container' => [
			'row1' => [
				'um_usrrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_usrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_usrorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'assignments_container' => [
			'row1' => [
				'um_usrassign_assignment_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment Type', 'domain' => 'type_code', 'readonly' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types'],
				'um_usrassign_multiple' => ['order' => 3, 'label_name' => 'Multiple', 'type' => 'boolean', 'readonly' => true, 'percent' => 5],
			],
			'row2' => [
				'um_usrassign_child_user_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'User(s)', 'domain' => 'user_id', 'multiple_column' => 'um_usrassign_child_user_id', 'percent' => 100, 'method' => 'multiselect', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'options_depends' => ['selected_roles' => 'um_usrassign_child_role_id'], 'options_params' => ['skip_acl' => true]]
			],
			self::HIDDEN => [
				'um_usrassign_parent_role_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent Role #', 'domain' => 'role_id'],
				'um_usrassign_child_role_id' => ['order' => 2, 'label_name' => 'Child Role #', 'domain' => 'role_id'],
				'um_usrassign_mandatory' => ['order' => 2, 'label_name' => 'Mandatory', 'type' => 'boolean', 'readonly' => true, 'percent' => 5],
			]
		],
		'separator_container' => [
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'label_name' => 'Other Assignments', 'icon' => 'cogs', 'percent' => 100],
			],
		],
		'assignments_reverse_container' => [
			'row1' => [
				'um_usrassign_assignment_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment Type', 'domain' => 'type_code', 'readonly' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types'],
				'um_usrassign_mandatory' => ['order' => 2, 'label_name' => 'Mandatory', 'type' => 'boolean', 'readonly' => true, 'percent' => 5],
				'um_usrassign_multiple' => ['order' => 3, 'label_name' => 'Multiple', 'type' => 'boolean', 'readonly' => true, 'percent' => 5],
			],
			'row2' => [
				'um_usrassign_parent_user_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'User(s)', 'domain' => 'user_id', 'multiple_column' => 'um_usrassign_parent_user_id', 'percent' => 100, 'method' => 'multiselect', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive', 'options_depends' => ['selected_roles' => 'um_usrassign_parent_role_id'], 'options_params' => ['skip_acl' => true]]
			],
			self::HIDDEN => [
				'um_usrassign_parent_role_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent Role #', 'domain' => 'role_id'],
				'um_usrassign_child_role_id' => ['order' => 2, 'label_name' => 'Child Role #', 'domain' => 'role_id'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Users',
		'model' => '\Numbers\Users\Users\Model\Users',
		'details' => [
			'\Numbers\Users\Users\Model\User\Group\Map' => [
				'name' => 'Groups',
				'pk' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrgrmap_tenant_id', 'um_user_id' => 'um_usrgrmap_user_id']
			],
			'\Numbers\Users\Users\Model\User\Roles' => [
				'name' => 'Roles',
				'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id']
			],
			'\Numbers\Users\Users\Model\User\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id']
			],
			'\Numbers\Users\Users\Model\User\Internalization' => [
				'name' => 'Internalization',
				'pk' => ['um_usri18n_tenant_id', 'um_usri18n_user_id'],
				'type' => '11',
				'map' => ['um_user_tenant_id' => 'um_usri18n_tenant_id', 'um_user_id' => 'um_usri18n_user_id']
			],
			'\Numbers\Users\Users\Model\User\Assignments' => [
				'name' => 'Assignments',
				'pk' => ['um_usrassign_tenant_id', 'um_usrassign_assignment_code', 'um_usrassign_parent_user_id', 'um_usrassign_child_user_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrassign_tenant_id', 'um_user_id' => 'um_usrassign_parent_user_id']
			],
			'\Numbers\Users\Users\Model\User\Assignment\Reverse' => [
				'name' => 'Assignments (Reverse)',
				'pk' => ['um_usrassign_tenant_id', 'um_usrassign_assignment_code', 'um_usrassign_parent_user_id', 'um_usrassign_child_user_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrassign_tenant_id', 'um_user_id' => 'um_usrassign_child_user_id']
			]
		]
	];

	public function refresh(& $form) {
		//print_r2($form->values);
	}

	public function validate(& $form) {
		// personal type
		if ($form->values['um_user_type_id'] == 10) {
			if (empty($form->values['um_user_first_name'])) $form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, 'um_user_first_name');
			if (empty($form->values['um_user_last_name'])) $form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, 'um_user_last_name');
			$name = concat_ws(' ', $form->values['um_user_title'], $form->values['um_user_first_name'], $form->values['um_user_last_name']);
		} else if ($form->values['um_user_type_id'] == 20) { // business
			if (empty($form->values['um_user_company'])) $form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, 'um_user_company');
			$name = $form->values['um_user_company'];
		}
		// set name
		if (!$form->hasErrors() && empty($form->values['um_user_name'])) {
			$form->values['um_user_name'] = $name;
		}
		// login enabled
		if (!empty($form->values['um_user_login_enabled'])) {
			if (empty($form->values['um_user_email']) && empty($form->values['um_user_login_username'])) {
				$form->error('danger', 'You must provide Email or Username!', 'um_user_email');
				$form->error('danger', 'You must provide Email or Username!', 'um_user_login_username');
			}
		}
		// password
		if (!empty($form->values['um_user_login_password_new'])) {
			// see if we can change password for this role
			//$roles = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Roles'], 'um_usrrol_role_id');
			// todo validate if user can reset password for this account
			// set password
			$crypt = new \Crypt();
			$form->values['um_user_login_password'] = $crypt->passwordHash($form->values['um_user_login_password_new']);
		}
		// validate assigments
		foreach ($form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'] as $k => $v) {
			$key = "\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse[$k][um_usrassign_parent_user_id]";
			if (!empty($v['um_usrassign_mandatory']) && empty($v['um_usrassign_parent_user_id'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, $key);
			}
		}
	}

	public function post(& $form) {
		// send password reset email
		if (!empty($form->values['um_user_login_password_new'])) {
			\Numbers\Users\Users\Model\User\Notifications::sendPasswordChangeEmail($form->values['um_user_id']);
		}
	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where) {
		if ($field_name == 'um_usrrol_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'], 'um_usrorg_organization_id', ['unique' => true]);
		}
	}

	public function processAllValues(& $form) {
		if (empty($form->values['\Numbers\Users\Users\Model\User\Roles'])) return;
		// direct assigments
		if (empty($form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual']) || strpos($form->options['input']['__form_onchange_field_values_key'] ?? '', 'um_usrrol_role_id') !== false) {
			$virtual = $form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual'] ?? [];
			$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual'] = [];
			$model = new \Numbers\Users\Users\DataSource\Role\Assignments();
			$data = $model->get([
				'where' => [
					'parent_role_ids' => array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Roles'], 'um_usrrol_role_id')
				]
			]);
			foreach ($data as $k => $v) {
				$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual'][$k] = [
					'um_usrassign_assignment_code' => $v['um_rolassign_assignment_code'],
					'um_usrassign_parent_role_id' => $v['um_rolassign_parent_role_id'],
					'um_usrassign_child_role_id' => $v['um_rolassign_child_role_id'],
					'um_usrassign_mandatory' => $v['um_rolassign_mandatory'],
					'um_usrassign_multiple' => $v['um_assigntype_multiple'],
					'um_usrassign_child_user_id' => $virtual[$k]['um_usrassign_child_user_id'] ?? []
				];
				foreach ($form->values['\Numbers\Users\Users\Model\User\Assignments'] ?? [] as $v2) {
					if ($v['um_rolassign_assignment_code'] == $v2['um_usrassign_assignment_code']
						&& $v['um_rolassign_parent_role_id'] == $v2['um_usrassign_parent_role_id']
						&& $v['um_rolassign_child_role_id'] == $v2['um_usrassign_child_role_id']) {
						$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual'][$k]['um_usrassign_child_user_id'][] = $v2['um_usrassign_child_user_id'];
					}
				}
			}
		}
		// create direct assigmnets
		foreach ($form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual'] ?? [] as $k => $v) {
			foreach ($v['um_usrassign_child_user_id'] as $k2 => $v2) {
				if (is_array($v2)) {
					$value = $v2['um_usrassign_child_user_id'];
				} else {
					$value = $v2;
				}
				$key = \Tenant::id() . '::' . $v['um_usrassign_assignment_code'] . '::' . ($form->values['um_user_id'] ?? '') . '::' . $value;
				$form->values['\Numbers\Users\Users\Model\User\Assignments'][$key] = [
					'um_usrassign_assignment_code' => $v['um_usrassign_assignment_code'],
					'um_usrassign_parent_user_id' => $form->values['um_user_id'],
					'um_usrassign_child_user_id' => (int) $value,
					'um_usrassign_parent_role_id' => $v['um_usrassign_parent_role_id'],
					'um_usrassign_child_role_id' => $v['um_usrassign_child_role_id'],
				];
			}
		}
		// reverse assigmnents
		if (empty($form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse']) || strpos($form->options['input']['__form_onchange_field_values_key'] ?? '', 'um_usrrol_role_id') !== false) {
			$virtual = $form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'] ?? [];
			$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'] = [];
			$model = new \Numbers\Users\Users\DataSource\Role\Assignments();
			$data = $model->get([
				'where' => [
					'child_role_ids' => array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Roles'], 'um_usrrol_role_id')
				]
			]);
			foreach ($data as $k => $v) {
				$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'][$k] = [
					'um_usrassign_assignment_code' => $v['um_rolassign_assignment_code'],
					'um_usrassign_parent_role_id' => $v['um_rolassign_parent_role_id'],
					'um_usrassign_child_role_id' => $v['um_rolassign_child_role_id'],
					'um_usrassign_mandatory' => $v['um_rolassign_mandatory'],
					'um_usrassign_multiple' => $v['um_assigntype_multiple'],
					'um_usrassign_parent_user_id' => $virtual[$k]['um_usrassign_parent_user_id'] ?? []
				];
				foreach ($form->values['\Numbers\Users\Users\Model\User\Assignment\Reverse'] ?? [] as $v2) {
					if ($v['um_rolassign_assignment_code'] == $v2['um_usrassign_assignment_code']
						&& $v['um_rolassign_parent_role_id'] == $v2['um_usrassign_parent_role_id']
						&& $v['um_rolassign_child_role_id'] == $v2['um_usrassign_child_role_id']) {
						$form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'][$k]['um_usrassign_parent_user_id'][] = $v2['um_usrassign_parent_user_id'];
					}
				}
			}
		}
		// create direct assigmnets
		foreach ($form->values['\Numbers\Users\Users\Model\User\Assignment\Virtual\Reverse'] ?? [] as $k => $v) {
			foreach ($v['um_usrassign_parent_user_id'] as $k2 => $v2) {
				if (is_array($v2)) {
					$value = $v2['um_usrassign_parent_user_id'];
				} else {
					$value = $v2;
				}
				$key = \Tenant::id() . '::' . $v['um_usrassign_assignment_code'] . '::' . $value . '::' . ($form->values['um_user_id'] ?? '');
				$form->values['\Numbers\Users\Users\Model\User\Assignment\Reverse'][$key] = [
					'um_usrassign_assignment_code' => $v['um_usrassign_assignment_code'],
					'um_usrassign_parent_user_id' => (int) $value,
					'um_usrassign_child_user_id' => $form->values['um_user_id'],
					'um_usrassign_parent_role_id' => $v['um_usrassign_parent_role_id'],
					'um_usrassign_child_role_id' => $v['um_usrassign_child_role_id'],
				];
			}
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
		if ($options['options']['field_name'] == 'um_usrassign_child_user_id' || $options['options']['field_name'] == 'um_usrassign_parent_user_id') {
			if (empty($neighbouring_values['um_usrassign_multiple'])) {
				$options['options']['method'] = 'select';
			}
		}
	}

	public function owners(& $form) {
		return [
			'organization_id' => array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'], 'um_usrorg_organization_id'),
		];
	}
}