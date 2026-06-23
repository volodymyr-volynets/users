<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Form\Frontend;

use Object\Form\Wrapper\Base;
use NF\Error;

class Dashboards extends Base
{
    public $form_link = 'd9_frontend_dashboards';
    public $module_code = 'D9';
    public $title = 'D/9 Frontend Dashboards Form';
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
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'details_container' => [
            'type' => 'details',
            'details_rendering_type' => 'grid_with_label',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details',
            'details_pk' => ['d9_frontdshdet_id'],
            'details_autoincrement' => ['d9_frontdshdet_id'],
            'order' => 35000
        ],
        'groups_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Groups',
            'details_pk' => ['d9_frontdashgrp_d9_frontgrp_id'],
            'order' => 35000,
            'required' => true,
        ],
    ];
    public $rows = [
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'details' => ['order' => 200, 'label_name' => 'Details'],
            'groups' => ['order' => 300, 'label_name' => 'Groups'],
        ]
    ];
    public $elements = [
        'top' => [
            'd9_frontdash_id' => [
                'd9_frontdash_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Dashboard #', 'domain' => 'dashboard_id_sequence', 'percent' => 50, 'navigation' => true],
                'd9_frontdash_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'd9_frontdash_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'd9_frontdash_name' => [
                'd9_frontdash_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'details' => [
                'details' => ['container' => 'details_container', 'order' => 100],
            ],
            'groups' => [
                'groups' => ['container' => 'groups_container', 'order' => 100],
            ]
        ],
        'general_container' => [
            'd9_frontdash_module_code' => [
                'd9_frontdash_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules'],
            ]
        ],
        'details_container' => [
            'row1' => [
                'd9_frontdshdet_d9_backdash_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Dashboard Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Dashboards\DataSource\Backend\Dashboards::optionsActive', 'onchange' => 'this.form.submit();'],
                'd9_frontdshdet_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true],
                'd9_frontdshdet_order' => ['order' => 3, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true],
                'd9_frontdshdet_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'd9_frontdshdet_x_start' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Start X (%)', 'domain' => 'cell_size', 'null' => true, 'required' => true],
                'd9_frontdshdet_x_end' => ['order' => 2, 'label_name' => 'End X (%)', 'domain' => 'cell_size', 'null' => true, 'required' => true],
                'd9_frontdshdet_y_start' => ['order' => 3, 'label_name' => 'Start Y (px)', 'domain' => 'cell_size', 'null' => true, 'required' => true],
                'd9_frontdshdet_y_end' => ['order' => 4, 'label_name' => 'End Y (px)', 'domain' => 'cell_size', 'null' => true, 'required' => true],
            ],
            self::HIDDEN => [
                'd9_frontdshdet_id' => ['label_name' => 'Detail #', 'domain' => 'detail_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'groups_container' => [
            'row1' => [
                'd9_frontdashgrp_d9_frontgrp_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'details_unique_select' => true, 'options_model' => '\Numbers\Users\Dashboards\Model\Frontend\Groups::optionsActive', 'onchange' => 'this.form.submit();'],
                'd9_frontdashgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'D9 Frontend Dashboards',
        'model' => '\Numbers\Users\Dashboards\Model\Frontend\Dashboards',
        'details' => [
            '\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details' => [
                'name' => 'D9 Frontend Dashboard Details',
                'pk' => ['d9_frontdshdet_tenant_id', 'd9_frontdshdet_d9_frontdash_id', 'd9_frontdshdet_id'],
                'type' => '1M',
                'map' => ['d9_frontdash_tenant_id' => 'd9_frontdshdet_tenant_id', 'd9_frontdash_id' => 'd9_frontdshdet_d9_frontdash_id']
            ],
            '\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Groups' => [
                'name' => 'D9 Frontend Dashboard Groups',
                'pk' => ['d9_frontdashgrp_tenant_id', 'd9_frontdashgrp_d9_frontdash_id', 'd9_frontdashgrp_d9_frontgrp_id'],
                'type' => '1M',
                'map' => ['d9_frontdash_tenant_id' => 'd9_frontdashgrp_tenant_id', 'd9_frontdash_id' => 'd9_frontdashgrp_d9_frontdash_id'],
            ],
        ]
    ];

    public $preload_models = [
        'backend_dashboards' => [
            'model' => '\Numbers\Users\Dashboards\DataSource\Backend\Dashboards',
            'partial' => false,
            'pk' => ['d9_backdash_code'],
        ]
    ];

    public function validate(\Object\Form\Base & $form)
    {
        $form->validateQuickRequired('d9_frontdash_code');
        // start and end
        foreach ($form->values['\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details'] ?? [] as $k => $v) {
            $backend_dashboard = $form->getPreloadModel('backend_dashboards', [$v['d9_frontdshdet_d9_backdash_code']]);
            if ($v['d9_frontdshdet_x_end'] - $v['d9_frontdshdet_x_start'] + 1 !== $backend_dashboard['d9_backdash_x_size']) {
                $form->error(DANGER, loc(Error::INVALID_VALUES), "\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details[{$k}][d9_frontdshdet_x_end]");
            }
            if ($v['d9_frontdshdet_y_end'] - $v['d9_frontdshdet_y_start'] + 1 !== $backend_dashboard['d9_backdash_y_size']) {
                $form->error(DANGER, loc(Error::INVALID_VALUES), "\Numbers\Users\Dashboards\Model\Frontend\Dashboard\Details[{$k}][d9_frontdshdet_y_end]");
            }
        }
    }
}
