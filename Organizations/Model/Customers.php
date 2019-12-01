<?php

namespace Numbers\Users\Organizations\Model;
class Customers extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Customers';
	public $schema;
	public $name = 'on_customers';
	public $pk = ['on_customer_tenant_id', 'on_customer_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_customer_';
	public $columns = [
		'on_customer_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id_sequence'],
		'on_customer_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'on_customer_name' => ['name' => 'Name', 'domain' => 'name'],
		'on_customer_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
		'on_customer_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		// contact
		'on_customer_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'on_customer_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
		'on_customer_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'on_customer_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
		'on_customer_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
		'on_customer_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
		'on_customer_alternative_contact' => ['name' => 'Alternative Contact', 'domain' => 'description', 'null' => true],
		// logo
		'on_customer_logo_file_id' => ['name' => 'Logo File #', 'domain' => 'file_id', 'null' => true],
		'on_customer_about_nickname' => ['name' => 'About Nickname', 'domain' => 'name', 'null' => true],
		'on_customer_about_description' => ['name' => 'About Description', 'domain' => 'description', 'null' => true],
		// operating country / province
		'on_customer_operating_country_code' => ['name' => 'Operating Country Code', 'domain' => 'country_code', 'null' => true],
		'on_customer_operating_province_code' => ['name' => 'Operating Province Code', 'domain' => 'province_code', 'null' => true],
		'on_customer_operating_currency_code' => ['name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true],
		'on_customer_operating_currency_type' => ['name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true],
		// inactive & hold
		'on_customer_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'on_customer_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_customers_pk' => ['type' => 'pk', 'columns' => ['on_customer_tenant_id', 'on_customer_id']],
		'on_customer_code_un' => ['type' => 'unique', 'columns' => ['on_customer_tenant_id', 'on_customer_code']],
		'on_customer_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_customer_tenant_id', 'on_customer_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		]
	];
	public $indexes = [
		'on_customers_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_customer_code', 'on_customer_name', 'on_customer_phone', 'on_customer_email']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'on_customer_tenant_id' => 'wg_audit_tenant_id',
			'on_customer_id' => 'wg_audit_customer_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'on_customer_name' => 'name',
		'on_customer_icon' => 'icon_class',
		'on_customer_logo_file_id' => 'photo_id',
		'on_customer_organization_id' => 'organization_id',
		'on_customer_inactive' => 'inactive'
	];
	public $options_active = [
		'on_customer_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = true;

	public $who = [
		'inserted' => true,
		'updated' => true
	];

	public $addresses = [
		'map' => [
			'on_customer_tenant_id' => 'wg_address_tenant_id',
			'on_customer_id' => 'wg_address_customer_id'
		]
	];

	public $attributes = [
		'map' => [
			'on_customer_tenant_id' => 'wg_attribute_tenant_id',
			'on_customer_id' => 'wg_attribute_customer_id'
		]
	];

	public $comments = [
		'map' => [
			'on_customer_tenant_id' => 'wg_comment_tenant_id',
			'on_customer_id' => 'wg_comment_customer_id'
		]
	];

	public $documents = [
		'map' => [
			'on_customer_tenant_id' => 'wg_document_tenant_id',
			'on_customer_id' => 'wg_document_customer_id'
		]
	];

	public $tags = [
		'map' => [
			'on_customer_tenant_id' => 'wg_tag_tenant_id',
			'on_customer_id' => 'wg_tag_customer_id'
		]
	];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];

	/**
	 * @see $this->options()
	 */
	public function optionsJson($options = []) {
		if (!empty($options['show_all'])) {
			$data = $this->options($options);
		} else {
			$data = $this->optionsActive($options);
		}
		$organizations = \Numbers\Users\Organizations\Model\Organizations::optionsStatic();
		$result = [];
		foreach ($data as $k => $v) {
			$parent = \Object\Table\Options::optionJsonFormatKey(['organization_id' => (int) $v['organization_id'], 'customer_id' => null]);
			$this->optionsJsonReccursive($result, $organizations, $v['organization_id'], $parent);
			// actual customer
			$key = \Object\Table\Options::optionJsonFormatKey(['organization_id' => (int) $v['organization_id'], 'customer_id' => (int) $k]);
			if (!empty($options['skip_photo_id'])) {
				unset($v['photo_id']);
			}
			$result[$key] = $v;
			$result[$key]['parent'] = $parent;
			$result[$key]['__selected_name'] = i18n(null, $result[$parent]['name']) . ': ' . i18n(null, $v['name']);
		}
		if (!empty($result)) {
			$converted = \Helper\Tree::convertByParent($result, 'parent');
			$result = [];
			\Helper\Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
		}
		return $result;
	}

	/**
	 * Helper function
	 */
	private function optionsJsonReccursive(& $result, $data, $parent_id, $parent_key) {
		if (!empty($result[$parent_key])) return;
		if (!isset($data[(int) $parent_id])) return;
		$result[$parent_key] = $data[(int) $parent_id];
		$result[$parent_key]['disabled'] = true;
		if (!empty($result[$parent_key]['parent_id'])) {
			$result[$parent_key]['parent'] = \Object\Table\Options::optionJsonFormatKey(['organization_id' => (int) $result[$parent_key]['parent_id'], 'customer_id' => null]);
			$this->optionsJsonReccursive($result, $data, $result[$parent_key]['parent_id'], $result[$parent_key]['parent']);
		}
	}

	/**
	 * @see $this->options()
	 */
	public function optionsGrouppedTree($options = []) {
		$data = $this->options($options);
		$result = [];
		$organizations = \Numbers\Users\Organizations\Model\Organizations::optionsStatic();
		foreach ($data as $k => $v) {
			$parent = 'ORG-' . $v['organization_id'];
			$this->optionsGrouppedTreeReccursive($result, $organizations, $v['organization_id'], $parent);
			if (!empty($options['skip_photo_id'])) {
				unset($v['photo_id']);
			}
			$result[$k] = $v;
			$result[$k]['parent'] = $parent;
			if (isset($organizations[(int) $v['organization_id']])) {
				$result[$k]['__selected_name'] = i18n(null, $organizations[(int) $v['organization_id']]['name']) . ': ' . i18n(null, $v['name']);
			}
		}
		if (!empty($result)) {
			$converted = \Helper\Tree::convertByParent($result, 'parent');
			$result = [];
			\Helper\Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
		}
		return $result;
	}

	/**
	 * Helper function
	 */
	private function optionsGrouppedTreeReccursive(& $result, $data, $parent_id, $parent_key) {
		if (!empty($result[$parent_key])) return;
		if (!isset($data[(int) $parent_id])) return;
		$result[$parent_key] = $data[(int) $parent_id];
		$result[$parent_key]['disabled'] = true;
		if (!empty($result[$parent_key]['parent_id'])) {
			$result[$parent_key]['parent'] = 'ORG-' . $result[$parent_key]['parent_id'];
			$this->optionsGrouppedTreeReccursive($result, $data, $result[$parent_key]['parent_id'], $result[$parent_key]['parent']);
		}
	}
}