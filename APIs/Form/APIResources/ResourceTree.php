<?php

namespace Numbers\Users\APIs\Form\APIResources;
class ResourceTree extends \Object\Form\Wrapper\Base {
	public $form_link = 'a3_api_resources_resource_tree';
	public $module_code = 'A3';
	public $title = 'A/3 API Resources Resource Tree Form';
	public $options = [
		'include_css' => '/numbers/media_submodules/Numbers_Users_APIs_Common.css'
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tree_container' => [
			'type' => 'trees',
			'details_rendering_type' => 'name_only',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\Backend\System\Modules\Model\Resources',
			'details_pk' => ['sm_resource_id'],
			'details_tree_key' => 'sm_resource_id',
			'details_tree_i18n' => 'skip_sorting',
			'details_tree_parent_key' => 'sm_resource_group2_name',
			'details_tree_name_only_custom_renderer' => '\Numbers\Users\APIs\Form\APIResources\ResourceTree::renderTreeDocumentField',
			'order' => 300
		],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'separator' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'Table of Contents', 'icon' => 'far fa-list-alt', 'percent' => 100],
			],
			self::HIDDEN => [
				'sm_module_code' => ['order' => 1, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden', 'preserved' => true],
				'sm_resource_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden', 'preserved' => true],
				'sm_resource_version_code' => ['order' => 3, 'label_name' => 'Version', 'domain' => 'version_code', 'null' => true, 'method' => 'hidden', 'preserved' => true],
			]
		],
		'tree_container' => [
			self::HIDDEN => []
		],
	];
	public $collection = [
		'name' => 'SM Modules',
		'model' => '\Numbers\Backend\System\Modules\Model\Modules',
		'pk' => ['sm_module_code'],
		'readonly' => true,
		'details' => [
			'\Numbers\Backend\System\Modules\Model\Resources' => [
				'name' => 'SM Resources',
				'pk' => ['sm_resource_module_code', 'sm_resource_id'],
				'type' => '1M',
				'map' => ['sm_module_code' => 'sm_resource_module_code'],
				'readonly' => true,
				'where' => [
					'sm_resource_type' => 150,
					'sm_resource_version_code' => 'parent::sm_resource_version_code',
				],
			],
		],
	];

	public function overrides(& $form) {
		if (empty($form->values['sm_module_code']) && !empty($form->values['sm_resource_module_code'])) {
			$form->values['sm_module_code'] = $form->values['sm_resource_module_code'];
		}
	}

	public function renderTreeDocumentField(& $form, & $rows, & $data) {
		$name = $data['sm_resource_name'];
		if (strpos($name, '(') !== false) {
			$name = trim(explode('(', $name)[0]);
		}
		$name = i18n(null, $name);
		// inactive
		if (!empty($data['sm_resource_inactive'])) {
			$name.= '(' . i18n(null, 'Inactive') . ')';
		}
		// icon
		if (!empty($data['sm_resource_icon'])) {
			$name = \HTML::icon(['type' => $data['sm_resource_icon']]) . ' ' . $name;
		}
		// # of methods
		if (!empty($data['sm_resource_api_method_counter'])) {
			$name.= \HTML::label2(['type' => 'primary', 'value' => $data['sm_resource_api_method_counter']]);
		}
		$hash = \Request::hash([
			$form->values['sm_resource_module_code'],
			$form->values['sm_resource_version_code'],
			$data['sm_resource_id'],
		]);
		$href = \Request::buildURL(\Application::get('mvc.controller') . '/_Index/' . $hash, [], \Request::host(), 'api_title');
		$result = \HTML::a(['value' => $name, 'href' => $href]);
		return [
			'name' => $result,
		];
	}
}