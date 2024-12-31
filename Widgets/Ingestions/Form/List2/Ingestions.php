<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Form\List2;

use Object\Form\Wrapper\List2;

class Ingestions extends List2
{
    public $form_link = 'wg_ingestions';
    public $module_code = 'WG';
    public $title = 'W/G Ingestions List';
    public $options = [
        'segment' => null,
        'actions' => [
            'refresh' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
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
                'wg_ingestion_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 20, 'url_edit' => true],
                'wg_ingestion_subject' => ['order' => 2, 'label_name' => 'Subject', 'type' => 'text', 'percent' => 80],
            ],
            'row2' => [
                '__about' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 20],
                'wg_ingestion_timestamp' => ['order' => 2, 'label_name' => 'Datetime', 'type' => 'timestamp', 'percent' => 15, 'format' => '\Format::niceTimestamp'],
                'wg_ingestion_sender' => ['order' => 3, 'label_name' => 'Sender', 'type' => 'text', 'percent' => 25],
                'wg_ingestion_to' => ['order' => 4, 'label_name' => 'Sender', 'type' => 'text', 'percent' => 40, 'format' => 'encode'],
            ]
        ]
    ];
    public $query_primary_model;
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 10,
        'default_sort' => [
            'wg_ingestion_id' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'wg_ingestion_id' => ['name' => 'Ingestion #'],
    ];
    public $subforms = [
        'wg_view_ingestion_body' => [
            'form' => '\Numbers\Users\Widgets\Ingestions\Form\ViewBody',
            'label_name' => 'View Ingestion',
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
                'name' => 'Ingestions',
                'model' => $model->ingestions_model
            ];
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        // hide module #
        if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
            $options['options']['row_class'] = 'grid_row_hidden';
            return;
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
        $form->query = \Factory::model($form->options['model_table'] . '\0Virtual0\Widgets\Ingestions')->queryBuilder()->select();
        $form->processReportQueryFilter($form->query);
        // additional filter
        $parent_model = \Factory::model($form->options['model_table']);
        if (!empty($parent_model->ingestions['map'])) {
            foreach ($parent_model->ingestions['map'] as $k => $v) {
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
}
