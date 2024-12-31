<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Drivers\Amazon\Form;

use Object\Form\Wrapper\Base;

class Profiles extends Base
{
    public $form_link = 'pp_amazon_profiles';
    public $module_code = 'DT';
    public $title = 'D/T Amazon Profiles Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'dt_amzprofile_id' => [
                'dt_amzprofile_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource #', 'domain' => 'resource_id_sequence', 'percent' => 95, 'navigation' => true],
                'dt_amzprofile_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'dt_amzprofile_name' => [
                'dt_amzprofile_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 100],
            ],
            'dt_amzprofile_bucket' => [
                'dt_amzprofile_bucket' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Bucket', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
                'dt_amzprofile_region' => ['order' => 2, 'label_name' => 'Region', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 50],
            ],
            'dt_amzprofile_aws_access_key_id' => [
                'dt_amzprofile_aws_access_key_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Access Key', 'domain' => 'encrypted_password', 'null' => true, 'required' => true, 'percent' => 50],
                'dt_amzprofile_aws_secret_access_key' => ['order' => 2, 'label_name' => 'Secret Access Key', 'domain' => 'encrypted_password', 'null' => true, 'required' => true, 'percent' => 50],
            ],
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'DT Amazon Profiles',
        'model' => \Numbers\Users\Documents\Drivers\Amazon\Model\Profiles::class,
    ];
}
