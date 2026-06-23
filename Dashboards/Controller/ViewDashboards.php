<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Controller;

use Object\Controller\Permission;
use Object\Form\Wrapper\Import;
use Numbers\Users\Dashboards\Form\Frontend\Dashboards;
use Object\Data\Model\DateTypes;

class ViewDashboards extends Permission
{
    public function actionIndex()
    {
        $data = \Numbers\Users\Dashboards\Model\Frontend\Dashboards::queryBuilderStatic()
            ->select()
            ->withRelation('FrontendDashboardGroups')
            ->limit(1000)
            ->query('d9_frontdash_id');
        $result = [];
        foreach ($data['rows'] as $k => $v) {
            foreach ($v['FrontendDashboardGroups'] as $k2 => $v2) {
                // group exists
                if (!isset($result[$v2['d9_frontgrp_name']])) {
                    $result[$v2['d9_frontgrp_name']] = [
                        'name' => $v2['d9_frontgrp_name'],
                        'counter' => 0,
                        'options' => [],
                    ];
                }
                if (!isset($result[$v2['d9_frontgrp_name']]['options'][$v['d9_frontdash_name']])) {
                    $result[$v2['d9_frontgrp_name']]['options'][$v['d9_frontdash_name']] = [
                        'id' => $v['d9_frontdash_id'],
                        'name' => $v['d9_frontdash_name'],
                    ];
                    $result[$v2['d9_frontgrp_name']]['counter']++;
                }
            }
        }
        // sort
        array_key_sort($result, ['name' => SORT_ASC]);
        // render html
        $html = '<ul class="list-group">';
        foreach ($result as $v) {
            $html .= '<li class="list-group-item">';
            $html .= $v['name'];
            $html .= \HTML::badge(['value' => $v['counter']]);
            $html .= '<br/>';
            $html .= '<ol class="nf_list_ol">';
            foreach ($v['options'] as $v2) {
                $html .= '<li>';
                $html .= \HTML::a([
                    'href' => '/Numbers/Users/Dashboards/Controller/ViewDashboards/_Edit?d9_frontdash_id=' . $v2['id'],
                    'value' => $v2['name']
                ]);
                $html .= '</li>';
            }
            $html .= '</ol>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= <<<CSST
<style>
.nf_list_ol {
    list-style: auto !important;
}
</style>
CSST;
        //$html .= print_r2($result, 'Dashboards', true);
        return \HTML::segment([
            'type' => 'primary',
            'header' => [
                'title' => loc('NF.System.ViewDashboards', 'View Dashboards'),
                'icon' => ['type' => 'fa-regular fa-square-full'],
            ],
            'value' => $html
        ]);
    }

    public function actionEdit()
    {
        $input =  \Request::input();
        if (!empty($input['d9_frontdash_id'])) {
            $input['d9_frontdash_id1'] = $input['d9_frontdash_id'];
            $input['d9_frontdash_id2'] = $input['d9_frontdash_id'];
            unset($input['d9_frontdash_id']);
        }
        if (empty($input['date_type'])) {
            $input = array_merge($input, DateTypes::generateStartAndEndDates('LAST_30_DAYS', null));
        }
        $form = new \Numbers\Users\Dashboards\Form\List2\Frontend\ViewDashboards([
            'input' => $input,
        ]);
        return $form->render();
    }

    public function actionOptionsNameGenerator()
    {
        $data = \Numbers\Users\Dashboards\Model\Frontend\Dashboards::getStatic([
            'where' => [
                'd9_frontdash_tenant_id' => \Tenant::id(),
                'd9_frontdash_inserted_user_id' => \User::id(),
            ],
            'limit' => 10,
            'pk' => ['d9_frontdash_id']
        ]);
        $result = '<ul>';
        foreach ($data as $k => $v) {
            $result .= '<li>';
            $result .= \HTML::a([
                'class' => 'btn btn-link btn-link-grey',
                'href' => '/Numbers/Users/Dashboards/Controller/ViewDashboards/_Edit?d9_frontdash_id=' . $k,
                'value' => \HTML::icon(['type' => 'fa-regular fa-square-full']) . ' ' . $v['d9_frontdash_name'],
            ]);
            $result .= '</li>';
        }
        $result .= '</ul>';
        $result .= <<<CSST
<style>
.btn-link-grey {
    font-size: 1em;
    vertical-align: middle;
    cursor: pointer;
    text-align: left;
    color: grey !important;
}
</style>
CSST;
        \Layout::renderAs($result, 'text/htmlplain');
    }

    public function actionContentGenerator()
    {
        $input = \Request::input();
        // validate token
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'] ?? '', ['content.generator.view']);
        // fetch data
        $data = \Numbers\Users\Dashboards\DataSource\Backend\Dashboards::getSingleStatic([
            'where' => [
                'd9_backdash_code' => $token_data['data']['d9_backdash_code'],
            ]
        ]);
        $model = new $data['d9_backdash_model']();
        $result = $model->render($input + [
            '__backend_dashboard' => $data,
        ]);
        \Layout::renderAs($result['html'], 'text/htmlplain');
    }
}
