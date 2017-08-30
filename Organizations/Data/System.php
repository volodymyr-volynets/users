<?php

namespace Numbers\Users\Organizations\Data;
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Organizations',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Global',
					'sm_resource_name' => 'O/N Organizations',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'building-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organization\Types',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Organization\Types',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Organization Types',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'clone',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Jurisdictions',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Jurisdictions',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Jurisdictions',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'flag',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\LegalAuthorities',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\LegalAuthorities',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Legal Authorities',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'money',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\StrategicBusinessUnits',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\StrategicBusinessUnits',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Strategic Business Units',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'hospital-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Departments',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Departments',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Departments',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'address-book',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Trademarks',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Trademarks',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Trademarks',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'trademark',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Brands',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Brands',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Brands',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'thumbs-o-up',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\CostCenters',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\CostCenters',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Cost Centers',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'inr',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Divisions',
					'sm_resource_code' => '\Numbers\Users\Organizations\Controller\Divisions',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'O/N Divisions',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'star-half-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
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
							'sm_rsrcftr_feature_code' => 'ON::ORGANIZATIONS',
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
					'sm_resource_id' => '::id::\Menu\Operations\Organizations',
					'sm_resource_code' => '\Menu\Operations\Organizations',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Organization Management',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'building',
					'sm_resource_module_code' => 'ON',
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
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Organizations',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Organizations',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Organizations',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'building-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
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
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organizations',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Organizations',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Operations\Organizations\Settings',
					'sm_resource_code' => '\Menu\Operations\Organizations\Settings',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Settings',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'cogs',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
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
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Organization\Types',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Organization\Types',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Types',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'clone',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Organization\Types',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Organization/Types',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Jurisdictions',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Jurisdictions',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Jurisdictions',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'flag',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Jurisdictions',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Jurisdictions',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\LegalAuthorities',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\LegalAuthorities',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Legal Authorities',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'money',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\LegalAuthorities',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/LegalAuthorities',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\StrategicBusinessUnits',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\StrategicBusinessUnits',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Strategic Business Units',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'hospital-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\StrategicBusinessUnits',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/StrategicBusinessUnits',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Departments',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Departments',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Departments',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'address-book',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Departments',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Departments',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Trademarks',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Trademarks',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Trademarks',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'trademark',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Trademarks',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Trademarks',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Brands',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Brands',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Brands',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'thumbs-o-up',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Brands',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Brands',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\CostCenters',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\CostCenters',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Cost Centers',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'inr',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\CostCenters',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/CostCenters',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Organizations\Controller\Divisions',
					'sm_resource_code' => '\Menu\Numbers\Users\Organizations\Controller\Divisions',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Divisions',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'star-half-o',
					'sm_resource_module_code' => 'ON',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Organization Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Users\Organizations\Controller\Divisions',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/Users/Organizations/Controller/Divisions',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
			]
		]
	];
}