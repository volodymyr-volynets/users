<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Task;

use Numbers\Users\TaskScheduler\Helper\CreateJob;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Numbers\Users\Users\Model\Import\Presets;

class ProcessImports extends Base
{
    public $form_link = 'um_tasks_process_imports';
    public $module_code = 'UM';
    public $title = 'U/M Process Imports Task';
    public $options = [
        'segment' => self::SEGMENT_TASK,
        'actions' => [
            'refresh' => true
        ],
        'no_ajax_form_reload' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'dates' => [
                'um_imppreset_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Preset #', 'domain' => 'preset_id', 'null' => true, 'required' => true, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Import\Presets'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_DATA,
            ]
        ]
    ];

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        $preset = Presets::getSingleStatic([
            'where' => [
                'um_imppreset_id' => $form->values['um_imppreset_id'],
            ]
        ]);
        $result = \Factory::model($preset['um_imppreset_activation_method'])->process();
        if (!$result['success']) {
            $form->error(DANGER, $result['error']);
        } else {
            $form->error(SUCCESS, Messages::OPERATION_EXECUTED);
            if (!empty($result['legend'])) {
                foreach ($result['legend'] as $v) {
                    $form->error(SUCCESS, $v, null, ['skip_i18n' => true]);
                }
            }
        }
    }
}
