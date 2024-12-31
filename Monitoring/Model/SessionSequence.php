<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Model;

use Object\Sequence;

class SessionSequence extends Sequence
{
    public $db_link;
    public $db_link_flag;
    public $schema;
    public $module_code = 'SM';
    public $title = 'S/M Session Sequence';
    public $name = 'sm_monitoring_session_id_seq';
    public $type = 'tenant_simple';
}
