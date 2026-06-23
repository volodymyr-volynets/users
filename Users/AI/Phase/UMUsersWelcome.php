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

use Numbers\Users\Widgets\Phases\Classes\WelcomeModel;
use Numbers\Users\Widgets\Phases\Model\Steps;
use Numbers\AI\SDK\Model\Tools;

class UMUsersWelcome extends WelcomeModel
{
    /**
     * Generate welcome message
     *
     * @param array $options
     * @return array{error: array, success: bool, summary: string}
     */
    public function generateWelcomeMessage(array $options = []): array
    {
        $summary = '<h6>Hi, welcome!</h6>';
        $summary .= '<br/>';
        // if we have owner type and model we load steps
        if (!empty($options['um_ownertype_code']) && !empty($options['sm_model_code']) && !empty($options['pk'])) {
            $steps = Steps::getStatic([
                'where' => [
                    'wg_phasestep_tenant_id' => $options['tm_tenant_id'],
                    'wg_phasestep_wg_phasestptype_code' => ['FIELD_CHECK'],
                    'wg_phasestep_um_ownertype_code' => $options['um_ownertype_code'],
                    'wg_phasestep_sm_model_code' => $options['sm_model_code'],
                ],
                'pk' => ['wg_phasestep_code']
            ]);
            if (!empty($steps)) {
                $summary .= '<p>Existing Checks:</p>';
                $summary .= '<ul class="list-group">';
                foreach ($steps as $k => $v) {
                    $step_model = \Factory::model($v['wg_phasestep_model'], true);
                    $settings = is_json($v['wg_phasestep_settings_json']) ? json_decode($v['wg_phasestep_settings_json'], true) : $v['wg_phasestep_settings_json'];
                    $settings['tm_tenant_id'] = $options['tm_tenant_id'];
                    $settings['form'] = [];
                    if (!empty($v['wg_phasestep_is_form']) && !empty($v['wg_phasestep_ai_tool_code'])) {
                        $settings['form'] = Tools::getSingleStatic([
                            'where' => [
                                'ai_tool_tenant_id' => $options['tm_tenant_id'],
                                'ai_tool_code' => $v['wg_phasestep_ai_tool_code']
                            ]
                        ]);
                    }
                    $step_result = $step_model->check($options['pk'], $settings);
                    if ($step_result['success']) {
                        $summary .= '<li class="list-group-item">';
                        $summary .= '<h6>' . $v['wg_phasestep_name'] . '</h6>';
                        $summary .= $step_result['summary'];
                        $summary .= '</li>';
                    }
                }
                $summary .= '</ul>';
            }
        }
        return [
            'success' => true,
            'error' => [],
            'summary' => $summary,
        ];
    }
}
