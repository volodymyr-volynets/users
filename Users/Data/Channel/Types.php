<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data\Channel;

use Object\Import;

class Types extends Import
{
    public $data = [
        'types' => [
            'options' => [
                'pk' => ['um_chantype_code'],
                'model' => '\Numbers\Users\Users\Model\Channel\Types',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_chantype_code' => 'UM::USERS',
                    'um_chantype_name' => 'U/M Users',
                    'um_chantype_module_code' => 'UM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Users',
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => 'um_user_id',
                    'um_chantype_field_name' => 'U/M User #',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'UM::ROLES',
                    'um_chantype_name' => 'U/M Roles',
                    'um_chantype_module_code' => 'UM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Roles',
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => 'um_role_id',
                    'um_chantype_field_name' => 'U/M Role #',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'UM::TEAMS',
                    'um_chantype_name' => 'U/M Teams',
                    'um_chantype_module_code' => 'UM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Teams',
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => 'um_team_id',
                    'um_chantype_field_name' => 'U/M Team #',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'UM::GROUPS',
                    'um_chantype_name' => 'U/M Groups',
                    'um_chantype_module_code' => 'UM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\User\Groups',
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => 'um_usrgrp_id',
                    'um_chantype_field_name' => 'U/M Group #',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::EMAILS',
                    'um_chantype_name' => 'S/M Emails',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Users',
                    'um_chantype_validator_method' => '\Object\Validator\Email::validate',
                    'um_chantype_field_code' => 'um_user_email',
                    'um_chantype_field_name' => 'U/M User Email',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::SMS',
                    'um_chantype_name' => 'S/M SMS',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Users',
                    'um_chantype_validator_method' => '\Object\Validator\Phone::validate',
                    'um_chantype_field_code' => 'um_user_phone',
                    'um_chantype_field_name' => 'U/M User Phone',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::WHATSAPP',
                    'um_chantype_name' => 'S/M WhatsApp',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => '\Numbers\Users\Users\Model\Users',
                    'um_chantype_validator_method' => '\Object\Validator\Phone::validate',
                    'um_chantype_field_code' => 'um_user_phone',
                    'um_chantype_field_name' => 'U/M User Phone',
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::SLACK_BOTS',
                    'um_chantype_name' => 'S/M Slack Bots',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => null,
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => null,
                    'um_chantype_field_name' => null,
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::SLACK_CHANNELS',
                    'um_chantype_name' => 'S/M Slack Channels',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => null,
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => null,
                    'um_chantype_field_name' => null,
                    'um_chantype_inactive' => 0,
                ],
                [
                    'um_chantype_code' => 'SM::SLACK_USERS',
                    'um_chantype_name' => 'S/M Slack Users',
                    'um_chantype_module_code' => 'SM',
                    'um_chantype_model' => null,
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => null,
                    'um_chantype_field_name' => null,
                    'um_chantype_inactive' => 0,
                ],
            ],
        ],
    ];
}
