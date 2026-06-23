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

use Helper\Constant\HTTPConstants;
use Object\Controller\API;
use Numbers\Users\Users\Model\User\Resource\FavoritesAR;

class Favorites extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Favorites (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/Favorites';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => true,
        'authorized' => true,
        'permission' => false,
    ];

    public $loc = [];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Public,Authorized');
    }

    /**
     * Favorite URL API
     */
    public $postFavoriteURL_name = 'Favorite URL';
    public $postFavoriteURL_description = 'Use this API to add bookmark for user.';
    public $postFavoriteURL_columns = [
        'um_usrresfavorite_name' => ['required' => true, 'name' => 'Name', 'loc' => 'NF.Form.Name', 'domain' => 'name'],
        'um_usrresfavorite_icon' => ['required' => false, 'name' => 'Icon', 'domain' => 'icon', 'loc' => 'NF.Form.Icon', 'null' => true],
        'um_usrresfavorite_url' => ['required' => true, 'name' => 'URL', 'loc' => 'NF.Form.URL', 'domain' => 'url'],
        'um_usrresfavorite_folder' => ['required' => false, 'name' => 'Folder', 'domain' => 'name', 'loc' => 'NF.Form.Folder', 'null' => true],
        'um_usrresfavorite_resource_id' => ['required' => false, 'name' => 'Resource #', 'domain' => 'resource_id', 'loc' => 'NF.Form.ResourceID', 'null' => true],
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postFavoriteURL_result_danger = \Validator::RESULT_DANGER;
    public $postFavoriteURL_result_success = RESULT_SUCCESS;
    public function postFavoriteURL(FavoritesAR $favorites_ar)
    {
        $result = $favorites_ar->fill([
            'um_usrresfavorite_tenant_id' => \Tenant::id(),
            'um_usrresfavorite_user_id' => \User::id(),
            'um_usrresfavorite_name' => $this->values['um_usrresfavorite_name'],
            'um_usrresfavorite_icon' => $this->values['um_usrresfavorite_icon'],
            'um_usrresfavorite_url' => $this->values['um_usrresfavorite_url'],
            'um_usrresfavorite_resource_id' => $this->values['um_usrresfavorite_resource_id'],
        ])->merge();
        if (!$result['success']) {
            return $this->finish(HTTPConstants::Status500InternalServerError, $result);
        }
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
        ]);
    }
}
