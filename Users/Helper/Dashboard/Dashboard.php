<?php

namespace Numbers\Users\Users\Helper\Dashboard;
class Dashboard extends \Numbers\Users\Users\Helper\Dashboard\Builder {

	/**
	 * Data
	 *
	 * @var array
	 */
	public $data = [
		1 => [
			1 => [
				'name' => 'Users',
				'icon' => 'fas fa-users',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Users',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Users'
			],
			2 => [
				'icon' => 'fas fa-arrow-right'
			],
			3 => [
				'name' => 'New User',
				'icon' => 'fas fa-user',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Users',
					'method_code' => 'Edit',
					'action_id' => 'Record_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Users/_Edit?__submit_blank=1'
			],
			4 => [
				'name' => '&nbsp;'
			],
			5 => [
				'name' => '&nbsp;'
			],
			6 => [
				'name' => '&nbsp;'
			],
			7 => [
				'name' => 'Groups',
				'icon' => 'far fa-object-group',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Groups',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Groups'
			],
			8 => [
				'name' => 'Roles',
				'icon' => 'far fa-user-circle',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Roles',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Roles'
			],
			9 => [
				'name' => 'Titles',
				'icon' => 'fas fa-blind',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Titles',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Titles'
			],
			10 => [
				'name' => 'Teams',
				'icon' => 'fas fa-sitemap',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Teams',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Teams'
			],
			11 => [
				'name' => 'Assignment Types',
				'icon' => 'fas fa-link',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Assignment\Types',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Assignment/Types'
			],
			12 => [
				'name' => 'Owner Types',
				'icon' => 'fab fa-gg',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Owner\Types',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Owner/Types'
			],
		],
		2 => [
			1 => [
				'name' => '&nbsp;'
			]
		],
		3 => [
			1 => [
				'name' => 'Security Reports'
			],
			2 => [
				'name' => 'Organization Access Report',
				'icon' => 'far fa-building',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
					'method_code' => 'Index',
					'action_id' => 'Report_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Report/Security/OrganizationAccessReport'
			],
			3 => [
				'name' => 'Resource Setup Report',
				'icon' => 'fas fa-tasks',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
					'method_code' => 'Index',
					'action_id' => 'Report_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Report/Security/ResourceSetupReport'
			],
			4 => [
				'name' => 'Role Setup Report',
				'icon' => 'far fa-user-circle',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
					'method_code' => 'Index',
					'action_id' => 'Report_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Report/Security/RoleSetupReport'
			],
			5 => [
				'name' => 'Team Setup Report',
				'icon' => 'fas fa-sitemap',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
					'method_code' => 'Index',
					'action_id' => 'Report_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Report/Security/TeamSetupReport'
			],
			6 => [
				'name' => 'User Setup Report',
				'icon' => 'fas fa-user-friends',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
					'method_code' => 'Index',
					'action_id' => 'Report_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Report/Security/UserSetupReport'
			],
		]
	];

	/**
	 * Constructor
	 */
	public function __construct() {}
}