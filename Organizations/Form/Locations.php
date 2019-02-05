<?php

namespace Numbers\Users\Organizations\Form;
class Locations extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_locations';
	public $module_code = 'ON';
	public $title = 'O/N Locations Form';
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
	];
	public $rows = [
		'top' => [
			'on_location_id' => ['order' => 100],
			'on_location_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'logo' => ['order' => 200, 'label_name' => 'About'],
			\Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA + ['acl_subresource_hide' => ['ON::LOC_ADDRESSES']],
			\Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA + ['acl_subresource_hide' => ['ON::LOC_ATTRIBUTES']],
		]
	];
	public $elements = [
		'top' => [
			'on_location_id' => [
				'on_location_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Location #', 'domain' => 'location_id_sequence', 'percent' => 50, 'navigation' => true],
				'on_location_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true],
			],
			'on_location_name' => [
				'on_location_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100]
			],
			'logo' => [
				'logo' => ['container' => 'logo_container', 'order' => 100]
			]
		],
		'general_container' => [
			'type' => [
				'\Numbers\Users\Organizations\Model\Location\Type\Map' => ['order' => 1, 'row_order' => 50, 'label_name' => 'Types', 'domain' => 'type_code', 'null' => true, 'required' => true, 'multiple_column' => 'on_loctpmap_type_code', 'percent' => 90, 'method' => 'multiselect', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Location\Types'],
				'on_location_hold' => ['order' => 2, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
				'on_location_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
			],
			'on_location_organization_id' => [
				'on_location_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Primary Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'options_params' => ['on_organization_subtype_id' => 10], 'onchange' => 'this.form.submit();'],
				'on_location_number' => ['order' => 2, 'label_name' => 'Location Number', 'domain' => 'location_number', 'null' => true, 'required' => true, 'percent' => 50],
			],
			'on_location_customer_organization_id' => [
				'on_location_customer_organization_id' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Customer Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive', 'options_depends' => ['on_organization_parent_organization_id' => 'on_location_organization_id'], 'options_params' => ['on_organization_subtype_id' => 20]],
			],
			'on_location_brand_id' => [
				'on_location_brand_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Brand', 'domain' => 'brand_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Brands::optionsActive'],
				'on_location_district_id' => ['order' => 2, 'label_name' => 'District', 'domain' => 'district_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Districts::optionsActive', 'options_depends' => ['on_district_organization_id' => 'on_location_organization_id']],
			],
			'on_location_market_id' => [
				'on_location_market_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Market', 'domain' => 'market_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Markets::optionsActive', 'options_depends' => ['on_market_organization_id' => 'on_location_organization_id']],
				'on_location_region_id' => ['order' => 2, 'label_name' => 'Region', 'domain' => 'region_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Regions::optionsActive', 'options_depends' => ['on_region_organization_id' => 'on_location_organization_id']],
			],
			'on_location_item_master_id' => [
				'on_location_item_master_id' => ['order' => 1, 'row_order' => 350, 'label_name' => 'Item Master', 'domain' => 'item_master_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\ItemMasters::optionsActive'],
				'on_location_construction_date' => ['order' => 2, 'label_name' => 'Construction Date', 'type' => 'date', 'null' => true, 'percent' => 50, 'method' => 'calendar', 'calendar_icon' => 'right'],
			],
			'on_location_icon' => [
				'on_location_icon' => ['order' => 1, 'row_order' => 355, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'separator_2' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'far fa-envelope', 'percent' => 100],
			],
			'on_location_email' => [
				'on_location_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'on_location_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_location_phone' => [
				'on_location_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_location_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_location_cell' => [
				'on_location_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_location_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_location_alternative_contact' => [
				'on_location_alternative_contact' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
		],
		'logo_container' => [
			'__logo_upload' => [
				'__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Logo', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '200x80', 'thumbnail_size' => '125x50'], 'description' => 'Extensions: ' . \Numbers\Users\Documents\Base\Helper\Validate::IMAGE_EXTENSIONS . '. Size: 200x80.'],
				'__logo_preview' => ['order' => 2, 'label_name' => 'Preview Logo', 'percent' => 50, 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'on_location_logo_file_id'],
			],
			'on_location_about_nickname' => [
				'on_location_about_nickname' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Nickname', 'domain' => 'name', 'null' => true, 'percent' => 100],
			],
			'on_location_about_description' => [
				'on_location_about_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
			],
			self::HIDDEN => [
				'on_location_logo_file_id' => ['label_name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Locations',
		'model' => '\Numbers\Users\Organizations\Model\Locations',
		'details' => [
			'\Numbers\Users\Organizations\Model\Location\Type\Map' => [
				'name' => 'Types',
				'pk' => ['on_loctpmap_tenant_id', 'on_loctpmap_location_id', 'on_loctpmap_type_code'],
				'type' => '1M',
				'map' => ['on_location_tenant_id' => 'on_loctpmap_tenant_id', 'on_location_id' => 'on_loctpmap_location_id']
			],
		]
	];

	public function validate(& $form) {
		// primary address
		if (!$form->hasErrors()) {
			if (empty($form->values['\Numbers\Users\Organizations\Model\Locations\0Virtual0\Widgets\Addresses'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, '\Numbers\Users\Organizations\Model\Locations\0Virtual0\Widgets\Addresses[1][wg_address_type_code]');
			} else {
				// primary address
				$primary_first_key = null;
				$primary_address_type = $form->validateDetailsPrimaryColumn(
					'\Numbers\Users\Organizations\Model\Locations\0Virtual0\Widgets\Addresses',
					'wg_address_primary',
					'wg_address_inactive',
					'wg_address_type_code',
					$primary_first_key
				);
			}
		}
		// logo
		if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
			$form->values['__logo_upload']['__image_properties'] = $form->fields['__logo_upload']['options']['validator_params'] ?? [];
			$model = new \Numbers\Users\Documents\Base\Base();
			// remove file if exists
			if (!empty($form->values['on_location_logo_file_id'])) {
				$result = $model->delete($form->values['on_location_logo_file_id']);
				if (!$result['success']) {
					$form->error(DANGER, $result['error']);
					return;
				}
				$form->values['on_location_logo_file_id'] = null;
			}
			// add file
			$catalog = $model->fetchPrimaryCatalog($form->values['on_location_organization_id']);
			if (empty($catalog)) {
				$form->error(DANGER, 'You must set primary catalog!');
				return;
			}
			$result = $model->upload($form->values['__logo_upload'], $catalog);
			if (!$result['success']) {
				$form->error(DANGER, $result['error']);
				return;
			}
			$form->values['on_location_logo_file_id'] = $result['file_id'];
		}
	}

	public function overrideTabs(& $form, & $options, & $tab, & $neighbouring_values) {
		$result = [];
		if ($tab == 'logo' && empty($form->values['on_location_organization_id']) || !\Can::systemModuleExists('DT')) {
			$result['hidden'] = true;
		}
		return $result;
	}
}