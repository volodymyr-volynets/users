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
					'sm_rsrsubres_id' => '::id::UM::USER_ROLES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_ROLES',
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
					'sm_rsrsubres_id' => '::id::UM::USER_ORGANIZATIONS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_ORGANIZATIONS',
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
					'sm_rsrsubres_id' => '::id::UM::USER_TEAMS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_TEAMS',
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
					'sm_rsrsubres_id' => '::id::UM::USER_ADDRESSES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_ADDRESSES',
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
					'sm_rsrsubres_id' => '::id::UM::USER_LOGIN',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_LOGIN',
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
				[
					'sm_rsrsubres_id' => '::id::UM::USER_OPERATING',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_OPERATING',
					'sm_rsrsubres_name' => 'U/M User Operating Settings',
					'sm_rsrsubres_icon' => 'far fa-flag',
					'sm_rsrsubres_module_code' => 'UM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'UM::USERS',
							'sm_rsrsubftr_inactive' => 0
						],
						[
							'sm_rsrsubftr_feature_code' => 'CM::COUNTRIES',
							'sm_rsrsubftr_inactive' => 0
						],
						[
							'sm_rsrsubftr_feature_code' => 'CY::CURRENCIES',
							'sm_rsrsubftr_inactive' => 0
						],
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
				[
					'sm_rsrsubres_id' => '::id::UM::USER_PERMISSIONS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_PERMISSIONS',
					'sm_rsrsubres_name' => 'U/M User Permissions',
					'sm_rsrsubres_icon' => 'far fa-eye-slash',
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
					'sm_rsrsubres_id' => '::id::UM::USER_NOTIFICATIONS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_NOTIFICATIONS',
					'sm_rsrsubres_name' => 'U/M User Notifications',
					'sm_rsrsubres_icon' => 'far fa-envelope',
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
					'sm_rsrsubres_id' => '::id::UM::USER_FEATURES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_FEATURES',
					'sm_rsrsubres_name' => 'U/M User Features',
					'sm_rsrsubres_icon' => 'fas fa-cube',
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
					'sm_rsrsubres_id' => '::id::UM::USER_FLAGS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_FLAGS',
					'sm_rsrsubres_name' => 'U/M User Flags',
					'sm_rsrsubres_icon' => 'far fa-flag',
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
					'sm_rsrsubres_id' => '::id::UM::USER_ASSIGNMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_ASSIGNMENTS',
					'sm_rsrsubres_name' => 'U/M User Assignments',
					'sm_rsrsubres_icon' => 'fas fa-assistive-listening-systems',
					'sm_rsrsubres_module_code' => 'UM',
					'sm_rsrsubres_disabled' => 0,
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
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM::USER_TO_USER_ASSIGNMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => '::id::UM::USER_ASSIGNMENTS',
					'sm_rsrsubres_code' => 'UM::USER_TO_USER_ASSIGNMENTS',
					'sm_rsrsubres_name' => 'U/M User To User Assignments',
					'sm_rsrsubres_icon' => 'fas fa-link',
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
					'sm_rsrsubres_id' => '::id::UM::USER_ATTRIBUTES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_ATTRIBUTES',
					'sm_rsrsubres_name' => 'U/M User Attributes',
					'sm_rsrsubres_icon' => 'far fa-clone',
					'sm_rsrsubres_module_code' => 'TM',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'TM::TENANTS',
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
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM::USER_COMMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_COMMENTS',
					'sm_rsrsubres_name' => 'U/M User Comments',
					'sm_rsrsubres_icon' => 'fab fa-forumbee',
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
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM::USER_DOCUMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_DOCUMENTS',
					'sm_rsrsubres_name' => 'U/M User Documents',
					'sm_rsrsubres_icon' => 'fas fa-file',
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
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_disabled' => 1,
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Approve',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM::USER_TAGS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'UM::USER_TAGS',
					'sm_rsrsubres_name' => 'U/M User Tags',
					'sm_rsrsubres_icon' => 'fas fa-tags',
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
							'sm_rsrsubmap_action_id' => '::id::Record_New',
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Edit',
							'sm_rsrsubmap_disabled' => 1,
							'sm_rsrsubmap_inactive' => 0
						],
						[
							'sm_rsrsubmap_action_id' => '::id::Record_Delete',
							'sm_rsrsubmap_inactive' => 0
						],
					]
				],
				[
					'sm_rsrsubres_id' => '::id::UM::USER_TO_CUSTOMER_ASSIGNMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Users\Controller\Users',
					'sm_rsrsubres_parent_rsrsubres_id' => '::id::UM::USER_ASSIGNMENTS',
					'sm_rsrsubres_code' => 'UM::USER_TO_CUSTOMER_ASSIGNMENTS',
					'sm_rsrsubres_name' => 'U/M User To Customer Assignments',
					'sm_rsrsubres_icon' => ' far fa-building',
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
			]
		]
	];
}