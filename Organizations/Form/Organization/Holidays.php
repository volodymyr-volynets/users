<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Form\Organization;

use Object\Form\Wrapper\Base;

class Holidays extends Base
{
    public $form_link = 'on_holidays';
    public $module_code = 'ON';
    public $title = 'O/N Organization Holidays Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'on_holiday_id' => [
                'on_holiday_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Holiday #', 'domain' => 'holiday_id_sequence', 'percent' => 95, 'navigation' => true],
                'on_holiday_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'on_holiday_name' => [
                'on_holiday_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => true],
                'on_holiday_date' => ['order' => 2, 'label_name' => 'Date', 'type' => 'date', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right']
            ],
            'organizations' => [
                '\Numbers\Users\Organizations\Model\Organization\Holiday\Organizations' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization(s)', 'domain' => 'organization_id', 'multiple_column' => 'on_holiorg_organization_id', 'percent' => 100, 'method' => 'multiselect', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Holidays',
        'model' => '\Numbers\Users\Organizations\Model\Organization\Holidays',
        'details' => [
            '\Numbers\Users\Organizations\Model\Organization\Holiday\Organizations' => [
                'name' => 'Organizations',
                'pk' => ['on_holiorg_tenant_id', 'on_holiorg_holiday_id', 'on_holiorg_organization_id'],
                'type' => '1M',
                'map' => ['on_holiday_tenant_id' => 'on_holiorg_tenant_id', 'on_holiday_id' => 'on_holiorg_holiday_id']
            ]
        ]
    ];
}
