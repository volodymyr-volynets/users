<?php

namespace Numbers\Users\Organizations\Form;
class Brands extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_brands';
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
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Organizations\Model\Brand\Organizations',
			'details_pk' => ['on_brndorg_organization_id'],
			'required' => true,
			'order' => 35000
		],
		'trademarks_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Organizations\Model\Brand\Trademarks',
			'details_pk' => ['on_brndtrdmrk_trademark_id'],
			'order' => 35000
		]
	];
	public $rows = [
		'top' => [
			'on_brand_id' => ['order' => 100],
			'on_brand_name' => ['order' => 200],
		],
		'tabs' => [
			'organizations' => ['order' => 300, 'label_name' => 'Organizations'],
			'trademarks' => ['order' => 400, 'label_name' => 'Trademarks'],
		]
	];
	public $elements = [
		'top' => [
			'on_brand_id' => [
				'on_brand_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Brand #', 'domain' => 'brand_id_sequence', 'percent' => 50, 'navigation' => true],
				'on_brand_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'on_brand_name' => [
				'on_brand_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => true],
				'on_brand_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'tabs' => [
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100]
			],
			'trademarks' => [
				'trademarks' => ['container' => 'trademarks_container', 'order' => 100]
			]
		],
		'organizations_container' => [
			'row1' => [
				'on_brndorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'on_brndorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 5],
				'on_brndorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'trademarks_container' => [
			'row1' => [
				'on_brndtrdmrk_trademark_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Trademark', 'domain' => 'trademark_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Trademarks::optionsActive', 'onchange' => 'this.form.submit();'],
				'on_brndtrdmrk_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Brands',
		'model' => '\Numbers\Users\Organizations\Model\Brands',
		'details' => [
			'\Numbers\Users\Organizations\Model\Brand\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['on_brndorg_tenant_id', 'on_brndorg_brand_id', 'on_brndorg_organization_id'],
				'type' => '1M',
				'map' => ['on_brand_tenant_id' => 'on_brndorg_tenant_id', 'on_brand_id' => 'on_brndorg_brand_id'],
			],
			'\Numbers\Users\Organizations\Model\Brand\Trademarks' => [
				'name' => 'Trademarks',
				'pk' => ['on_brndtrdmrk_tenant_id', 'on_brndtrdmrk_brand_id', 'on_brndtrdmrk_trademark_id'],
				'type' => '1M',
				'map' => ['on_brand_tenant_id' => 'on_brndtrdmrk_tenant_id', 'on_brand_id' => 'on_brndtrdmrk_brand_id'],
			]
		]
	];

	public function validate(& $form) {
		// primary organizations
		$primary_found = 0;
		$primary_first_line = null;
		foreach ($form->values['\Numbers\Users\Organizations\Model\Brand\Organizations'] as $k => $v) {
			if (!isset($primary_first_line)) {
				$primary_first_line = "\Numbers\Users\Organizations\Model\Brand\Organizations[{$k}][on_brndorg_primary]";
			}
			if (!empty($v['on_brndorg_primary'])) {
				$primary_found++;
				if (!empty($v['on_brndorg_inactive'])) {
					$form->error(DANGER, 'Primary cannot be inactive!', "\Numbers\Users\Organizations\Model\Brand\Organizations[{$k}][on_brndorg_inactive]");
				}
				if ($primary_found > 1) {
					$form->error(DANGER, 'There can be only one primary organization!', "\Numbers\Users\Organizations\Model\Brand\Organizations[{$k}][on_brndorg_primary]");
				}
			}
		}
		if ($primary_found == 0) {
			$form->error(DANGER, 'You must select primary organization!', $primary_first_line);
		}
	}
}