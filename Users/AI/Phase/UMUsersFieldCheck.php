<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\AI\Phase;

use Numbers\Users\Widgets\Phases\Classes\BaseModel;
use Numbers\Users\Users\Model\Users;

class UMUsersFieldCheck extends BaseModel
{
    public function check(array $pk, array $settings = []): array
    {
        $summary = '<table width="100%" class="table table-striped">';
        $pk2 = $pk;
        $pk2['um_user_tenant_id'] = $settings['tm_tenant_id'];
        $users = Users::queryBuilderStatic()
            ->select()
            ->columns(['um_user_name' => 'um_user_name'] + $settings['fields'])
            ->whereMultiple('AND', $pk2)
            ->query(null);
        $model = new Users();
        foreach ($users['rows'][0] as $k => $v) {
            $summary .= '<tr>';
            $summary .= '<th width="1%">' . (isset($v) ? \HTML::icon(['type' => 'fa-regular fa-circle-check', 'class' => 'text-success']) : \HTML::icon(['type' => 'fa-regular fa-circle-xmark', 'class' => 'text-danger'])) . '</th>';
            $summary .= '<th width="35%">' . $model->columns[$k]['name'] . ':</th>';
            $summary .= '<td width="64%">' . (isset($v) ? $v : '<i class="text-danger">(' . loc('NF.Form.PleaseProvide', 'Please Provide') . ')</i>') . '</td>';
            $summary .= '</tr>';
        }
        // form
        if (!empty($settings['form'])) {
            $context = [];
            foreach ($pk as $k => $v) {
                $context[] = $k . ': ' . $v;
            }
            $onclick_detail = json_encode([
                'ai_tool_tool_name' => $settings['form']['ai_tool_tool_name'],
                'ai_tool_name' => $settings['form']['ai_tool_name'],
                'pk' => $pk,
                'context' => implode("<br/>", $context),
            ]);
            $onclick_event = "var event_" . $settings['form']['ai_tool_tool_name'] . " = new CustomEvent('wg_phase_form_rr_chat_event', { detail: $onclick_detail }); window.dispatchEvent(event_" . $settings['form']['ai_tool_tool_name'] . ");";
            $summary .= '<tr>';
            $summary .= '<th width="1%">' . \HTML::icon(['type' => 'fa-regular fa-hand-point-right', 'class' => 'text-info']) . '</th>';
            $summary .= '<th width="35%">' . loc('NF.Form.CallForm', 'Call Form') . ':</th>';
            $summary .= '<td width="64%">' . \HTML::a(['class' => 'btn btn-info', 'href' => 'javascript:void(0)', 'onclick' => $onclick_event, 'value' => $settings['form']['ai_tool_name']]) . '</td>';
            $summary .= '</tr>';
        }
        $summary .= '</table>';
        return [
            'success' => true,
            'error' => [],
            'summary' => $summary,
        ];
    }
}
