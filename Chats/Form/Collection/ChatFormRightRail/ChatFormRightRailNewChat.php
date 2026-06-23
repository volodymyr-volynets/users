<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Form\Collection\ChatFormRightRail;

use Json2;
use Object\Form\Wrapper\Base;
use Numbers\Users\Chats\Helper\Chats as ChatsHelper;
use Numbers\Backend\Db\Common\Model\Models as ModelsModel;
use Numbers\Tenants\Widgets\Batches\Helper\Save as BatchHelperSave;
use Numbers\Users\Chats\Model\Chats as ChatsModel;
use Numbers\Users\Users\Helper\OwnerTypes;

class ChatFormRightRailNewChat extends Base
{
    public $form_link = 'c5_chat_right_rail_new_chat_form';
    public $module_code = 'C5';
    public $title = 'C/5 Chat Right Rail New Chat Form';
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
            'c5_chatstarttype_code' => [
                'c5_chatstarttype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'default' => 'AI', 'required' => true, 'percent' => 100, 'method' => 'select', 'mo_choose' => true, 'options_model' => '\Numbers\Users\Chats\Model\Chat\ChatStartTypes', 'onchange' => 'this.form.submit();'],
            ],
            'c5_chat_ai_agent_code' => [
                'c5_chat_ai_agent_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Agent', 'domain' => 'code255', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\AI\SDK\Model\Agents::optionsActive', 'options_params' => ['ai_agent_text' => 1]],
                'um_ownertype_id' => ['order' => 2, 'label_name' => 'Owner Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\User\Owner\Types::optionsGroupedByMyOwners'],
            ],
            self::HIDDEN => [
                'main_model_pk' => ['label_name' => 'PK', 'type' => 'json', 'null' => true, 'method' => 'hidden'],
                'main_model_model' => ['label_name' => 'Model', 'type' => 'text', 'null' => true, 'method' => 'hidden'],
                'main_model_name' => ['label_name' => 'Name', 'type' => 'text', 'null' => true, 'method' => 'hidden'],
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
        $chat_result = ChatsHelper::create([
            'um_user_id' => \User::id(),
            'sm_session_id' => session_id(),
            'um_user_name' => \User::get('name') ?? 'Anonymous',
            'c5_chattype_code' => 'GENERAL',
            'c5_chat_ai_agent_code' => $form->values['c5_chat_ai_agent_code'],
            'c5_chat_provide_welcome' => 1,
        ]);
        if ($chat_result['success']) {
            $json = new Json2($form->values['main_model_pk']);
            $__pk = $json->toArrayOrScalar();
            if (count($__pk) > 1) {
                $form->error(DANGER, '$__pk id composite key');
                return;
            }
            // chat record
            if (count($__pk) != 0) {
                $raw_batch_records = [];
                $raw_batch_records['C5::CHATS'] = [
                    'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Chats\Model\Chats', null, null, ['first' => true]),
                    'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Chats',
                    'tm_batchrecord_no_data_model_role_code' => 'chat',
                    'tm_batchrecord_field_code' => 'c5_chat_id',
                    'tm_batchrecord_field_name' => 'C/5 Chat #',
                    'tm_batchrecord_field_value_id' => $chat_result['c5_chat_id'],
                    'tm_batchrecord_field_value_code' => null,
                    'tm_batchrecord_field_value_name' => 'Chat #' . $chat_result['c5_chat_id'], //' UUID: ' . $chat_result['c5_chat_uuid']
                    'tm_batchrecord_is_context' => 0,
                    'tm_batchrecord_inactive' => 0,
                ];
                $model = \Factory::model($form->values['main_model_model']);
                $raw_batch_records['C5::PK'] = [
                    'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic($form->values['main_model_model'], null, null, ['first' => true]),
                    'tm_batchrecord_sm_model_code' => $form->values['main_model_model'],
                    'tm_batchrecord_no_data_model_role_code' => 'context_record',
                    'tm_batchrecord_field_code' => key($__pk),
                    'tm_batchrecord_field_name' => $model->batches['edit']['batch_name'],
                    'tm_batchrecord_field_value_id' => current($__pk),
                    'tm_batchrecord_field_value_code' => null,
                    'tm_batchrecord_field_value_name' => $form->values['main_model_name'],
                    'tm_batchrecord_is_context' => 1,
                    'tm_batchrecord_inactive' => 0,
                ];
                foreach (OwnerTypes::getAllOwnerTypes() as $k => $v) {
                    // we only add selected owners to the context
                    if (empty($form->values['um_ownertype_id'][$v['um_ownertype_id']])) {
                        continue;
                    }
                    $raw_batch_records['C5::OWNER_' . $k] = [
                        'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Users\Model\User\Owner\Types', null, null, ['first' => true]),
                        'tm_batchrecord_sm_model_code' => '\Numbers\Users\Users\Model\User\Owner\Types',
                        'tm_batchrecord_no_data_model_role_code' => 'owner_type',
                        'tm_batchrecord_field_code' => 'um_ownertype_id',
                        'tm_batchrecord_field_name' => 'U/M Owner Type #',
                        'tm_batchrecord_field_value_id' => $v['um_ownertype_id'],
                        'tm_batchrecord_field_value_code' => $v['um_ownertype_code'],
                        'tm_batchrecord_field_value_name' => $v['um_ownertype_name'],
                        'tm_batchrecord_is_context' => 1,
                        'tm_batchrecord_inactive' => 0,
                    ];
                }
                $raw_batch_records['C5::CURRENT_USER'] = [
                    'tm_batchrecord_sm_model_id' => ModelsModel::loadIDByCodeStatic('\Numbers\Users\Users\Model\Users', null, null, ['first' => true]),
                    'tm_batchrecord_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                    'tm_batchrecord_no_data_model_role_code' => 'executing_user',
                    'tm_batchrecord_field_code' => 'um_user_id',
                    'tm_batchrecord_field_name' => 'U/M User #',
                    'tm_batchrecord_field_value_id' => \User::id(),
                    'tm_batchrecord_field_value_code' => null,
                    'tm_batchrecord_field_value_name' => \User::get('name') ?? 'Anonymous',
                    'tm_batchrecord_is_context' => 1,
                    'tm_batchrecord_inactive' => 0,
                ];
                $batch_helper_save = BatchHelperSave::create(null, 'C5_CHATS', $raw_batch_records);
                if (!$batch_helper_save['success']) {
                    $form->error(DANGER, $batch_helper_save['error']);
                    return;
                }
                $batch_update_chat_result = ChatsModel::collectionStatic()->merge([
                    'c5_chat_tenant_id' => \Tenant::id(),
                    'c5_chat_id' => $chat_result['c5_chat_id'],
                    'c5_chat_tm_batchentry_code' => $batch_helper_save['tm_batchentry_code'],
                    'c5_chat_batch_context_counter' => $batch_helper_save['batch_context_counter'],
                ]);
                if (!$batch_update_chat_result['success']) {
                    $form->error(DANGER, $batch_update_chat_result['error']);
                    return;
                }
            }
            // redirect
            $params = array_merge_hard($__pk, [
                '__right_rail_input' => [
                    'c5_chat_uuid' => $chat_result['c5_chat_uuid'],
                ],
                '__right_rail_panel' => 1,
            ]);
            $form->redirect(\Request::buildFromCurrentController(), $params, [
                'force_onload' => true,
            ]);
        } else {
            $form->error(DANGER, $chat_result['error']);
        }
    }
}
