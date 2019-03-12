<?php

namespace Numbers\Users\Organizations\Data;
class ABAC extends \Object\Import {
	public $data = [
		'abac_attributes' => [
			'options' => [
				'pk' => ['sm_abacattr_id'],
				'model' => '\Numbers\Backend\ABAC\Model\Attributes',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_abacattr_id' => '::id::on_organization_id',
					'sm_abacattr_code' => 'on_organization_id',
					'sm_abacattr_name' => 'Organization #',
					'sm_abacattr_module_code' => 'ON',
					'sm_abacattr_parent_abacattr_id' => null,
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 1,
					'sm_abacattr_flag_attribute' => 1,
					'sm_abacattr_flag_link' => 0,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Organizations\Model\Organizations',
					'sm_abacattr_domain' => '::from::columns::on_organization_id::domain',
					'sm_abacattr_type' => '::from::columns::on_organization_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::on_organization_id::is_numeric_key',
					'sm_abacattr_environment_method' => '\Numbers\Users\Organizations\Helper\ABAC\Environment::getOrganizations',
					'sm_abacattr_inactive' => 0
				],
				[
					'sm_abacattr_id' => '::id::on_customer_id',
					'sm_abacattr_code' => 'on_customer_id',
					'sm_abacattr_name' => 'Customer #',
					'sm_abacattr_module_code' => 'ON',
					'sm_abacattr_parent_abacattr_id' => null,
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 1,
					'sm_abacattr_flag_attribute' => 1,
					'sm_abacattr_flag_link' => 0,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Organizations\Model\Customers',
					'sm_abacattr_domain' => '::from::columns::on_customer_id::domain',
					'sm_abacattr_type' => '::from::columns::on_customer_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::on_customer_id::is_numeric_key',
					'sm_abacattr_environment_method' => '\Numbers\Users\Organizations\Helper\ABAC\Environment::getCustomers',
					'sm_abacattr_inactive' => 0
				],
				[
					'sm_abacattr_id' => '::id::on_location_id',
					'sm_abacattr_code' => 'on_location_id',
					'sm_abacattr_name' => 'Location #',
					'sm_abacattr_module_code' => 'ON',
					'sm_abacattr_parent_abacattr_id' => null,
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 1,
					'sm_abacattr_flag_attribute' => 1,
					'sm_abacattr_flag_link' => 0,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Organizations\Model\Locations',
					'sm_abacattr_domain' => '::from::columns::on_location_id::domain',
					'sm_abacattr_type' => '::from::columns::on_location_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::on_location_id::is_numeric_key',
					'sm_abacattr_environment_method' => '\Numbers\Users\Organizations\Helper\ABAC\Environment::getLocations',
					'sm_abacattr_inactive' => 0
				]
			]
		],
		'abac_attributes_children' => [
			'options' => [
				'pk' => ['sm_abacattr_id'],
				'model' => '\Numbers\Backend\ABAC\Model\Attributes',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_abacattr_id' => '::id::on_customer_organization_id',
					'sm_abacattr_code' => 'on_customer_organization_id',
					'sm_abacattr_name' => 'Customer Organization #',
					'sm_abacattr_module_code' => 'ON',
					'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 0,
					'sm_abacattr_flag_attribute' => 0,
					'sm_abacattr_flag_link' => 0,
					'sm_abacattr_flag_other_table' => 1,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Organizations\Model\Customers',
					'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Organizations\Model\Customers',
					'sm_abacattr_domain' => '::from::columns::on_customer_organization_id::domain',
					'sm_abacattr_type' => '::from::columns::on_customer_organization_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::on_customer_organization_id::is_numeric_key',
					'sm_abacattr_inactive' => 0
				],
				[
					'sm_abacattr_id' => '::id::on_location_organization_id',
					'sm_abacattr_code' => 'on_location_organization_id',
					'sm_abacattr_name' => 'Location Organization #',
					'sm_abacattr_module_code' => 'ON',
					'sm_abacattr_parent_abacattr_id' => '::id::on_organization_id',
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 0,
					'sm_abacattr_flag_attribute' => 0,
					'sm_abacattr_flag_link' => 0,
					'sm_abacattr_flag_other_table' => 1,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Organizations\Model\Locations',
					'sm_abacattr_link_model_id' => '::id::\Numbers\Users\Organizations\Model\Locations',
					'sm_abacattr_domain' => '::from::columns::on_location_organization_id::domain',
					'sm_abacattr_type' => '::from::columns::on_location_organization_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::on_location_organization_id::is_numeric_key',
					'sm_abacattr_inactive' => 0
				],
			]
		],
	];
}