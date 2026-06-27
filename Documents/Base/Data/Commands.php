<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Data;

use Object\Import;

class Commands extends Import
{
    public $data = [
        'tasks' => [
            'options' => [
                'pk' => ['sm_shellcommand_code'],
                'model' => '\Numbers\Backend\System\ShellCommand\Model\ShellCommands',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_shellcommand_code' => 'DT::ERASE_OLD_FILES',
                    'sm_shellcommand_name' => 'D/T Erase Old Files (Command)',
                    'sm_shellcommand_description' => 'Use this command to erase old files.',
                    'sm_shellcommand_model' => '\Numbers\Users\Documents\Base\Command\EraseOldFiles',
                    'sm_shellcommand_command' => 'dt_erase_old_files',
                    'sm_shellcommand_module_code' => 'DT',
                    'sm_shellcommand_inactive' => 0,
                ],
            ],
        ],
    ];
}
