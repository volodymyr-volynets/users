<?php

namespace Numbers\Users\Users\Form\Assignment;
class UserToCustomer extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_user_to_customer_assignment';
	public $module_code = 'UM';
	public $title = 'U/M User To Customer Assignment Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_assigncustomer_user_id' => [
				'um_assigncustomer_user_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Users::optionsActive'],
				'um_assigncustomer_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_assigncustomer_customer_id' => [
				'um_assigncustomer_organization_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_assigncustomer_customer_id' => ['order' => 2, 'label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsActive', 'options_depends' => ['on_customer_organization_id' => 'um_assigncustomer_organization_id']],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'User To Customer Assignment',
		'model' => '\Numbers\Users\Users\Model\User\Assignment\Customer\Customers'
	];
}