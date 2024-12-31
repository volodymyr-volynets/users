<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\CheckIn\Form\List2;

use Numbers\Users\Users\Model\Users;
use Object\Form\Wrapper\List2;

class CheckIn extends List2
{
    public $form_link = 'wg_checkins';
    public $module_code = 'UM';
    public $title = 'U/M Check In / Out List';
    public $options = [
        'segment' => null,
        'actions' => [
            'refresh' => true,
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
    ];
    public $rows = [
        'tabs' => [
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
        self::LIST_CONTAINER => [
            'row1' => [
                'wg_checkin_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Check In #', 'domain' => 'big_id', 'percent' => 15],
                'wg_checkin_inserted_user_id' => ['order' => 2, 'label_name' => 'User', 'domain' => 'user_id', 'percent' => 65, 'custom_renderer' => '\Numbers\Users\Widgets\CheckIn\Form\List2\CheckIn::renderTagUser', 'skip_fts' => true],
                'wg_checkin_duration' => ['order' => 3, 'label_name' => 'Duration', 'type' => 'numeric', 'null' => true, 'percent' => 20, 'format' => '\Format::niceDuration'],
            ],
            'row2' => [
                '__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15, 'custom_renderer' => 'self::renderISAPI'],
                'wg_checkin_checkin_timestamp' => ['order' => 2, 'label_name' => 'Check In Timestamp', 'type' => 'timestamp', 'percent' => 25, 'format' => '\Format::datetime'],
                'wg_checkin_checkin_latitude' => ['order' => 3, 'label_name' => 'Check In Latitude', 'domain' => 'geo_coordinate', 'percent' => 20],
                'wg_checkin_checkin_longitude' => ['order' => 4, 'label_name' => 'Check In Longitude', 'domain' => 'geo_coordinate', 'percent' => 20],
                'wg_checkin_checkin_map' => ['order' => 5, 'label_name' => 'Check In Map', 'domain' => 'geo_coordinate', 'percent' => 20, 'custom_renderer' => '\Numbers\Users\Widgets\CheckIn\Form\List2\CheckIn::renderMapCheckIn', 'skip_fts' => true],
            ],
            'row3' => [
                '__blank2' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Check Out', 'percent' => 15, 'url_edit' => true, 'custom_renderer' => '\Numbers\Users\Widgets\CheckIn\Form\List2\CheckIn::renderCheckout', 'skip_fts' => true],
                'wg_checkin_checkout_timestamp' => ['order' => 2, 'label_name' => 'Check Out Timestamp', 'type' => 'timestamp', 'percent' => 25, 'format' => '\Format::datetime'],
                'wg_checkin_checkout_latitude' => ['order' => 3, 'label_name' => 'Check Out Latitude', 'domain' => 'geo_coordinate', 'percent' => 20],
                'wg_checkin_checkout_longitude' => ['order' => 4, 'label_name' => 'Check Out Longitude', 'domain' => 'geo_coordinate', 'percent' => 20],
                'wg_checkin_checkout_map' => ['order' => 5, 'label_name' => 'Check Out Map', 'domain' => 'geo_coordinate', 'percent' => 20, 'custom_renderer' => '\Numbers\Users\Widgets\CheckIn\Form\List2\CheckIn::renderMapCheckOut', 'skip_fts' => true],
            ]
        ]
    ];
    public $query_primary_model;
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'wg_checkin_id' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'wg_checkin_id' => ['name' => 'Check In #'],
    ];
    public $subforms = [
        'wg_new_checkin' => [
            'form' => '\Numbers\Users\Widgets\CheckIn\Form\NewCheckIn',
            'label_name' => 'New Check In',
            'actions' => [
                'new' => ['name' => 'New'],
            ]
        ],
        'wg_new_checkout' => [
            'form' => '\Numbers\Users\Widgets\CheckIn\Form\NewCheckOut',
            'label_name' => 'New Check Out',
            'actions' => [
                'edit' => ['name' => 'Edit', 'url_edit' => true],
            ]
        ]
    ];
    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            $model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Check In / Out',
                'model' => $model->checkins_model
            ];
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        // hide module #
        if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
            $options['options']['row_class'] = 'grid_row_hidden';
        }
    }

    public function listQuery(& $form)
    {
        $result = [
            'success' => false,
            'error' => [],
            'total' => 0,
            'rows' => []
        ];
        $model = new $form->options['model_table']();
        $form->query = \Factory::model($model->checkins_model)->queryBuilder()->select();
        // join to get actual tag
        $form->query->columns([
            'a.*'
        ]);
        $form->processReportQueryFilter($form->query);
        // additional filter
        $parent_model = \Factory::model($form->options['model_table']);
        if (!empty($parent_model->checkins['map'])) {
            foreach ($parent_model->checkins['map'] as $k => $v) {
                if (isset($form->options['input'][$k])) {
                    $form->query->where('AND', ['a.' . $v, '=', (int) $form->options['input'][$k]]);
                }
            }
        }
        // query #1 get counter
        $counter_query = clone $form->query;
        $counter_query->columns(['counter' => 'COUNT(*)'], ['empty_existing' => true]);
        $temp = $counter_query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['total'] = $temp['rows'][0]['counter'];
        // query #2 get rows
        $form->processListQueryOrderBy();
        $form->query->offset($form->values['__offset'] ?? 0);
        $form->query->limit($form->values['__limit']);
        $temp = $form->query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['rows'] = & $temp['rows'];
        $result['success'] = true;
        return $result;
    }

    public function renderTagUser(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (!empty($neighbouring_values['wg_checkin_inserted_user_name'])) {
            return $neighbouring_values['wg_checkin_inserted_user_name'];
        } else {
            return Users::getUsernameWithAvatar($neighbouring_values['wg_checkin_inserted_user_id']);
        }
    }

    public function renderMapCheckIn(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (!empty($neighbouring_values['wg_checkin_checkin_latitude']) || !empty($neighbouring_values['wg_checkin_checkin_longitude'])) {
            return '<a href="https://maps.google.com?q=' . urlencode($neighbouring_values['wg_checkin_checkin_latitude'] . ',' . $neighbouring_values['wg_checkin_checkin_longitude']) . '" target="_blank">' . i18n(null, 'Map') . '</a>';
        }
    }

    public function renderMapCheckOut(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (!empty($neighbouring_values['wg_checkin_checkout_latitude']) || !empty($neighbouring_values['wg_checkin_checkout_longitude'])) {
            return '<a href="https://maps.google.com?q=' . urlencode($neighbouring_values['wg_checkin_checkout_latitude'] . ',' . $neighbouring_values['wg_checkin_checkout_longitude']) . '" target="_blank">' . i18n(null, 'Map') . '</a>';
        }
    }

    public function renderCheckout(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (empty($neighbouring_values['wg_checkin_checkout_timestamp'])) {
            return i18n(null, 'Check Out');
        }
    }

    public function renderISAPI(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (!empty($neighbouring_values['wg_checkin_external_integtype_code'])) {
            return '<b style="color: red;">' . i18n(null, 'API') . '</b>';
        }
    }
}
