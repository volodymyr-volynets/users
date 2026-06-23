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

class ComputedFieldTasksAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ComputedFieldTasks::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_compfldtsk_code'];

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_compfldtsk_code = null {
        get => $this->ts_compfldtsk_code;
        set {
            $this->setFullPkAndFilledColumn('ts_compfldtsk_code', $value);
            $this->ts_compfldtsk_code = $value;
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
    public string|null $ts_compfldtsk_name = null {
        get => $this->ts_compfldtsk_name;
        set {
            $this->setFullPkAndFilledColumn('ts_compfldtsk_name', $value);
            $this->ts_compfldtsk_name = $value;
        }
    }

    /**
     * Model
     *
     *
     *
     * {domain{model}}
     *
     * @var string|null Domain: model Type: varchar
     */
    public string|null $ts_compfldtsk_model = null {
        get => $this->ts_compfldtsk_model;
        set {
            $this->setFullPkAndFilledColumn('ts_compfldtsk_model', $value);
            $this->ts_compfldtsk_model = $value;
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
    public int|null $ts_compfldtsk_inactive = 0 {
        get => $this->ts_compfldtsk_inactive;
        set {
            $this->setFullPkAndFilledColumn('ts_compfldtsk_inactive', $value);
            $this->ts_compfldtsk_inactive = $value;
        }
    }
}
