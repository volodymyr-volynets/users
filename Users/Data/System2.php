<?php

namespace Numbers\Users\Users\Data;
class System2 extends \Object\Import {
	public $data = [
		'subresources' => [
			'options' => [
				'pk' => ['sm_rsrsubres_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Subresources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_rsrsubres_id' => '::id::UM_USER_ROLES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM_USER_ROLES',
					'sm_rsrsubres_name' => 'U/M User Roles',
					'sm_rsrsubres_icon' => 'far fa-user-circle',
					'sm_rsrsubres_module_code' => 'UM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'UM::RBAC',
							'sm_rsrsubftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
						[
							'sm_rsrsubmap_action_id' => '::id::All_Actions',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_View',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM_USER_ORGANIZATIONS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM_USER_ORGANIZATIONS',
					'sm_rsrsubres_name' => 'U/M User Organizations',
					'sm_rsrsubres_icon' => 'far fa-building',
					'sm_rsrsubres_module_code' => 'ON',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'ON::ORGANIZATIONS',
							'sm_rsrsubftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
						[
							'sm_rsrsubmap_action_id' => '::id::All_Actions',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_View',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM_USER_TEAMS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM_USER_TEAMS',
					'sm_rsrsubres_name' => 'U/M User Teams',
					'sm_rsrsubres_icon' => 'fas fa-sitemap',
					'sm_rsrsubres_module_code' => 'UM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'UM::TEAMS',
							'sm_rsrsubftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
						[
							'sm_rsrsubmap_action_id' => '::id::All_Actions',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_View',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM_USER_ADDRESSES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM_USER_ADDRESSES',
					'sm_rsrsubres_name' => 'U/M User Addresses',
					'sm_rsrsubres_icon' => 'fas fa-globe',
					'sm_rsrsubres_module_code' => 'CM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'CM::COUNTRIES',
							'sm_rsrsubftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
						[
							'sm_rsrsubmap_action_id' => '::id::All_Actions',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_View',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Inactivate',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM_USER_LOGIN',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM_USER_LOGIN',
					'sm_rsrsubres_name' => 'U/M User Login',
					'sm_rsrsubres_icon' => 'fas fa-asterisk',
					'sm_rsrsubres_module_code' => 'UM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'UM::USERS',
							'sm_rsrsubftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Map' => [
						[
							'sm_rsrsubmap_action_id' => '::id::All_Actions',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_View',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
			]
		]
	];
}