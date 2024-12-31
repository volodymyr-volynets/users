<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\API\V1\UM;

use Numbers\Users\Users\DataSource\ACL\Menu\Permissions;
use Numbers\Users\Users\Model\User\Authorize;
use Object\ACL\Resources;
use Object\Controller\API;

class Menu extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Menu (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Menu';
    public $model = Permissions::class;
    public $pk = ['name'];
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => true,
        'permission' => false,
    ];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Public,Authorized');
    }

    /**
     * Login API
     */
    public $postLogin_name = 'Get Menu';
    public $postLogin_description = 'Use this API to get menu for open access and for logged in users.';
    public $postCheck_columns = [
        'bearer_token' => ['sometimes' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postLogin_result_danger = \Validator::RESULT_DANGER;
    public $postLogin_result_success = Authorize::RESULT_SUCCESS;
    public function getMenu()
    {
        $data = Resources::getStatic('menu', 'primary');
        $data = $data[200] ?? [];
        if (!empty($data['Operations'])) {
            $temp = $data['Operations']['options'];
            unset($data['Operations']);
            $data = array_merge_hard($data, $temp);
        }
        if (!empty($data['Accounting'])) {
            $temp = $data['Accounting']['options'];
            unset($data['Accounting']);
            $data = array_merge_hard($data, $temp);
        }
        return [
            'success' => true,
            'error' => [],
            'data' => $data
        ];
    }
}
