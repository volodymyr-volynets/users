<?php

namespace Numbers\Users\Widgets\Owners\Model\Virtual;
class Owners extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = [];
	public $tenant = true;
	public $module;
	public $orderby = ['wg_owner_inserted_timestamp' => SORT_ASC];
	public $limit;
	public $column_prefix = 'wg_owner_'; // must not change it
	public $columns = [];
	public $constraints = [];
	public $indexes = [];
	public $history = false;
	public $audit = false; // must not change it
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation; // must not change it
	public $attributes = false; // must not change it
	public $details_pk = ['wg_owner_ownertype_id', 'wg_owner_user_id'];
	public $owner_all_types;

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	/**
	 * Constructor
	 */
	public function __construct($class, $virtual_class_name, $options = []) {
		$this->determineModelMap($class, 'owners', $virtual_class_name, $options);
		// add regular columns
		$this->columns['wg_owner_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_owner_ownertype_id'] = ['name' => 'Owner Type #', 'domain' => 'type_id'];
		$this->columns['wg_owner_ownertype_code'] = ['name' => 'Owner Type Code', 'domain' => 'group_code'];
		$this->columns['wg_owner_user_id'] = ['name' => 'User #', 'domain' => 'user_id'];
		$this->columns['wg_owner_inactive'] = ['name' => 'Inactive', 'type' => 'boolean'];
		$this->pk = array_merge(array_values($this->map), ['wg_owner_ownertype_id', 'wg_owner_user_id']);
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => array_merge(array_values($this->map), ['wg_owner_ownertype_id', 'wg_owner_user_id'])
		];
		$this->constraints[$this->name . '_parent_fk'] = [
			'type' => 'fk',
			'columns' => array_values($this->map),
			'foreign_model' => $class,
			'foreign_columns' => array_keys($this->map)
		];
		$this->constraints[$this->name . '_assigned_user_id_fk'] = [
			'type' => 'fk',
			'columns' => ['wg_owner_tenant_id', 'wg_owner_user_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\Users',
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		];
		$this->constraints[$this->name . '_assigned_ownertype_id_fk'] = [
			'type' => 'fk',
			'columns' => ['wg_owner_tenant_id', 'wg_owner_ownertype_id'],
			'foreign_model' => '\Numbers\Users\Users\Model\User\Owner\Types',
			'foreign_columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']
		];
		// construct table
		parent::__construct($options);
	}

	/**
	 * Pre-load model and fields
	 */
	public function preloadModelsAndFields() {
		// preload types
		if (!isset($this->owner_all_types)) {
			$owners_model = \Factory::model('\Numbers\Users\Users\Model\User\Owner\Types', true);
			$this->owner_all_types = $owners_model->get([
				'pk' => ['um_ownertype_id']
			]);
		}
	}

	/**
	 * Process widget
	 *
	 * @param object $form
	 * @param array $options
	 */
	public function formProcessWidget(& $form, $options) {
		// create a container
		$new_container_link = ($options['container_link'] ?? '') . '_' . ($options['row_link'] ?? '') . '__container';
		// collection key
		if (!empty($options['details_parent_key'])) {
			$details_collection_key = ['details', $options['details_parent_key'], 'details', $this->virtual_class_name];
			$type = 'subdetails';
		} else {
			$details_collection_key = ['details', $this->virtual_class_name];
			$type = 'details';
		}
		// build a container
		$form->container($new_container_link, [
			'type' => $type,
			'label_name' => $options['label_name'] ?? '',
			'details_rendering_type' => $options['details_rendering_type'] ?? 'table',
			'details_new_rows' => $options['details_new_rows'] ?? 1,
			'details_parent_key' => $options['details_parent_key'] ?? null,
			'details_key' => $this->virtual_class_name,
			'details_pk' => $this->details_pk,
			'pk' => $this->pk,
			'details_collection_key' => $details_collection_key,
			'details_process_widget_data' => method_exists($this, 'formProcessWidgetData'),
			'details_convert_multiple_columns' => method_exists($this, 'convertMultipleColumns'),
			'details_cannot_delete' => true,
			'order' => $options['order'] ?? 35000,
			'required' => $options['required'] ?? false
		]);
		// add elements
		$elements = [
			'row1' => [
				'wg_owner_ownertype_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Owner Type', 'domain' => 'type_id', 'null' => true, 'persistent' => 'if_set', 'percent' => 40, 'required' => true, 'placeholder' => 'Owner Type', 'details_unique_select' => true, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\User\Owner\Types::optionsActive', 'onchange' => 'this.form.submit();', 'custom_renderer' => "{$this->virtual_class_name}::overrideFieldName"],
				'wg_owner_user_id' => ['order' => 2, 'label_name' => 'User(s)', 'domain' => 'user_id', 'required' => true, 'percent' => 60, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\DataSource\Owners::optionsActive', 'options_depends' => ['owner_type_id' => 'wg_owner_ownertype_id'], 'custom_renderer' => "{$this->virtual_class_name}::overrideFieldValue"],
			]
		];
		foreach ($elements as $k => $v) {
			foreach ($v as $k2 => $v2) {
				$form->element($new_container_link, $k, $k2, $v2);
			}
		}
		// link containers if in tabs
		if ($options['type'] == 'tabs') {
			$form->element($options['container_link'], $options['row_link'], $options['row_link'], ['container' => $new_container_link, 'order' => 1]);
		}
		// collection
		array_key_set($form->collection, $details_collection_key, [
			'name' => 'Owners',
			'pk' => $this->pk,
			'type' => '1M',
			'map' => $this->map,
			'owners' => true
		]);
		$form->updateCollectionObject();
		return true;
	}

	/**
	 * Process widget data
	 *
	 * @param object $form
	 * @param array $parent_keys
	 * @param array $data
	 * @param array $parent_data
	 * @param array $fields
	 * @param array $options
	 * @return array
	 */
	public function formProcessWidgetData(& $form, $parent_keys, $data, $parent_data, $fields, $options) {
		$this->preloadModelsAndFields();
		$result = [];
		// start processing of keys
		$detail_key_holder = [];
		$form->generateDetailsPrimaryKey($detail_key_holder, 'reset', $parent_data, $parent_keys, $options);
		$owner_type_model = new \Numbers\Users\Users\Model\User\Owner\Types();
		foreach ($data as $k => $v) {
			// process pk
			$form->generateDetailsPrimaryKey($detail_key_holder, 'pk', $v, $parent_keys, $options);
			$error_name = $detail_key_holder['error_name'];
			$k2 = $detail_key_holder['pk'];
			// if we have no data
			if (($v['wg_owner_ownertype_id'] ?? '') == '') continue;
			$value = $v['wg_owner_user_id'] ?? null;
			if (!is_array($value)) {
				$value = [$value];
			}
			// put everything back into values
			foreach ($value as $v2) {
				$temp = explode('::', $k2);
				$temp[3] = $v2;
				$temp2 = $owner_type_model->get([
					'where' => [
						'um_ownertype_id' => (int) $v['wg_owner_ownertype_id'],
					],
					'pk' => null,
					'single_row' => true
				]);
				$result[implode('::', $temp)] = array_merge_hard($detail_key_holder['parent_pks'], [
					'wg_owner_ownertype_id' => (int) $v['wg_owner_ownertype_id'],
					'wg_owner_ownertype_code' => $temp2['um_ownertype_code'],
					'wg_owner_user_id' => $v2,
					'wg_owner_inactive' => $v['wg_owner_inactive'] ?? 0
				]);
			}
		}
		// validate required
		if (!empty($options['validate_required'])) {
			foreach ($result as $k => $v) {
				$temp = [];
				$temp['options']['values_key'] = array_merge($parent_keys, [$k, 'wg_owner_user_id']);
				$temp['options']['required'] = true;
				$temp['options']['php_type'] = 'integer';
				$error_name = $form->parentKeysToErrorName($parent_keys) . "[{$k}]";
				$form->validateRequiredOneField($result[$k]['wg_owner_user_id'], "{$error_name}[wg_owner_user_id]", $temp);
			}
		}
		return $result;
	}

	/**
	 * Convert multiple column
	 *
	 * @param object $form
	 * @param mixed $values
	 */
	public function convertMultipleColumns(& $form, & $values) {
		$this->preloadModelsAndFields();
		$result = [];
		foreach ($values as $k => $v) {
			if (!isset($result[$v['wg_owner_ownertype_id']])) {
				$result[$v['wg_owner_ownertype_id']] = $v;
				$result[$v['wg_owner_ownertype_id']]['wg_owner_user_id'] = null;
			}
			$field = $this->owner_all_types[$v['wg_owner_ownertype_id']];
			if ($field['um_ownertype_multiple']) {
				if (!isset($result[$v['wg_owner_ownertype_id']]['wg_owner_user_id'])) {
					$result[$v['wg_owner_ownertype_id']]['wg_owner_user_id'] = [];
				}
				$result[$v['wg_owner_ownertype_id']]['wg_owner_user_id'][] = $v['wg_owner_user_id'];
			} else {
				$result[$v['wg_owner_ownertype_id']]['wg_owner_user_id'] = $v['wg_owner_user_id'];
			}
		}
		$values = $result;
	}

	public function overrideFieldName(& $form, & $options, & $value, & $neighbouring_values) {
		$this->preloadModelsAndFields();
		if (isset($this->owner_all_types[$value])) {
			$field = $this->owner_all_types[$value];
			if ($field['um_ownertype_readonly']) {
				$options['options']['readonly'] = true;
			}
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
		$this->preloadModelsAndFields();
		if (!empty($neighbouring_values['wg_owner_ownertype_id'])) {
			$field = $this->owner_all_types[$neighbouring_values['wg_owner_ownertype_id']];
			if ($field['um_ownertype_readonly']) {
				$options['options']['static'] = true;
			}
			if ($field['um_ownertype_multiple']) {
				$options['options']['method'] = 'multiselect';
			}
		} else {
			$options['options']['static'] = true;
		}
	}
}