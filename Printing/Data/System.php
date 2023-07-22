<?php

namespace Numbers\Users\Printing\Data;
class System extends \Object\Import {
	public $data = [
		'controllers' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::\Numbers\Users\Printing\Controller\Templates',
					'sm_resource_code' => '\Numbers\Users\Printing\Controller\Templates',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Global',
					'sm_resource_name' => 'P/8 Templates',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-th',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Printing Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [
						[
							'sm_rsrcftr_feature_code' => 'P8::PRINTING',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => [
						[
							'sm_rsrcmp_method_code' => 'AllActions',
							'sm_rsrcmp_action_id' => '::id::All_Actions',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Index',
							'sm_rsrcmp_action_id' => '::id::List_View',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Index',
							'sm_rsrcmp_action_id' => '::id::List_Export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_View',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_New',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Delete',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Import',
							'sm_rsrcmp_action_id' => '::id::Import_Records',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::\Numbers\Users\Printing\Controller\Headers',
					'sm_resource_code' => '\Numbers\Users\Printing\Controller\Headers',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Global',
					'sm_resource_name' => 'P/8 Headers',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-heading',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Printing Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [
						[
							'sm_rsrcftr_feature_code' => 'P8::PRINTING',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => [
						[
							'sm_rsrcmp_method_code' => 'AllActions',
							'sm_rsrcmp_action_id' => '::id::All_Actions',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Index',
							'sm_rsrcmp_action_id' => '::id::List_View',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Index',
							'sm_rsrcmp_action_id' => '::id::List_Export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_View',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_New',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Delete',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Import',
							'sm_rsrcmp_action_id' => '::id::Import_Records',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::\Numbers\Users\Printing\Controller\Print2',
					'sm_resource_code' => '\Numbers\Users\Printing\Controller\Print2',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Global',
					'sm_resource_name' => 'P/8 Print2',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-file-invoice',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Printing Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 1,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [
						[
							'sm_rsrcftr_feature_code' => 'P8::PRINTING',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => []
				],
			]
		],
		'menu' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::\Menu\Operations\Printing\Management',
					'sm_resource_code' => '\Menu\Operations\Printing\Management',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Printing Management',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-print',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Printing\Controller\Templates',
					'sm_resource_code' => '\Menu\Numbers\Users\Printing\Controller\Templates',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Templates',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-th',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Printing Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Printing\Controller\Templates',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Printing/Controller/Templates',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Printing\Controller\Headers',
					'sm_resource_code' => '\Menu\Numbers\Users\Printing\Controller\Headers',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Headers',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-heading',
					'sm_resource_module_code' => 'P8',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Printing Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Printing\Controller\Headers',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Printing/Controller/Headers',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
			]
		]
	];
}