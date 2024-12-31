<?php

namespace Numbers\Users\TaskScheduler\Model;
class TaskParametersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\TaskScheduler\Model\TaskParameters::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_tskparam_task_code','ts_tskparam_name'];
    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $ts_tskparam_task_code = null {
                        get => $this->ts_tskparam_task_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_tskparam_task_code', $value);
                            $this->ts_tskparam_task_code = $value;
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
    public string|null $ts_tskparam_name = null {
                        get => $this->ts_tskparam_name;
                        set {
                            $this->setFullPkAndFilledColumn('ts_tskparam_name', $value);
                            $this->ts_tskparam_name = $value;
                        }
                    }

    /**
     * Description
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $ts_tskparam_description = null {
                        get => $this->ts_tskparam_description;
                        set {
                            $this->setFullPkAndFilledColumn('ts_tskparam_description', $value);
                            $this->ts_tskparam_description = $value;
                        }
                    }

    /**
     * Default
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $ts_tskparam_default = null {
                        get => $this->ts_tskparam_default;
                        set {
                            $this->setFullPkAndFilledColumn('ts_tskparam_default', $value);
                            $this->ts_tskparam_default = $value;
                        }
                    }

    /**
     * Mandatory
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $ts_tskparam_mandatory = 0 {
                        get => $this->ts_tskparam_mandatory;
                        set {
                            $this->setFullPkAndFilledColumn('ts_tskparam_mandatory', $value);
                            $this->ts_tskparam_mandatory = $value;
                        }
                    }
}
