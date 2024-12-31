<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Form\APIResources;

use Object\Form\Wrapper\Base;
use Object\Reflection;

class ResourceView extends Base
{
    public $form_link = 'a3_api_resources_resource_view';
    public $module_code = 'A3';
    public $title = 'A/3 API Resources Resource View Form';
    public $options = [
        'include_css' => '/numbers/media_submodules/Numbers_Users_APIs_Common.css'
    ];
    public $containers = [
        'separator' => ['default_row_type' => 'grid', 'order' => 50],
        'top' => ['default_row_type' => 'grid', 'order' => 200],
    ];
    public $rows = [];
    public $elements = [
        'separator' => [
            'separator' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'API Content', 'icon' => 'far fa-newspaper', 'percent' => 100],
            ],
        ],
        'top' => [
            'apis' => [
                'apis' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 100, 'custom_renderer' => 'self::renderAPIs'],
            ],
            self::HIDDEN => [
                'sm_resource_id' => ['order' => 1, 'label_name' => 'Resource #', 'domain' => 'resource_id', 'null' => true, 'method' => 'hidden'],
                // old records
                'sm_resource_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'method' => 'hidden', 'preserved' => true],
                'sm_resource_version_code' => ['order' => 3, 'label_name' => 'Version', 'domain' => 'version_code', 'null' => true, 'method' => 'hidden', 'preserved' => true],
            ],
        ],
    ];
    public $collection = [
        'name' => 'SM Resources',
        'model' => '\Numbers\Backend\System\Modules\Model\Resources',
        'pk' => ['sm_resource_id'],
        'readonly' => true,
        'details' => [
            '\Numbers\Backend\System\Modules\Model\Resource\APIMethods' => [
                'name' => 'SM Resource API Methods',
                'pk' => ['sm_rsrcapimeth_resource_id', 'sm_rsrcapimeth_method_code'],
                'type' => '1M',
                'map' => ['sm_resource_id' => 'sm_rsrcapimeth_resource_id'],
                'readonly' => true,
            ],
        ],
    ];

    public function renderAPIs(& $form)
    {
        // if we did not load resource we exit
        if (empty($form->values['sm_resource_id'])) {
            return '';
        }
        // create api object
        $method_object = \Factory::model($form->values['sm_resource_code'], true, [['skip_constructor_loading' => false]]);
        $name = $form->values['sm_resource_name'];
        if (strpos($name, '(') !== false) {
            $name = trim(explode('(', $name)[0]);
        }
        $name = i18n(null, $name);
        $methods = Reflection::getMethods($method_object, \ReflectionMethod::IS_PUBLIC, \Route::HTTP_REQUEST_METHOD_LOWER_CASE);
        $table = [
            'class' => 'numbers_a3_api_table',
            'cellspacing' => '5',
            'cellpadding' => '5',
            'width' => '100%',
            'reponsive' => true,
            'header' => [
                'method' => ['value' => 'Method', 'width' => '5%'],
                'url' => ['value' => 'Url / Name / Description', 'width' => '80%'],
                'action' => ['value' => 'Action', 'width' => '15%'],
            ],
            'options' => [],
        ];
        $counter = 1;
        foreach ($methods as $k => $v) {
            foreach ($v as $k2 => $v2) {
                $uri_new = $method_object->base_url;
                // for certain routes we need to set pk
                if (str_starts_with($v2['name_underscore'], 'Record_') && isset($options['pk'])) {
                    foreach ($options['pk'] as $v3) {
                        $uri_new .= '/{' . $v3 . '}';
                    }
                }
                $uri_new .= '/_' . $v2['name_underscore'];
                $url_with_name = \HTML::b(['value' => $uri_new]) . ' &nbsp; ' . i18n(null, $method_object->{$v2['name'] . '_name'} ?? $v2['name_nice']);
                if (isset($method_object->{$v2['name'] . '_description'})) {
                    $url_with_name .= \HTML::br() . \HTML::div(['value' => $method_object->{$v2['name'] . '_description'}]);
                }
                $row_id = 'numbers_api_table_rows_id_' . $counter;
                $action_link = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => "$('#" . $row_id . "').toggle();", 'value' => 'Details', 'class' => 'btn btn-secondary']);
                $row_details = '';
                if (!empty($method_object->{$v2['name'] . '_columns'})) {
                    $row_details .= print_r2($method_object->{$v2['name'] . '_columns'}, i18n(null, 'Columns'), true);
                }
                if (!empty($method_object->{$v2['name'] . '_result_danger'})) {
                    $row_details .= print_r2($method_object->{$v2['name'] . '_result_danger'}, i18n(null, 'Result Error'), true);
                }
                if (!empty($method_object->{$v2['name'] . '_result_success'})) {
                    $row_details .= print_r2($method_object->{$v2['name'] . '_result_success'}, i18n(null, 'Result Success'), true);
                }
                $table['options'][] = [
                    'method' => ['row_class' => 'numbers_a3_api_rows numbers_a3_api_row_' . $k, 'value' => \HTML::div(['class' => 'numbers_a3_api_methods numbers_a3_api_method_' . $k, 'value' => i18n(null, strtoupper($k))]), 'width' => '5%'],
                    'url' => ['value' => $url_with_name, 'width' => '80%', 'wrap' => true],
                    'action' => ['value' => $action_link, 'width' => '15%'],
                ];
                $table['options'][] = [
                    'method' => ['row_id' => $row_id, 'row_class' => 'numbers_a3_api_rows numbers_a3_api_row_' . $k, 'row_style' => 'display: none;', 'value' => $row_details, 'width' => '100%', 'colspan' => 3],
                ];
                $counter++;
            }
        }
        return \HTML::h3(['value' => $name]). \HTML::br() . \HTML::table($table);
    }
}
