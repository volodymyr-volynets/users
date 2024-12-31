<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Form\Wrapper\Base;
use NF\Error;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Users\Users\Model\Channel\Types;
use Object\Validator\Validate;

class Channels extends Base
{
    public $form_link = 'um_channels';
    public $module_code = 'UM';
    public $title = 'U/M Channels Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ],
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_channel_code' => [
                'um_channel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 95, 'navigation' => true],
                'um_channel_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_channel_name' => [
                'um_channel_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'um_channel_um_chantype_code' => [
                'um_channel_um_chantype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Channel\Types::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_channel_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive'],
            ],
            'um_channel_field_id' => [
                'um_channel_field_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Field #', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'method' => 'select', 'searchable' => true, 'percent' => 100],
            ],
            'um_channel_field_code' => [
                'um_channel_field_code' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Field Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 100],
            ],
            'um_channel_options' => [
                'um_channel_options' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Options', 'type' => 'json', 'null' => true, 'required' => 'c', 'method' => 'textarea', 'rows' => 6, 'percent' => 100],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Channels',
        'model' => '\Numbers\Users\Users\Model\Channels'
    ];

    public function validate(& $form)
    {
        /** @var \Object\Form\Base $form */
        // options
        if (!empty($form->values['um_channel_options'])) {
            $form->values['um_channel_options'] = (new \Json2($form->values['um_channel_options']))->toArray();
        } else {
            $form->values['um_channel_options'] = [];
        }
        // type
        $type = $form->values['um_channel_um_chantype_code'] ?? '';
        $types = Types::getStatic();
        switch ($type) {
            case 'UM::USERS':
            case 'UM::ROLES':
            case 'UM::TEAMS':
            case 'UM::GROUPS':
            case 'ON::ORGANIZATONS':
                if (empty($form->values['um_channel_field_id'])) {
                    $form->error(DANGER, Error::REQUIRED_FIELD, 'um_channel_field_id');
                }
                break;
            case 'SM::EMAILS':
            case 'SM::SMS':
            case 'SM::WHATSAPP':
                if (empty($form->values['um_channel_field_code'])) {
                    $form->error(DANGER, Error::REQUIRED_FIELD, 'um_channel_field_code');
                } else {
                    if ($types[$type]['um_chantype_validator_method']) {
                        $result = Validate::validateMethod($types[$type]['um_chantype_validator_method'], $form->values['um_channel_field_code']);
                        if (!$result['success']) {
                            $form->error(DANGER, $result['error'], 'um_channel_field_code');
                        }
                    }
                }
                break;
            case 'SM::SLACK_BOTS':
                if (empty($form->values['um_channel_options']['webhook'])) {
                    $form->error(DANGER, Error::REQUIRED_JSON_KEY, 'um_channel_options', ['field' => 'webhook']);
                }
                break;
            default:
                // nothing
        }
        if ($form->hasErrors()) {
            return;
        }
        // vendor code
        if (empty($form->values['um_channel_code'])) {
            $form->values['um_channel_code'] = Sequence::nextval('DEFAULT', 'CHL', 'UM', \Tenant::id(), true);
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        $type = $neighbouring_values['um_channel_um_chantype_code'] ?? '';
        $types = Types::getStatic();
        if ($options['options']['field_name'] == 'um_channel_field_id') {
            switch ($type) {
                case 'UM::USERS':
                case 'UM::ROLES':
                case 'UM::TEAMS':
                case 'UM::GROUPS':
                case 'ON::ORGANIZATONS':
                    $options['options']['row_hidden'] = false;
                    $options['options']['options_model'] = $types[$type]['um_chantype_model'];
                    $options['options']['label_name'] = $types[$type]['um_chantype_field_name'];
                    break;
                case 'SM::EMAILS':
                case 'SM::SMS':
                case 'SM::WHATSAPP':
                    $options['options']['row_hidden'] = false;
                    $options['options']['options_model'] = $types['UM::USERS']['um_chantype_model'];
                    $options['options']['label_name'] = $types['UM::USERS']['um_chantype_field_name'];
                    break;
                default:
                    $options['options']['row_hidden'] = true;
            }
        }
        if ($options['options']['field_name'] == 'um_channel_field_code') {
            switch ($type) {
                case 'SM::EMAILS':
                case 'SM::SMS':
                case 'SM::WHATSAPP':
                    $options['options']['row_hidden'] = false;
                    $options['options']['label_name'] = $types[$type]['um_chantype_field_name'];
                    break;
                default:
                    $options['options']['row_hidden'] = true;
            }
        }
        if ($options['options']['field_name'] == 'um_channel_options') {
            switch ($type) {
                case 'SM::SLACK_BOTS':
                case 'SM::SLACK_CHANNELS':
                case 'SM::SLACK_USERS':
                    $options['options']['row_hidden'] = false;
                    break;
                default:
                    $options['options']['row_hidden'] = true;
            }
        }
    }
}
