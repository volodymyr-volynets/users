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

use Numbers\Tenants\Tenants\Helper\Sequence;
use Object\Form\Wrapper\Base;

class Settings extends Base
{
    public $form_link = 'um_settings';
    public $module_code = 'UM';
    public $title = 'U/M Settings Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true
        ],
        'flag_save_anyway' => true
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'sequences_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 0,
            'details_key' => '\Numbers\Tenants\Tenants\Model\Module\Sequences',
            'details_pk' => ['tm_mdlseq_type_code'],
            'details_cannot_delete' => true,
            'required' => true,
            'order' => 35002
        ],
        'policy_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Setting\Policy\Policies',
            'details_pk' => ['um_setpolicy_sm_policy_tenant_id', 'um_setpolicy_sm_policy_code'],
            'order' => 35000,
        ],
        'policy_group_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Users\Model\Setting\Policy\Groups',
            'details_pk' => ['um_setpolgrp_sm_polgroup_tenant_id', 'um_setpolgrp_sm_polgroup_id'],
            'order' => 35000,
        ],
    ];
    public $rows = [
        'tabs' => [
            'sequences' => ['order' => 100, 'label_name' => 'Sequences'],
            'policies' => ['order' => 200, 'label_name' => 'Policies'],
        ],
    ];
    public $elements = [
        'tabs' => [
            'sequences' => [
                'sequences' => ['container' => 'sequences_container', 'order' => 100]
            ],
            'policies' => [
                'policies' => ['container' => 'policy_container', 'order' => 100],
                'separator_2' => ['container' => 'separator_2', 'order' => 150],
                'policy_groups' => ['container' => 'policy_group_container', 'order' => 200],
            ]
        ],
        'sequences_container' => [
            'row1' => [
                'tm_mdlseq_type_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Transaction\EntryTypes', 'readonly' => true],
                'tm_mdlseq_prefix' => ['order' => 2, 'label_name' => 'Prefix', 'domain' => 'type_code', 'null' => true, 'percent' => 25, 'placeholder' => 'Prefix'],
                'tm_mdlseq_length' => ['order' => 3, 'label_name' => 'Length', 'domain' => 'counter', 'default' => 18, 'percent' => 10],
                'tm_mdlseq_suffix' => ['order' => 4, 'label_name' => 'Suffix', 'domain' => 'type_code', 'null' => true, 'percent' => 25, 'placeholder' => 'Suffix'],
                'tm_mdlseq_counter' => ['order' => 5, 'row_order' => 200, 'label_name' => 'Current Value', 'domain' => 'bigcounter', 'percent' => 15],
            ],
        ],
        'policy_container' => [
            'row1' => [
                'um_setpolicy_sm_policy_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy', 'domain' => 'group_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Policies::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_policy_tenant_id' => 'um_setpolicy_sm_policy_tenant_id', 'sm_policy_code' => 'um_setpolicy_sm_policy_code']],
                'um_setpolicy_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_setpolicy_sm_policy_tenant_id' => ['label_name' => 'Policy Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'separator_2' => [
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 100, 'label_name' => 'Policy Groups', 'icon' => 'far fa-object-group', 'percent' => 100],
            ],
        ],
        'policy_group_container' => [
            'row1' => [
                'um_setpolgrp_sm_polgroup_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\System\Policies\DataSource\Groups::optionsJson', 'onchange' => 'this.form.submit();', 'json_contains' => ['sm_polgroup_tenant_id' => 'um_setpolgrp_sm_polgroup_tenant_id', 'sm_polgroup_id' => 'um_setpolgrp_sm_polgroup_id']],
                'um_setpolgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            self::HIDDEN => [
                'um_setpolgrp_sm_polgroup_tenant_id' => ['label_name' => 'Policy Group Tenant #', 'domain' => 'tenant_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA
            ]
        ]
    ];
    public $collection = [
        'name' => 'UM Settings',
        'model' => '\Numbers\Users\Users\Model\Settings',
        'details' => [
            '\Numbers\Tenants\Tenants\Model\Module\Sequences' => [
                'name' => 'Sequences',
                'pk' => ['tm_mdlseq_tenant_id', 'tm_mdlseq_module_id', 'tm_mdlseq_type_code'],
                'type' => '1M',
                'map' => ['um_setting_tenant_id' => 'tm_mdlseq_tenant_id', 'um_setting_module_id' => 'tm_mdlseq_module_id'],
            ],
            '\Numbers\Users\Users\Model\Setting\Policy\Policies' => [
                'name' => 'UM Role Policies',
                'pk' => ['um_setpolicy_tenant_id', 'um_setpolicy_module_id', 'um_setpolicy_sm_policy_tenant_id', 'um_setpolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_setting_tenant_id' => 'um_setpolicy_tenant_id', 'um_setting_module_id' => 'um_setpolicy_module_id']
            ],
            '\Numbers\Users\Users\Model\Setting\Policy\Groups' => [
                'name' => 'UM Role Policy Groups',
                'pk' => ['um_setpolgrp_tenant_id', 'um_setpolgrp_module_id', 'um_setpolgrp_sm_polgroup_tenant_id', 'um_setpolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_setting_tenant_id' => 'um_setpolgrp_tenant_id', 'um_setting_module_id' => 'um_setpolgrp_module_id']
            ],
        ]
    ];

    public function refresh(& $form)
    {
        // preset sequences
        Sequence::presetIfNotSet($form, [
            [
                'tm_mdlseq_type_code' => 'USR',
                'tm_mdlseq_prefix' => 'U',
                'tm_mdlseq_length' => 12,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'CHL',
                'tm_mdlseq_prefix' => 'CHAN',
                'tm_mdlseq_length' => 22,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'CHG',
                'tm_mdlseq_prefix' => 'CHGRP',
                'tm_mdlseq_length' => 22,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'ROL',
                'tm_mdlseq_prefix' => 'R',
                'tm_mdlseq_length' => 12,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'TEA',
                'tm_mdlseq_prefix' => 'T',
                'tm_mdlseq_length' => 12,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'GRP',
                'tm_mdlseq_prefix' => 'G',
                'tm_mdlseq_length' => 12,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
            [
                'tm_mdlseq_type_code' => 'IVT',
                'tm_mdlseq_prefix' => 'IVT',
                'tm_mdlseq_length' => 12,
                'tm_mdlseq_suffix' => null,
                'tm_mdlseq_counter' => 0,
            ],
        ]);
    }

    public function validate(& $form)
    {
        Sequence::validateSequenceTypes($form);
        if ($form->hasErrors()) {
            return;
        }
        // update sequence
        $form->values['um_setting_sequence'] = $form->collection_object->primary_model->sequence('um_setting_sequence');
    }
}
