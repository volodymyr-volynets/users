<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\Owner;

use Numbers\Users\Users\DataSource\Owners;

class PMs extends Owners
{
    public $alias_model = true;
    public $options_map = [
        'um_user_name' => 'name',
        'um_user_company' => 'name',
        'um_user_id' => 'name',
        'um_user_inactive' => 'inactive'
    ];
}
