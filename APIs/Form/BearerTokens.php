<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Form;

use Object\Form\Wrapper\Base;

class BearerTokens extends Base
{
    public $form_link = 'a3_bearer_tokens';
    public $module_code = 'A3';
    public $title = 'A/3 Bearer Tokens Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'a3_bearertoken_id' => [
                'a3_bearertoken_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Token #', 'domain' => 'token', 'percent' => 95, 'navigation' => true],
                'a3_bearertoken_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_usrgrp_name' => [
                'a3_bearertoken_started' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Datetime Started', 'type' => 'timestamp', 'null' => true, 'percent' => 50, 'readonly' => true],
                'a3_bearertoken_expires' => ['order' => 2, 'label_name' => 'Datetime Expires', 'type' => 'timestamp', 'null' => true, 'percent' => 50, 'readonly' => true],
            ],
            'um_usrgrp_organization_id' => [
                'a3_bearertoken_session_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Session #', 'domain' => 'session_id', 'null' => true, 'percent' => 50, 'readonly' => true],
                'a3_bearertoken_user_id' => ['order' => 2, 'label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'percent' => 25, 'readonly' => true],
                'a3_bearertoken_user_ip' => ['order' => 3, 'label_name' => 'User IP', 'domain' => 'ip', 'null' => true, 'percent' => 25, 'readonly' => true],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
                self::BUTTON_SUBMIT_DELETE => self::BUTTON_SUBMIT_DELETE_DATA,
            ]
        ]
    ];
    public $collection = [
        'name' => 'A3 Bearer Tokens',
        'model' => '\Numbers\Users\APIs\Model\BearerTokens',
    ];
}
