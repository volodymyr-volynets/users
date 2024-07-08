<?php

namespace Numbers\Users\Users\API\V1\UM;
class Groups extends \Object\Controller\API {
	public $group = ['UM', 'Operations', 'User Management'];
	public $name = 'U/M Groups (API V1)';
	public $version = 'V1';
	public $base_url = '/API/V1/UM/Groups';
	public $model = \Numbers\Users\Users\Model\User\Groups::class;
	public $pk = ['um_usrgrp_id'];
	public $tenant = true;
	public $module = false;
	public $acl = [
		'public' => false,
		'authorized' => false,
		'permission' => true,
	];

	/**
	 * Routes
	 */
	public function routes() {
		\Route::api($this->name, $this->base_url, self::class, $this->route_options)
			->acl('As API:' . $this->name);
	}

	public function getListView() {
		return RESULT_BLANK;
	}

	public function apiRecordView() {
		return RESULT_BLANK;
	}
}