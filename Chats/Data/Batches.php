<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Data;

use Object\Import;

class Batches extends Import
{
    public $data = [
        'batch_types' => [
            'options' => [
                'pk' => ['tm_batchtype_tenant_id', 'tm_batchtype_code'],
                'model' => '\Numbers\Tenants\Widgets\Batches\Model\Types',
                'method' => 'save_insert_new'
            ],
            'data' => [
                [
                    'tm_batchtype_tenant_id' => null,
                    'tm_batchtype_code' => 'C5_CHATS',
                    'tm_batchtype_name' => 'C/5 Chats',
                    'tm_batchtype_prefix' => 'C5A',
                    'tm_batchtype_length' => 22,
                    'tm_batchtype_suffix' => '',
                    'tm_batchtype_counter' => 0,
                    'tm_batchtype_inactive' => 0
                ],
                [
                    'tm_batchtype_tenant_id' => null,
                    'tm_batchtype_code' => 'C5_CHAT_CONVERSATION',
                    'tm_batchtype_name' => 'C/5 Chat Conversation',
                    'tm_batchtype_prefix' => 'C5C',
                    'tm_batchtype_length' => 22,
                    'tm_batchtype_suffix' => '',
                    'tm_batchtype_counter' => 0,
                    'tm_batchtype_inactive' => 0
                ],
                [
                    'tm_batchtype_tenant_id' => null,
                    'tm_batchtype_code' => 'C5_CHAT_THREAD',
                    'tm_batchtype_name' => 'C/5 Chat Thread',
                    'tm_batchtype_prefix' => 'C5T',
                    'tm_batchtype_length' => 22,
                    'tm_batchtype_suffix' => '',
                    'tm_batchtype_counter' => 0,
                    'tm_batchtype_inactive' => 0
                ],
            ]
        ],
    ];
}
