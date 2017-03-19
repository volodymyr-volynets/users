<?php

class numbers_users_users_form_titles extends object_form_wrapper_base {
	public $form_link = 'titles';
	public $options = [
		'segment' => self::segment_form,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_usrtitle_name' => [
				'um_usrtitle_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Name', 'domain' => 'personal_title', 'percent' => 100, 'required' => true, 'navigation' => true],
			],
			'um_usrtitle_order' => [
				'um_usrtitle_order' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Order', 'domain' => 'order', 'percent' => 95, 'default' => 0],
				'um_usrtitle_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::buttons => self::buttons_data_group
		]
	];
	public $collection = [
		'model' => 'numbers_users_users_model_user_titles'
	];
}