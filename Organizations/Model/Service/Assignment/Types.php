<?php

namespace Numbers\Users\Organizations\Model\Service\Assignment;
class Types extends \Object\Data {
	public $column_key = 'on_servasstype_id';
	public $column_prefix = 'on_servasstype_';
	public $columns = [
		'on_servasstype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
		'on_servasstype_name' => ['name' => 'Name', 'type' => 'text'],
		'on_servasstype_icon' => ['name' => 'Icon', 'type' => 'text']
	];
	public $options_map = [
		'on_servasstype_name' => 'name',
		'on_servasstype_icon' => 'icon_class',
	];
	public $data = [
		10 => ['on_servasstype_name' => 'Territories', 'on_servasstype_icon' => 'far fa-square'],
		20 => ['on_servasstype_name' => 'Postal Codes', 'on_servasstype_icon' => 'far fa-compass'],
		30 => ['on_servasstype_name' => 'Locations', 'on_servasstype_icon' => 'fas fa-coffee'],
	];

	public function options($options = []) {
		$data = parent::options($options);
		// see if territories has been activated
		if (!\Can::systemFeatureExists('ON::TERRITORIES')) {
			unset($data[10]);
		}
		// if we have postal codes
		if (!\Can::systemFeatureExists('CM::COUNTRIES')) {
			unset($data[20]);
		}
		return $data;
	}
}