<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\DataSource;

class ChatChannels extends Chats
{
    public $pk = ['c5_chat_uuid'];
    public $options_map = [
        'c5_chatchannel_name' => 'name',
        'c5_chatchannel_mention' => 'name',
        'inactive' => 'inactive',
    ];
    public $options_active = [
        'inactive' => 0,
    ];
    public $initial_parameters = [
        'only_channels' => true,
        'for_current_user' => true,
        'load_all' => true,
    ];
}
