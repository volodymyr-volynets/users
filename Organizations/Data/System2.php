<?php

namespace Numbers\Users\Organizations\Data;
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
					'sm_rsrsubres_id' => '::id::ON::ORG_ADDRESSES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_ADDRESSES',
					'sm_rsrsubres_name' => 'O/N Organization Addresses',
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
					'sm_rsrsubres_id' => '::id::ON::ORG_OPERATING',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_OPERATING',
					'sm_rsrsubres_name' => 'O/N Organization Operating Settings',
					'sm_rsrsubres_icon' => 'far fa-flag',
					'sm_rsrsubres_module_code' => 'ON',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_rsrsubres_id' => '::id::ON::ORG_ATTRIBUTES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_ATTRIBUTES',
					'sm_rsrsubres_name' => 'O/N Organization Attributes',
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
					'sm_rsrsubres_id' => '::id::ON::ORG_BUSINESS_HOURS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_BUSINESS_HOURS',
					'sm_rsrsubres_name' => 'O/N Organization Business Hours',
					'sm_rsrsubres_icon' => 'far fa-clock',
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
					'sm_rsrsubres_id' => '::id::ON::LOC_ADDRESSES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Locations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::LOC_ADDRESSES',
					'sm_rsrsubres_name' => 'O/N Location Addresses',
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
					'sm_rsrsubres_id' => '::id::ON::LOC_ATTRIBUTES',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Locations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::LOC_ATTRIBUTES',
					'sm_rsrsubres_name' => 'O/N Location Attributes',
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
					'sm_rsrsubres_id' => '::id::ON::ORG_COMMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_COMMENTS',
					'sm_rsrsubres_name' => 'O/N Organization Comments',
					'sm_rsrsubres_icon' => 'fab fa-forumbee',
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
					]
				],
				[
					'sm_rsrsubres_id' => '::id::ON::LOC_COMMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Locations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::LOC_COMMENTS',
					'sm_rsrsubres_name' => 'O/N Location Comments',
					'sm_rsrsubres_icon' => 'fab fa-forumbee',
					'sm_rsrsubres_module_code' => 'ON',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'ON::LOCATIONS',
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
					'sm_rsrsubres_id' => '::id::ON::ORG_DOCUMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::ORG_DOCUMENTS',
					'sm_rsrsubres_name' => 'O/N Organization Documents',
					'sm_rsrsubres_icon' => 'fas fa-file',
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
					'sm_rsrsubres_id' => '::id::ON::LOC_DOCUMENTS',
					'sm_rsrsubres_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Locations',
					'sm_rsrsubres_parent_rsrsubres_id' => null,
					'sm_rsrsubres_code' => 'ON::LOC_DOCUMENTS',
					'sm_rsrsubres_name' => 'O/N Location Documents',
					'sm_rsrsubres_icon' => 'fas fa-file',
					'sm_rsrsubres_module_code' => 'ON',
					'sm_rsrsubres_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Subresource\Features' => [
						[
							'sm_rsrsubftr_feature_code' => 'ON::LOCATIONS',
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
			]
		]
	];
}