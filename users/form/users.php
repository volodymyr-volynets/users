<?php

class numbers_users_users_form_users extends object_form_wrapper_base {
	public $form_link = 'users';
	public $options = [
		'segment' => self::segment_form,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true
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
			'details_new_rows' => 3,
			'details_key' => 'numbers_users_users_model_user_roles',
			'details_pk' => ['um_usrrol_role_id'],
			'order' => 35000
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => 'numbers_users_users_model_user_organizations',
			'details_pk' => ['um_usrorg_organization_id'],
			'order' => 35001
		],
		/*
		'locale_container' => [
			'type' => 'details',
			'details_11' => true,
			'details_rendering_type' => 'grid_with_label',
			'details_new_rows' => 1,
			'details_key' => 'numbers_data_entities_entities_model_locales',
			'details_pk' => ['em_entloc_entity_id'],
			'order' => 36000
		],
		*/
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
			//object_widgets::addresses => object_widgets::addresses_data,
			//object_widgets::attributes => object_widgets::attributes_data
		]
	];
	public $elements = [
		'top' => [
			'um_user_id' => [
				'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'um_user_code' => ['order' => 2, 'label_name' => 'User Number', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
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
			],
			'roles' => [
				'roles' => ['container' => 'roles_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			]
		],
		'general_container' => [
			'um_user_type_id' => [
				'um_user_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => 'numbers_users_users_model_user_types'],
				'numbers_users_users_model_user_group_map' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'um_usrgrmap_group_id', 'percent' => 30, 'method' => 'multiselect', 'options_model' => 'numbers_users_users_model_user_groups::options_active'],
				'um_user_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 25],
				'um_user_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 25]
			],
			'um_user_title' => [
				'um_user_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => 'numbers_users_users_model_user_titles::options_active'],
				'um_user_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
				'um_user_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
			],
			'um_user_company' => [
				'um_user_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
			],
			'separator_1' => [
				self::separator_horisontal => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'envelope-o', 'percent' => 100],
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
				//'um_user_login_password_new' => ['order' => 2, 'label_name' => 'Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => false]
			]
		],
		'roles_container' => [
			'row1' => [
				'um_usrrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 75, 'method' => 'select', 'options_model' => 'numbers_users_users_model_roles', 'onchange' => 'this.form.submit();'],
				'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 25]
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_usrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 75, 'method' => 'select', 'options_model' => 'numbers_users_organizations_model_organizations', 'onchange' => 'this.form.submit();'],
				'um_usrorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 25]
			]
		],
		/*
		'locale_container' => [
			'separator_1' => [
				self::separator_horisontal => ['order' => 1, 'row_order' => 100, 'label_name' => 'Locale & Settings', 'icon' => 'wrench', 'percent' => 100],
			],
			'em_entloc_locale' => [
				'em_entloc_language_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Language', 'domain' => 'language_code', 'percent' => 33, 'null' => true, 'method' => 'select', 'searchable' => true, 'options_model' => 'numbers_backend_i18n_languages_model_languages::options_active'],
				'em_entloc_locale' => ['order' => 2, 'label_name' => 'Locale', 'domain' => 'code', 'percent' => 33, 'null' => true, 'method' => 'select', 'preset' => true, 'options_model' => 'numbers_data_entities_entities_model_locales::presets', 'options_options' => ['columns' => 'em_entloc_locale']],
				'em_entloc_timezone' => ['order' => 3, 'label_name' => 'Timezone', 'domain' => 'code', 'percent' => 34, 'null' => true, 'method' => 'select', 'searchable' => true, 'options_model' => 'numbers_backend_i18n_languages_model_timezones::options'],
			],
			'em_entloc_date' => [
				'em_entloc_date' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Date Format', 'domain' => 'code', 'percent' => 25, 'null' => true, 'method' => 'select', 'preset' => true, 'options_model' => 'numbers_data_entities_entities_model_locales::presets', 'options_options' => ['columns' => 'em_entloc_date'], 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds'],
				'em_entloc_time' => ['order' => 2, 'label_name' => 'Time Format', 'domain' => 'code', 'percent' => 25, 'null' => true, 'method' => 'select', 'preset' => true, 'options_model' => 'numbers_data_entities_entities_model_locales::presets', 'options_options' => ['columns' => 'em_entloc_time']],
				'em_entloc_datetime' => ['order' => 3, 'label_name' => 'Datetime Format', 'domain' => 'code', 'percent' => 25, 'null' => true, 'method' => 'select', 'preset' => true, 'options_model' => 'numbers_data_entities_entities_model_locales::presets', 'options_options' => ['columns' => 'em_entloc_datetime']],
				'em_entloc_timestamp' => ['order' => 4, 'label_name' => 'Timestamp Format', 'domain' => 'code', 'percent' => 25, 'null' => true, 'method' => 'select', 'preset' => true, 'options_model' => 'numbers_data_entities_entities_model_locales::presets', 'options_options' => ['columns' => 'em_entloc_timestamp']]
			],
			'em_entloc_amount_frm' => [
				'em_entloc_amount_frm' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Amounts In Forms', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'select', 'options_model' => 'format::amount_format_options'],
				'em_entloc_amount_fs' => ['order' => 2, 'label_name' => 'Amounts In Financial Statement', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'select', 'options_model' => 'format::amount_format_options'],
			]
		],
		*/
		'buttons' => [
			self::buttons => self::buttons_data_group
		]
	];
	public $collection = [
		'model' => 'numbers_users_users_model_users',
		'details' => [
			'numbers_users_users_model_user_group_map' => [
				'pk' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrgrmap_tenant_id', 'um_user_id' => 'um_usrgrmap_user_id']
			],
			'numbers_users_users_model_user_roles' => [
				'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id'],
				'sql' => [
					'where' => [
						'um_usrrol_structure_code' => 'BELONGS_TO'
					]
				]
			],
			'numbers_users_users_model_user_organizations' => [
				'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
				'sql' => [
					'where' => [
						'um_usrorg_structure_code' => 'BELONGS_TO'
					]
				]
			],
			/*
			'numbers_data_entities_entities_model_locales' => [
				'pk' => ['em_entloc_entity_id'],
				'type' => '11',
				'map' => ['em_entity_id' => 'em_entloc_entity_id']
			]
			*/
		]
	];

	public function validate(& $form) {
		
	}
}