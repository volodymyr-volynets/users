<?php

class numbers_users_users_form_groups extends \Object\Form\Wrapper\Base {
	public $form_link = 'groups';
	public $options = [
		'segment' => self::SEGMENT_FORM,
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
			'um_usrgrp_id' => [
				'um_usrgrp_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group #', 'domain' => 'user_id_sequence', 'percent' => 95, 'required' => 'c', 'navigation' => true],
				'um_usrgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_usrgrp_name' => [
				'um_usrgrp_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'model' => '\Numbers\Users\Users\Model\User\Groups'
	];
}