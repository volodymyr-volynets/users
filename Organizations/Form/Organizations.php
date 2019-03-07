<?php

namespace Numbers\Users\Organizations\Form;
class Organizations extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_organizations';
	public $module_code = 'ON';
	public $title = 'O/N Organizations Form';
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
		'logo_container' => ['default_row_type' => 'grid', 'order' => 32200],
		'operating_container' => ['default_row_type' => 'grid', 'order' => 32201, 'acl_subresource_edit' => ['ON::ORG_OPERATING']],
		'business_hours_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Organizations\Model\Organization\BusinessHours',
			'details_pk' => ['on_orgbhour_day_id'],
			'order' => 35000,
			'acl_subresource_edit' => ['ON::ORG_BUSINESS_HOURS']
		],
	];
	public $rows = [
		'top' => [
			'on_organization_id' => ['order' => 100],
			'on_organization_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'logo' => ['order' => 300, 'label_name' => 'About'],
			'operating' => ['order' => 350, 'label_name' => 'Operations', 'acl_subresource_hide' => ['ON::ORG_OPERATING']],
			'business_hours' => ['order' => 400, 'label_name' => 'Business Hours', 'acl_subresource_hide' => ['ON::ORG_BUSINESS_HOURS']],
			\Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA  + ['acl_subresource_hide' => ['ON::ORG_ADDRESSES']],
			\Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA  + ['acl_subresource_hide' => ['ON::ORG_ATTRIBUTES']],
		]
	];
	public $elements = [
		'top' => [
			'on_organization_id' => [
				'on_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization #', 'domain' => 'organization_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'on_organization_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'on_organization_name' => [
				'on_organization_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
				'contact' => ['container' => 'contact_container', 'order' => 200]
			],
			'logo' => [
				'logo' => ['container' => 'logo_container', 'order' => 100]
			],
			'operating' => [
				'operating' => ['container' => 'operating_container', 'order' => 100]
			],
			'business_hours' => [
				'business_hours' => ['container' => 'business_hours_container', 'order' => 100]
			]
		],
		'general_container' => [
			'type' => [
				'\Numbers\Users\Organizations\Model\Organization\Type\Map' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization Type(s)', 'domain' => 'type_code', 'null' => true, 'multiple_column' => 'on_orgtpmap_type_code', 'percent' => 90, 'method' => 'multiselect', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organization\Types::optionsGrouped'],
				'on_organization_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
				'on_organization_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'on_organization_parent_organization_id' => [
				'on_organization_parent_organization_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent Organization', 'domain' => 'organization_id', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'options_depends' => ['on_organization_id;<>' => 'parent::on_organization_id'], 'options_options' => ['skip_acl' => true]],
			],
			'on_organization_icon' => [
				'on_organization_icon' => ['order' => 1, 'row_order' => 250, 'label_name', 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'separator_2' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'far fa-envelope', 'percent' => 100],
			],
			'on_organization_email' => [
				'on_organization_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_organization_phone' => [
				'on_organization_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_organization_cell' => [
				'on_organization_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_organization_alternative_contact' => [
				'on_organization_alternative_contact' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
		],
		'operating_container' => [
			'on_organization_operating_country_code' => [
				'on_organization_operating_country_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operating Country', 'domain' => 'country_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries::optionsActive', 'onchange' => 'this.form.submit();'],
				'on_organization_operating_province_code' => ['order' => 2, 'label_name' => 'Operating Province', 'domain' => 'province_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Provinces::optionsActive', 'options_depends' => ['cm_province_country_code' => 'on_organization_operating_country_code']],
			],
			'on_organization_operating_currency_code' => [
				'on_organization_operating_currency_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Currencies::optionsActive'],
				'on_organization_operating_currency_type' => ['order' => 2, 'label_name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Types::optionsActive'],
			]
		],
		'logo_container' => [
			'__logo_upload' => [
				'__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Logo', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '200x80', 'thumbnail_size' => '125x50'], 'description' => 'Extensions: ' . \Numbers\Users\Documents\Base\Helper\Validate::IMAGE_EXTENSIONS . '. Size: 200x80.'],
				'__logo_preview' => ['order' => 2, 'label_name' => 'Preview Logo', 'percent' => 50, 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'on_organization_logo_file_id'],
			],
			'on_organization_about_nickname' => [
				'on_organization_about_nickname' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Nickname', 'domain' => 'name', 'null' => true, 'percent' => 100],
			],
			'on_organization_about_description' => [
				'on_organization_about_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
			self::HIDDEN => [
				'on_organization_logo_file_id' => ['label_name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
			]
		],
		'business_hours_container' => [
			'row1' => [
				'on_orgbhour_day_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Day', 'domain' => 'day_id', 'null' => true, 'percent' => 45, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organization\BusinessHour\Days', 'onchange' => 'this.form.submit();', 'options_options' => ['i18n' => 'skip_sorting']],
				'on_orgbhour_start_time' => ['order' => 2, 'label_name' => 'Start Time', 'type' => 'time', 'null' => true, 'percent' => 25, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'on_orgbhour_end_time' => ['order' => 3, 'label_name' => 'End Time', 'type' => 'time', 'null' => true, 'percent' => 25, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'on_orgbhour_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'on_orgbhour_timezone_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Timezone', 'domain' => 'timezone_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Timezones::optionsActive'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Organizations',
		'model' => '\Numbers\Users\Organizations\Model\Organizations',
		'details' => [
			'\Numbers\Users\Organizations\Model\Organization\Type\Map' => [
				'name' => 'Types',
				'pk' => ['on_orgtpmap_tenant_id', 'on_orgtpmap_organization_id', 'on_orgtpmap_type_code'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgtpmap_tenant_id', 'on_organization_id' => 'on_orgtpmap_organization_id']
			],
			'\Numbers\Users\Organizations\Model\Organization\BusinessHours' => [
				'name' => 'Business Hours',
				'pk' => ['on_orgbhour_tenant_id', 'on_orgbhour_organization_id', 'on_orgbhour_day_id'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgbhour_tenant_id', 'on_organization_id' => 'on_orgbhour_organization_id'],
			]
		]
	];

	public function validate(& $form) {
		// primary address
		if (!$form->hasErrors()) {
			if (empty($form->values['\Numbers\Users\Organizations\Model\Organizations\0Virtual0\Widgets\Addresses'])) {
				//$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, '\Numbers\Users\Organizations\Model\Organizations\0Virtual0\Widgets\Addresses[1][wg_address_type_code]');
			} else {
				// primary address
				$primary_first_key = null;
				$primary_address_type = $form->validateDetailsPrimaryColumn(
					'\Numbers\Users\Organizations\Model\Organizations\0Virtual0\Widgets\Addresses',
					'wg_address_primary',
					'wg_address_inactive',
					'wg_address_type_code',
					$primary_first_key
				);
			}
		}
		// logo
		if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
			\Numbers\Users\Documents\Base\Helper\MassUpload::uploadOneInForm($form, $form->values['__logo_upload'], 'on_organization_logo_file_id', $form->fields['__logo_upload']['options']['validator_params'] ?? []);
		}
	}

	public function overrideTabs(& $form, & $options, & $tab, & $neighbouring_values) {
		$result = [];
		if ($tab == 'logo' && (empty($form->values['on_organization_id']) || !\Can::systemModuleExists('DT'))) {
			$result['hidden'] = true;
		}
		return $result;
	}
}