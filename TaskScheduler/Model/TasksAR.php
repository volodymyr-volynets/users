<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Model;

use Object\ActiveRecord;

class TasksAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Tasks::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_task_code'];

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $ts_task_code = null {
        get => $this->ts_task_code;
        set {
            $this->setFullPkAndFilledColumn('ts_task_code', $value);
            $this->ts_task_code = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $ts_task_name = null {
        get => $this->ts_task_name;
        set {
            $this->setFullPkAndFilledColumn('ts_task_name', $value);
            $this->ts_task_name = $value;
        }
    }

    /**
     * Model
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_task_model = null {
        get => $this->ts_task_model;
        set {
            $this->setFullPkAndFilledColumn('ts_task_model', $value);
            $this->ts_task_model = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ts_task_inactive = 0 {
        get => $this->ts_task_inactive;
        set {
            $this->setFullPkAndFilledColumn('ts_task_inactive', $value);
            $this->ts_task_inactive = $value;
        }
    }
}
