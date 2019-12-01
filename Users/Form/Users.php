<?php

namespace Numbers\Users\Users\Form;
class Users extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_users';
	public $module_code = 'UM';
	public $title = 'U/M Users Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true,
			'import' => true
		],
		'include_js' => '/numbers/media_submodules/Numbers_Users_Users_Media_JS_Users.js'
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'tabs2' => ['default_row_type' => 'grid', 'order' => 600, 'type' => 'tabs'],
		'assignment_tabs' => ['default_row_type' => 'grid', 'order' => 700, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
		'login_container' => ['default_row_type' => 'grid', 'order' => 32105, 'acl_subresource_edit' => ['UM::USER_LOGIN']],
		'operating_container' => ['default_row_type' => 'grid', 'order' => 32105, 'acl_subresource_edit' => ['UM::USER_OPERATING']],
		'photo_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Roles',
			'details_pk' => ['um_usrrol_role_id'],
			'required' => true,
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_ROLES']
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Organizations',
			'details_pk' => ['um_usrorg_organization_id'],
			'required' => true,
			'order' => 35001,
			'acl_subresource_edit' => ['UM::USER_ORGANIZATIONS']
		],
		'internalization_container' => [
			'type' => 'details',
			'details_11' => true,
			'details_rendering_type' => 'grid_with_label',
			'details_key' => '\Numbers\Users\Users\Model\User\Internalization',
			'details_pk' => ['um_usri18n_user_id'],
			'order' => 35001
		],
		'notifications_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Notifications',
			'details_pk' => ['um_usrnoti_module_id', 'um_usernoti_feature_code'],
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_NOTIFICATIONS']
		],
		'features_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Features',
			'details_pk' => ['um_usrfeature_module_id', 'um_usrfeature_feature_code'],
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_FEATURES']
		],
		'flags_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Flags',
			'details_pk' => ['um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_FLAGS']
		],
		'permissions_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Permissions',
			'details_pk' => ['um_usrperm_resource_id'],
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
		],
		'permission_actions_container' => [
			'type' => 'subdetails',
			'label_name' => 'Actions',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_parent_key' => '\Numbers\Users\Users\Model\User\Permissions',
			'details_key' => '\Numbers\Users\Users\Model\User\Permission\Actions',
			'details_pk' => ['um_usrperaction_method_code', 'um_usrperaction_action_id'],
			'order' => 1000,
			'required' => true,
			'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
		],
		'permission_subresources_container' => [
			'type' => 'subdetails',
			'label_name' => 'Subresources',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_parent_key' => '\Numbers\Users\Users\Model\User\Permissions',
			'details_key' => '\Numbers\Users\Users\Model\User\Permission\Subresources',
			'details_pk' => ['um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
			'order' => 2000,
			'required' => false,
			'acl_subresource_edit' => ['UM::USER_PERMISSIONS']
		],
		'teams_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Team\Map',
			'details_pk' => ['um_usrtmmap_team_id'],
			'order' => 35000,
			'acl_subresource_edit' => ['UM::USER_TEAMS']
		],
		'security_answers_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Security\Answers',
			'details_pk' => ['um_usrsecanswer_question_id'],
			'order' => 36000,
			'acl_subresource_edit' => ['UM::USER_LOGIN']
		],
		'assignments_container' => ['default_row_type' => 'grid', 'order' => 35003, 'custom_renderer' => '\Numbers\Users\Users\Form\Users::renderUserToUser'],
		'customer_assignments_container' => ['default_row_type' => 'grid', 'order' => 35003, 'custom_renderer' => '\Numbers\Users\Users\Form\Users::renderUserToCustomer'],
	];
	public $rows = [
		'top' => [
			'um_user_id' => ['order' => 100],
			'um_user_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'login' => ['order' => 200, 'label_name' => 'Login', 'acl_subresource_hide' => ['UM::USER_LOGIN']],
			'photo' => ['order' => 300, 'label_name' => 'About'],
			'operating' => ['order' => 350, 'label_name' => 'Operations', 'acl_subresource_hide' => ['UM::USER_OPERATING']],
			'internalization' => ['order' => 400, 'label_name' => 'Internalization'],
			\Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA + ['acl_subresource_hide' => ['UM::USER_ADDRESSES']],
			\Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA + ['acl_subresource_hide' => ['UM::USER_ATTRIBUTES']],
		],
		'tabs2' => [
			'organizations' => ['order' => 100, 'label_name' => 'Organizations', 'acl_subresource_hide' => ['UM::USER_ORGANIZATIONS']],
			'roles' => ['order' => 200, 'label_name' => 'Roles', 'acl_subresource_hide' => ['UM::USER_ROLES']],
			'teams' => ['order' => 300, 'label_name' => 'Teams', 'acl_subresource_hide' => ['UM::USER_TEAMS']],
			'permissions' => ['order' => 400, 'label_name' => 'Permissions', 'acl_subresource_hide' => ['UM::USER_PERMISSIONS']],
			'notifications' => ['order' => 500, 'label_name' => 'Notifications', 'acl_subresource_hide' => ['UM::USER_NOTIFICATIONS']],
			'features' => ['order' => 600, 'label_name' => 'Features', 'acl_subresource_hide' => ['UM::USER_FEATURES']],
			'flags' => ['order' => 700, 'label_name' => 'Flags', 'acl_subresource_hide' => ['UM::USER_FLAGS']],
			'assignments' => ['order' => 800, 'label_name' => 'Assignments', 'acl_subresource_hide' => ['UM::USER_ASSIGNMENTS']],
		],
		'assignment_tabs' => [
			'assignment_tabs_users' => ['order' => 100, 'label_name' => 'User To User', 'acl_subresource_hide' => ['UM::USER_TO_USER_ASSIGNMENTS']],
			'assignment_customer_tabs_users' => ['order' => 200, 'label_name' => 'Customer', 'acl_subresource_hide' => ['UM::USER_TO_CUSTOMER_ASSIGNMENTS']],
		]
	];
	public $elements = [
		'top' => [
			'um_user_id' => [
				'um_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id_sequence', 'percent' => 50, 'navigation' => true],
				'um_user_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
			],
			'um_user_name' => [
				'um_user_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c', 'autocomplete' => 'off'],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
				'contact' => ['container' => 'contact_container', 'order' => 200]
			],
			'login' => [
				'login' => ['container' => 'login_container', 'order' => 100],
				'security_answers' => ['container' => 'security_answers_container', 'order' => 200],
			],
			'photo' => [
				'photo' => ['container' => 'photo_container', 'order' => 100],
			],
			'internalization' => [
				'internalization' => ['container' => 'internalization_container', 'order' => 100],
			],
			'operating' => [
				'operating' => ['container' => 'operating_container', 'order' => 100],
			]
		],
		'tabs2' => [
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'roles' => [
				'roles' => ['container' => 'roles_container', 'order' => 100],
			],
			'teams' => [
				'teams' => ['container' => 'teams_container', 'order' => 100],
			],
			'assignments' => [
				'assignments' => ['container' => 'assignment_tabs', 'order' => 100],
			],
			'permissions' => [
				'permissions' => ['container' => 'permissions_container', 'order' => 100],
			],
			'flags' => [
				'flags' => ['container' => 'flags_container', 'order' => 100],
			],
			'notifications' => [
				'notifications' => ['container' => 'notifications_container', 'order' => 100],
			],
			'features' => [
				'features' => ['container' => 'features_container', 'order' => 100],
			]
		],
		'assignment_tabs' => [
			'assignment_tabs_users' => [
				'user_assignments' => ['container' => 'assignments_container', 'order' => 100],
			],
			'assignment_customer_tabs_users' => [
				'customer_assignments' => ['container' => 'customer_assignments_container', 'order' => 100]
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
			'separator_2' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'far fa-envelope', 'percent' => 100],
			],
			'um_user_email' => [
				'um_user_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'um_user_phone' => [
				'um_user_phone' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'um_user_cell' => [
				'um_user_cell' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'um_user_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'um_user_alternative_contact' => [
				'um_user_alternative_contact' => ['order' => 1, 'row_order' => 800, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
			self::HIDDEN => [
				'um_user_numeric_phone' => ['label_name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
			]
		],
		'operating_container' => [
			'um_user_operating_country_code' => [
				'um_user_operating_country_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operating Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries::optionsActive', 'options_options' => ['skip_acl' => true], 'onchange' => 'this.form.submit();'],
				'um_user_operating_province_code' => ['order' => 2, 'label_name' => 'Operating Province', 'domain' => 'province_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Provinces::optionsActive', 'options_depends' => ['cm_province_country_code' => 'um_user_operating_country_code'], 'options_options' => ['skip_acl' => true]],
			],
			'um_user_operating_currency_code' => [
				'um_user_operating_currency_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Currencies::optionsActive', 'options_options' => ['skip_acl' => true]],
				'um_user_operating_currency_type' => ['order' => 2, 'label_name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Types::optionsActive', 'options_options' => ['skip_acl' => true]],
			]
		],
		'login_container' => [
			'um_user_login_enabled' => [
				'um_user_login_enabled' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Login Enabled', 'type' => 'boolean', 'percent' => 25, 'skip_during_export' => true],
				'um_user_login_become' => ['order' => 2, 'label_name' => 'Become', 'percent' => 25, 'skip_during_export' => true, 'custom_renderer' => 'self::renderBecome'],
				'um_user_login_username' => ['order' => 2, 'label_name' => 'Username', 'domain' => 'login', 'null' => true, 'percent' => 50, 'required' => 'c', 'skip_during_export' => true]
			],
			'um_user_login_last_set' => [
				'um_user_login_last_set' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Password Last Changed', 'type' => 'date', 'persistent' => true, 'method' => 'calendar', 'calendar_icon' => 'right', 'percent' => 50, 'readonly' => true, 'skip_during_export' => true],
				'um_user_login_password_new' => ['order' => 2, 'label_name' => 'Reset Password', 'domain' => 'password', 'method' => 'password', 'percent' => 50, 'required' => false, 'empty_value' => true, 'skip_during_export' => true]
			]
		],
		'security_answers_container' => [
			'row1' => [
				'um_usrsecanswer_question_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Question', 'domain' => 'group_id', 'null' => true, 'details_unique_select' => true, 'percent' => 75, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Security\Questions::optionsActive'],
				'um_usrsecanswer_answer' => ['order' => 2, 'label_name' => 'Answer', 'type' => 'text', 'null' => true, 'percent' => 25, 'required' => true],
			]
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
				'um_usri18n_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'],
			],
			'format' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 500, 'label_name' => 'Format', 'icon' => 'far fa-hourglass', 'percent' => 100],
			],
			'um_usri18n_format_date' => [
				'um_usri18n_format_date' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Date Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d', 'description' => 'Y - year, m - month, d - day'],
				'um_usri18n_format_time' => ['order' => 2, 'label_name' => 'Time Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'H:i:s', 'description' => 'H - hour, i - minute, s = second, g - short hour, a - am/pm'],
				'um_usri18n_format_datetime' => ['order' => 3, 'label_name' => 'Datetime Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm'],
				'um_usri18n_format_timestamp' => ['order' => 4, 'label_name' => 'Timestamp Format', 'domain' => 'code', 'null' => true, 'percent' => 25, 'placeholder' => 'Y-m-d H:i:s.u', 'description' => 'Y - year, m - month, d - day, H - hour, i - minute, s = second, g - short hour, a - am/pm, u - miliseconds']
			],
			'um_usri18n_format_uom' => [
				'um_usri18n_format_uom' => ['order' => 1, 'row_order' => 650, 'label_name' => 'Unit of Measures', 'domain' => 'group_code', 'null' => true, 'default' => 'METRIC', 'method' => 'select', 'options_model' => '\Object\Format\UoM'],
			],
			'um_usri18n_format_amount_frm' => [
				'um_usri18n_format_amount_frm' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Amounts In Forms', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts'],
				'um_usri18n_format_amount_fs' => ['order' => 2, 'label_name' => 'Amounts In Financial Statement', 'domain' => 'type_id', 'null' => true, 'method' => 'select', 'options_model' => '\Object\Format\Amounts']
			],
			'print' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Print', 'icon' => 'fas fa-print', 'percent' => 100],
			],
			'um_usri18n_print_format' => [
				'um_usri18n_print_format' => ['order' => 1, 'row_order' => 900, 'label_name' => 'Print Format', 'domain' => 'code', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Formats::options'],
				'um_usri18n_print_font' => ['order' => 2, 'label_name' => 'Print Font', 'domain' => 'code', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Fonts::options'],
			]
		],
		'roles_container' => [
			'row1' => [
				'um_usrrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_usrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
				'um_usrorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
				'um_usrorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'photo_container' => [
			'__logo_upload' => [
				'__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Photo', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '250x250', 'thumbnail_size' => '50x50'], 'description' => 'Extensions: ' . \Numbers\Users\Documents\Base\Helper\Validate::IMAGE_EXTENSIONS . '. Size: 250x250.', 'skip_during_export' => true],
				'__logo_preview' => ['order' => 2, 'label_name' => 'Preview Photo', 'percent' => 50, 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'um_user_photo_file_id', 'skip_during_export' => true],
			],
			'um_user_about_nickname' => [
				'um_user_about_nickname' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Nickname', 'domain' => 'name', 'null' => true, 'percent' => 100],
			],
			'um_user_about_description' => [
				'um_user_about_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
			self::HIDDEN => [
				'um_user_photo_file_id' => ['label_name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden', 'skip_during_export' => true],
			]
		],
		'notifications_container' => [
			'row1' => [
				'um_usrnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'placeholder' => 'Notification', 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrnoti_module_id', 'feature_code' => 'um_usrnoti_feature_code']],
				'um_usrnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_usrnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'features_container' => [
			'row1' => [
				'um_usrfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'placeholder' => 'Feature', 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrfeature_module_id', 'feature_code' => 'um_usrfeature_feature_code']],
				'um_usrfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_usrfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'flags_container' => [
			'row1' => [
				'um_usrsysflag_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Flag', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 60, 'placeholder' => 'Flag', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Flags::optionsJson', 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrsysflag_module_id', 'sysflag_id' => 'um_usrsysflag_sysflag_id']],
				'um_usrsysflag_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Flag\Actions::optionsGrouped', 'options_depends' => ['sysflag_id' => 'um_usrsysflag_sysflag_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_usrsysflag_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_usrsysflag_sysflag_id' => ['order' => 4, 'label_name' => 'System Flag #', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'permissions_container' => [
			'row1' => [
				'um_usrperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1, 'acl_handle_exceptions' => true], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_usrperm_module_id', 'resource_id' => 'um_usrperm_resource_id']],
				'um_usrperm_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_usrperm_module_id' => ['order' => 1, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
			]
		],
		'permission_actions_container' => [
			'row1' => [
				'um_usrperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_usrperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_usrperaction_action_id', 'method_code' => 'um_usrperaction_method_code']],
				'um_usrperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			self::HIDDEN => [
				'um_usrperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
			]
		],
		'permission_subresources_container' => [
			'row1' => [
				'um_usrsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_usrperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_usrsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_usrsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_usrsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
		],
		'teams_container' => [
			'row1' => [
				'um_usrtmmap_team_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team', 'domain' => 'team_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Teams::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_usrtmmap_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
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
			'\Numbers\Users\Users\Model\Team\Map' => [
				'name' => 'Teams',
				'pk' => ['um_usrtmmap_tenant_id', 'um_usrtmmap_user_id', 'um_usrtmmap_team_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrtmmap_tenant_id', 'um_user_id' => 'um_usrtmmap_user_id'],
			],
			'\Numbers\Users\Users\Model\User\Roles' => [
				'name' => 'Roles',
				'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id'],
			],
			'\Numbers\Users\Users\Model\User\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
			],
			'\Numbers\Users\Users\Model\User\Internalization' => [
				'name' => 'Internalization',
				'pk' => ['um_usri18n_tenant_id', 'um_usri18n_user_id'],
				'type' => '11',
				'map' => ['um_user_tenant_id' => 'um_usri18n_tenant_id', 'um_user_id' => 'um_usri18n_user_id']
			],
			'\Numbers\Users\Users\Model\User\Notifications' => [
				'name' => 'Notifications',
				'pk' => ['um_usrnoti_tenant_id', 'um_usrnoti_user_id', 'um_usrnoti_module_id', 'um_usrnoti_feature_code'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrnoti_tenant_id', 'um_user_id' => 'um_usrnoti_user_id']
			],
			'\Numbers\Users\Users\Model\User\Features' => [
				'name' => 'Features',
				'pk' => ['um_usrfeature_tenant_id', 'um_usrfeature_user_id', 'um_usrfeature_module_id', 'um_usrfeature_feature_code'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrfeature_tenant_id', 'um_user_id' => 'um_usrfeature_user_id']
			],
			'\Numbers\Users\Users\Model\User\Flags' => [
				'name' => 'Flags',
				'pk' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id', 'um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrsysflag_tenant_id', 'um_user_id' => 'um_usrsysflag_user_id']
			],
			'\Numbers\Users\Users\Model\User\Permissions' => [
				'name' => 'Permissions',
				'pk' => ['um_usrperm_tenant_id', 'um_usrperm_user_id', 'um_usrperm_module_id', 'um_usrperm_resource_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrperm_tenant_id', 'um_user_id' => 'um_usrperm_user_id'],
				'details' => [
					'\Numbers\Users\Users\Model\User\Permission\Actions' => [
						'name' => 'Permission Actions',
						'pk' => ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id'],
						'type' => '1M',
						'map' => ['um_usrperm_tenant_id' => 'um_usrperaction_tenant_id', 'um_usrperm_user_id' => 'um_usrperaction_user_id', 'um_usrperm_module_id' => 'um_usrperaction_module_id', 'um_usrperm_resource_id' => 'um_usrperaction_resource_id'],
					],
					'\Numbers\Users\Users\Model\User\Permission\Subresources' => [
						'name' => 'Permission Subresources',
						'pk' => ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
						'type' => '1M',
						'map' => ['um_usrperm_tenant_id' => 'um_usrsubres_tenant_id', 'um_usrperm_user_id' => 'um_usrsubres_user_id', 'um_usrperm_module_id' => 'um_usrsubres_module_id', 'um_usrperm_resource_id' => 'um_usrsubres_resource_id'],
					]
				]
			],
			'\Numbers\Users\Users\Model\User\Security\Answers' => [
				'name' => 'Security Answers',
				'pk' => ['um_usrsecanswer_tenant_id', 'um_usrsecanswer_user_id', 'um_usrsecanswer_question_id'],
				'type' => '1M',
				'map' => ['um_user_tenant_id' => 'um_usrsecanswer_tenant_id', 'um_user_id' => 'um_usrsecanswer_user_id'],
			],
		]
	];
	public $notification = [
		'feature_code' => 'UM::EMAIL_USERS_CHANGED'
	];

	public function validate(& $form) {
		$users_model = new \Numbers\Users\Users\Model\Users();
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
			if (empty($form->values['um_user_email']) && empty($form->values['um_user_phone']) && empty($form->values['um_user_login_username'])) {
				$form->error('danger', 'You must provide email, phone or username!', 'um_user_email');
				$form->error('danger', 'You must provide email, phone or username!', 'um_user_phone');
				$form->error('danger', 'You must provide email, phone or username!', 'um_user_login_username');
			}
		}
		// primary organizations
		$primary_organization_id = $form->validateDetailsPrimaryColumn(
			'\Numbers\Users\Users\Model\User\Organizations',
			'um_usrorg_primary',
			'um_usrorg_inactive',
			'um_usrorg_organization_id'
		);
		// password
		if (!empty($form->values['um_user_login_password_new'])) {
			$crypt = new \Crypt();
			$form->values['um_user_login_password'] = $crypt->passwordHash($form->values['um_user_login_password_new']);
		}
		// primary address
		if (!$form->hasErrors()) {
			if (!empty($form->values['\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses'])) {
				// primary address
				$primary_first_key = null;
				$primary_address_type = $form->validateDetailsPrimaryColumn(
					'\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses',
					'wg_address_primary',
					'wg_address_inactive',
					'wg_address_type_code',
					$primary_first_key
				);
			}
		}
		// photo
		if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
			\Numbers\Users\Documents\Base\Helper\MassUpload::uploadOneInForm($form, $form->values['__logo_upload'], 'um_user_photo_file_id', $form->fields['__logo_upload']['options']['validator_params'] ?? []);
		}
		// email
		if (!empty($form->values['um_user_email'])) {
			// validate if its already exists
			if (!$users_model->checkUniqueConstraint('um_user_email', $users_model->pk, [
				'um_user_id' => $form->values['um_user_id'] ?? null,
				'um_user_email' => $form->values['um_user_email'],
			])) {
				$form->error(DANGER, \Object\Content\Messages::DUPLICATE_RECORD, 'um_user_email');
			}
		}
		// numeric phone
		if (!empty($form->values['um_user_phone'])) {
			$form->values['um_user_numeric_phone'] = null;
			/*
			$form->values['um_user_numeric_phone'] = \Object\Validator\Phone::plainNumber($form->values['um_user_phone']);
			// validate if its already exists
			if (!$users_model->checkUniqueConstraint('um_user_numeric_phone', $users_model->pk, [
				'um_user_id' => $form->values['um_user_id'] ?? null,
				'um_user_numeric_phone' => $form->values['um_user_numeric_phone'],
			])) {
				$form->error(DANGER, \Object\Content\Messages::DUPLICATE_RECORD, 'um_user_phone');
			}
			*/
		} else {
			$form->values['um_user_numeric_phone'] = null;
		}
	}

	public function post(& $form) {
		// send password reset email
		if (!empty($form->values['um_user_login_password_new'])) {
			\Numbers\Users\Users\Helper\User\Notifications::sendPasswordChangeEmail($form->values['um_user_id']);
		}
	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value) {
		if ($field_name == 'um_usrrol_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Organizations'], 'um_usrorg_organization_id', ['unique' => true]);
		}
	}

	public function processDefaultValue(& $form, $key, $default, & $value, & $neighbouring_values, $changed_field = [], $options = []) {

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

	public function renderUserToUser(& $form) {
		if (!empty($form->values['um_user_id'])) {
			return \Numbers\Users\Users\Helper\Assignment\UserToUser::renderList($form->values['um_user_id']);
		}
	}

	public function renderUserToCustomer(& $form) {
		if (!empty($form->values['um_user_id'])) {
			return \Numbers\Users\Users\Helper\Assignment\UserToCustomer::renderList($form->values['um_user_id']);
		}
	}

	public function renderBecome(& $form, & $options, & $value, & $neighbouring_values) {
		// check if we have permissions
		if (!empty($form->values['um_user_id']) && \User::id() != $form->values['um_user_id'] && !empty($form->values['um_user_login_enabled']) && \Can::userFeatureExists('UM::USER_BECOME')) {
			return \HTML::a([
				'href' => \Numbers\Users\Users\Helper\LoginWithToken::URL($form->values['um_user_id']),
				'value' => i18n(null, 'Become'),
			]);
		} else {
			return '';
		}
	}
}