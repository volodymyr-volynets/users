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
use Numbers\Tenants\Tenants\Helper\Sequence;

class ChannelGroups extends Base
{
    public $form_link = 'um_changroup_groups';
    public $module_code = 'UM';
    public $title = 'U/M Channel Groups Form';
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
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'channels_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Channel\Group\Channels',
            'details_pk' => ['um_changrpchan_um_channel_code'],
            'order' => 35000
        ],
        'groups_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Channel\Group\Groups',
            'details_pk' => ['um_changrpgroup_child_um_changroup_id'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'channels' => ['order' => 100, 'label_name' => 'Channels'],
            'groups' => ['order' => 200, 'label_name' => 'Groups'],
        ]
    ];
    public $elements = [
        'top' => [
            'um_changroup_code' => [
                'um_changroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group #', 'domain' => 'group_id_sequence', 'percent' => 50, 'navigation' => true],
                'um_changroup_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'um_changroup_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'um_changroup_name' => [
                'um_changroup_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 50, 'required' => true],
                'um_changroup_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules::optionsActive'],
            ],
        ],
        'tabs' => [
            'channels' => [
                'channels' => ['container' => 'channels_container', 'order' => 100],
            ],
            'groups' => [
                'groups' => ['container' => 'groups_container', 'order' => 100],
            ],
        ],
        'channels_container' => [
            'row1' => [
                'um_changrpchan_um_channel_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Channel', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 70, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Channels::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_changrpchan_type_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Channel\Enum\GroupChannelTypes', 'onchange' => 'this.form.submit();'],
                'um_changrpchan_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'groups_container' => [
            'row1' => [
                'um_changrpgroup_child_um_changroup_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Child Group', 'domain' => 'group_id', 'null' => true, 'required' => true, 'percent' => 70, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Channel\Groups::optionsActive', 'onchange' => 'this.form.submit();'],
                'um_changrpgroup_type_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Channel\Enum\GroupChannelTypes', 'onchange' => 'this.form.submit();'],
                'um_changrpgroup_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'UM Channel Groups',
        'model' => '\Numbers\Users\Users\Model\Channel\Groups',
        'details' => [
            '\Numbers\Users\Users\Model\Channel\Group\Channels' => [
                'name' => 'UM Channel Group Channels',
                'pk' => ['um_changrpchan_tenant_id', 'um_changrpchan_um_changroup_id', 'um_changrpchan_um_channel_code'],
                'type' => '1M',
                'map' => ['um_changroup_tenant_id' => 'um_changrpchan_tenant_id', 'um_changroup_id' => 'um_changrpchan_um_changroup_id']
            ],
            '\Numbers\Users\Users\Model\Channel\Group\Groups' => [
                'name' => 'UM Channel Group Groups',
                'pk' => ['um_changrpgroup_tenant_id', 'um_changrpgroup_um_changroup_id', 'um_changrpgroup_child_um_changroup_id'],
                'type' => '1M',
                'map' => ['um_changroup_tenant_id' => 'um_changrpgroup_tenant_id', 'um_changroup_id' => 'um_changrpgroup_um_changroup_id']
            ],
        ]
    ];

    public function validate(& $form)
    {
        // generate new sequence
        if (empty($form->values['um_changroup_code'])) {
            $form->values['um_changroup_code'] = Sequence::nextval('DEFAULT', 'CHG', 'UM', \Tenant::id(), true);
        }
    }
}
