<?php

namespace Numbers\Users\Users\Model\Collection;
class Roles extends \Object\Collection {
	public $data = [
		'name' => 'Roles',
		'model' => '\Numbers\Users\Users\Model\Roles',
		'pk' => ['um_role_tenant_id', 'um_role_id'],
		'details' => [
			'\Numbers\Users\Users\Model\Role\Children' => [
				'name' => 'Children',
				'pk' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Permissions' => [
				'name' => 'Permissions',
				'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_module_id', 'um_rolperm_resource_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id'],
				'details' => [
					'\Numbers\Users\Users\Model\Role\Permission\Actions' => [
						'name' => 'Permission Actions',
						'pk' => ['um_rolperaction_tenant_id', 'um_rolperaction_role_id', 'um_rolperaction_module_id', 'um_rolperaction_resource_id', 'um_rolperaction_method_code', 'um_rolperaction_action_id'],
						'type' => '1M',
						'map' => ['um_rolperm_tenant_id' => 'um_rolperaction_tenant_id', 'um_rolperm_role_id' => 'um_rolperaction_role_id', 'um_rolperm_module_id' => 'um_rolperaction_module_id', 'um_rolperm_resource_id' => 'um_rolperaction_resource_id'],
					],
					'\Numbers\Users\Users\Model\Role\Permission\Subresources' => [
						'name' => 'Permission Subresources',
						'pk' => ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
						'type' => '1M',
						'map' => ['um_rolperm_tenant_id' => 'um_rolsubres_tenant_id', 'um_rolperm_role_id' => 'um_rolsubres_role_id', 'um_rolperm_module_id' => 'um_rolsubres_module_id', 'um_rolperm_resource_id' => 'um_rolsubres_resource_id'],
					]
				]
			],
			'\Numbers\Users\Users\Model\Role\Notifications' => [
				'name' => 'Notifications',
				'pk' => ['um_rolnoti_tenant_id', 'um_rolnoti_role_id', 'um_rolnoti_module_id', 'um_rolnoti_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolnoti_tenant_id', 'um_role_id' => 'um_rolnoti_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Features' => [
				'name' => 'Features',
				'pk' => ['um_rolfeature_tenant_id', 'um_rolfeature_role_id', 'um_rolfeature_module_id', 'um_rolfeature_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolfeature_tenant_id', 'um_role_id' => 'um_rolfeature_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['um_rolorg_tenant_id', 'um_rolorg_role_id', 'um_rolorg_organization_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolorg_tenant_id', 'um_role_id' => 'um_rolorg_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Flags' => [
				'name' => 'Flags',
				'pk' => ['um_rolsysflag_tenant_id', 'um_rolsysflag_role_id', 'um_rolsysflag_module_id', 'um_rolsysflag_sysflag_id', 'um_rolsysflag_action_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolsysflag_tenant_id', 'um_role_id' => 'um_rolsysflag_role_id']
			],
		]
	];
}