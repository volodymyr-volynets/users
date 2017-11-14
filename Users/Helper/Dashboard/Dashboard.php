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
				'icon' => 'users',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Users',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Users'
			],
			2 => [
				'icon' => 'arrow-right'
			],
			3 => [
				'name' => 'New User',
				'icon' => 'user',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Users',
					'method_code' => 'Edit',
					'action_id' => 'Record_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Users/_Edit?__submit_blank=1'
			],
		],
		2 => [
			1 => [
				'name' => '&nbsp;'
			]
		],
		3 => [
			1 => [
				'name' => 'Assignment Types',
				'icon' => 'link',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Assignment\Types',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Assignment/Types'
			],
			2 => [
				'name' => 'Groups',
				'icon' => 'object-group',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Groups',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Groups'
			],
			3 => [
				'name' => 'Roles',
				'icon' => 'user-circle-o',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Roles',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Roles'
			],
			4 => [
				'name' => 'Titles',
				'icon' => 'blind',
				'acl' => [
					'resource_id' => '\Numbers\Users\Users\Controller\Titles',
					'method_code' => 'Index',
					'action_id' => 'List_View'
				],
				'url' => '/Numbers/Users/Users/Controller/Titles'
			]
		]
	];

	/**
	 * Constructor
	 */
	public function __construct() {}
}