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
		/*
		'login_container' => [
			'type' => 'details',
			'details_11' => true,
			'details_rendering_type' => 'grid_with_label',
			'details_new_rows' => 1,
			'details_key' => 'numbers_data_entities_entities_model_passwords',
			'details_pk' => ['em_entpass_entity_id'],
			'order' => 35000
		],
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
			'login' => ['order' => 200, 'label_name' => 'Login / Permissions'],
			object_widgets::addresses => object_widgets::addresses_data,
			object_widgets::attributes => object_widgets::attributes_data
		]
	];
	public $elements = [
		'top' => [
			'um_user_id' => [
				'um_user_id' => ['order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'um_user_code' => ['order' => 200, 'label_name' => 'User Number', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
			],
			'um_user_name' => [
				'um_user_name' => ['order' => 100, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
			],
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
				'contact' => ['container' => 'contact_container', 'order' => 200]
			],
			'login' => [
				//'login' => ['container' => 'login_container', 'order' => 100],
				//'permissions' => ['container' => 'permissions_container', 'order' => 200],
				//'locale_container' => ['container' => 'locale_container', 'order' => 300]
			]
		],
		'general_container' => [
			'um_user_type_id' => [
				'um_user_type_id' => ['order' => 100, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => 'numbers_users_users_model_user_types'],
				'numbers_users_users_model_user_group_map' => ['order' => 200, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'um_usrgrmap_group_id', 'percent' => 30, 'method' => 'multiselect', 'options_model' => 'numbers_users_users_model_user_groups::options_active'],
				'um_user_hold' => ['order' => 300, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 25],
				'um_user_inactive' => ['order' => 400, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 25]
			],
			'um_user_title' => [
				'um_user_title' => ['order' => 100, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => 'numbers_users_users_model_user_titles::options_active'],
				'em_entity_first_name' => ['order' => 200, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
				'em_entity_last_name' => ['order' => 300, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
			],
			'em_entity_company' => [
				'em_entity_company' => ['order' => 100, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
			],
			'separator_1' => [
				self::separator_horisontal => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'envelope-o', 'percent' => 100],
			],
			'em_entity_email' => [
				'em_entity_email' => ['order' => 100, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'em_entity_email2' => ['order' => 200, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'em_entity_phone' => [
				'em_entity_phone' => ['order' => 100, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'em_entity_phone2' => ['order' => 200, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'em_entity_cell' => [
				'em_entity_cell' => ['order' => 100, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'em_entity_fax' => ['order' => 200, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
		],
		/*
		'login_container' => [
			'em_entpass_login' => [
				'em_entpass_login' => ['order' => 100, 'row_order' => 100, 'label_name' => 'Login', 'domain' => 'login', 'null' => true, 'percent' => 50, 'required' => 'c'],
				'em_entpass_password_new' => ['order' => 200, 'row_order' => 100, 'label_name' => 'Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => false]
			],
			'em_entpass_last_set' => [
				'em_entpass_last_set' => ['order' => 100, 'row_order' => 200, 'label_name' => 'Last Changed', 'type' => 'date', 'persistent' => true, 'method' => 'calendar', 'calendar_icon' => 'right', 'percent' => 50, 'readonly' => true],
				'em_entpass_inactive' => ['order' => 200, 'label_name' => 'Suspended', 'type' => 'boolean', 'percent' => 50]
			]
		],
		'permissions_container' => [
			'separator_1' => [
				self::separator_horisontal => ['order' => 1, 'row_order' => 100, 'label_name' => 'Roles & Permissions', 'icon' => 'universal-access', 'percent' => 100],
			],
			'numbers_data_entities_entities_model_rolemap' => [
				'numbers_data_entities_entities_model_rolemap' => ['order' => 200, 'row_order' => 200, 'label_name' => 'Roles', 'domain' => 'group_id', 'multiple_column' => 'em_entrlmp_role_id', 'percent' => 100, 'method' => 'multiselect', 'options_model' => 'numbers_data_entities_entities_model_roles::options_active']
			]
		],
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
			/*
			'numbers_data_entities_entities_model_groupmap' => [
				'pk' => ['em_entgrmp_entity_id', 'em_entgrmp_group_id'],
				'type' => '1M',
				'map' => ['em_entity_id' => 'em_entgrmp_entity_id']
			],
			'numbers_data_entities_entities_model_rolemap' => [
				'pk' => ['em_entrlmp_entity_id', 'em_entrlmp_role_id'],
				'type' => '1M',
				'map' => ['em_entity_id' => 'em_entrlmp_entity_id']
			],
			'numbers_data_entities_entities_model_passwords' => [
				'pk' => ['em_entpass_entity_id'],
				'type' => '11',
				'map' => ['em_entity_id' => 'em_entpass_entity_id']
			],
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