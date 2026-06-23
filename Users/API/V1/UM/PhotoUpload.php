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
use Numbers\Users\Documents\Base\Base as DocumentBase;
use Numbers\Users\Users\Model\Settings;

class PhotoUpload extends API
{
    public $group = ['UM', 'Operations', 'User Management'];
    public $name = 'U/M Favorites (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/UM/PhotoUpload';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => false,
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
            ->acl('Authorized');
    }

    /**
     * Favorite URL API
     */
    public $postPhotoUpload_name = 'Photo Upload';
    public $postPhotoUpload_description = 'Use this API to upload Photo.';
    public $postPhotoUpload_columns = [
        'um_usrpersonal_user_id' => ['required' => true, 'label_name' => 'User #', 'domain' => 'user_id'],
        'um_usrpersonal_module_code' => ['required' => true,'label_name' => 'Module', 'domain' => 'module_code'],
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postPhotoUpload_result_danger = \Validator::RESULT_DANGER;
    public $postPhotoUpload_result_success = RESULT_SUCCESS;
    public function postPhotoUpload()
    {
        $result = [
            'success' => false,
            'error' => [],
            'file_id' => null,
            'file_url' => null,
        ];
        $file = \Request::input('file');
        if (empty($file)) {
            $result['error'][] = 'No file uploaded';
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        $default_catalog = Settings::getSingleStatic([
            'where' => [
                'um_setting_tenant_id' => \Tenant::id(),
            ]
        ]);
        if (empty($default_catalog)) {
            $result['error'][] = 'Define primary catalog in U/M Settings!';
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        $file_model = new DocumentBase();
        $catalog =  $file_model->fetchCatalogByCode($default_catalog['um_setting_default_dt_catalog_code']);
        $file['__image_properties']['thumbnail_size'] = '50x50';
        $file_result = $file_model->upload($file, $catalog, []);
        if (!$file_result['success']) {
            $result['error'] = array_merge($result['error'], $file_result['error']);
            return $this->finish(HTTPConstants::Status400BadRequest, $result);
        }
        $result['file_id'] = $file_result['file_id'];
        $result['file_url'] = DocumentBase::generateOpenAccessURL($file_result['file_id'], true);
        $result['success'] = true;
        return $this->finish(HTTPConstants::Status200OK, $result);
    }
}
