<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormStandalone;

use Object\Form\Wrapper\Base;
use Numbers\AI\SDK\Model\Prompts;

class ChatFormStandaloneAddPrompt extends Base
{
    public $form_link = 'c5_chat_standalone_add_prompt_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Standalone Add Prompt Form';
    public $options = [
        'actions' => [
            //'refresh' => true,
        ],
        'skip_web_sockets' => true,
        'skip_action_line' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 300],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'ai_prompt_code' => [
                'ai_prompt_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Prompt', 'domain' => 'code255', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Prompts::optionsActive'],
            ],
            self::HIDDEN => [
                'c5_chat_id' => ['label_name' => 'Chat #', 'domain' => 'chat_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'um_user_id' => ['label_name' => 'User #', 'domain' => 'user_id', 'null' => true, 'required' => true, 'method' => 'hidden'],
                'ai_prompt_existing_prompt' => ['label_name' => 'Existing Prompt', 'domain' => 'content', 'null' => true, 'method' => 'hidden'],
                '__run_uuid' => ['label_name' => 'Run UUID', 'domain' => 'uuid', 'null' => true, 'required' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [];

    public $loc = [];

    public function validate(\Object\Form\Base & $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        // process existing prompt
        $existing_prompt = '';
        if (!empty($form->values['ai_prompt_existing_prompt'])) {
            $form->values['ai_prompt_existing_prompt'] = trim($form->values['ai_prompt_existing_prompt']);
            if (is_html($form->values['ai_prompt_existing_prompt'])) {
                $existing_prompt = $form->values['ai_prompt_existing_prompt'] . '<br/><br/>';
            } else {
                $existing_prompt = nl2br($form->values['ai_prompt_existing_prompt'] . "\n\n");
            }
        }
        // generate js event
        $form->dispatchJSEvent('nf_c5_chat_add_prompt_form_event', [
            'ai_prompt_code' => $form->values['ai_prompt_code'],
            'ai_prompt_content' => $existing_prompt . nl2br2(Prompts::getSingleStatic([
                'where' => [
                    'ai_prompt_tenant_id' => \Tenant::id(),
                    'ai_prompt_code' => $form->values['ai_prompt_code'],
                ]
            ])['ai_prompt_content']),
            '__run_uuid' => $form->values['__run_uuid'],
        ]);
        $form->hideSubform();
    }
}
