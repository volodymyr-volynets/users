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
				]
			]
		],
	];
}