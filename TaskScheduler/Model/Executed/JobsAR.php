<?php

namespace Numbers\Users\TaskScheduler\Model\Executed;
class JobsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\TaskScheduler\Model\Executed\Jobs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_execjb_tenant_id','ts_execjb_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ts_execjb_tenant_id = NULL {
                        get => $this->ts_execjb_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_tenant_id', $value);
                            $this->ts_execjb_tenant_id = $value;
                        }
                    }

    /**
     * Executed Job #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $ts_execjb_id = null {
                        get => $this->ts_execjb_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_id', $value);
                            $this->ts_execjb_id = $value;
                        }
                    }

    /**
     * Job #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $ts_execjb_job_id = NULL {
                        get => $this->ts_execjb_job_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_job_id', $value);
                            $this->ts_execjb_job_id = $value;
                        }
                    }

    /**
     * Status
     *
     *
     * {options_model{\Numbers\Users\TaskScheduler\Model\Executed\Statuses}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $ts_execjb_status = NULL {
                        get => $this->ts_execjb_status;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_status', $value);
                            $this->ts_execjb_status = $value;
                        }
                    }

    /**
     * Daemon Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $ts_execjb_daemon_code = null {
                        get => $this->ts_execjb_daemon_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_daemon_code', $value);
                            $this->ts_execjb_daemon_code = $value;
                        }
                    }

    /**
     * Task Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $ts_execjb_task_code = null {
                        get => $this->ts_execjb_task_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_task_code', $value);
                            $this->ts_execjb_task_code = $value;
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
    public string|null $ts_execjb_name = null {
                        get => $this->ts_execjb_name;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_name', $value);
                            $this->ts_execjb_name = $value;
                        }
                    }

    /**
     * Execution Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $ts_execjb_datetime = null {
                        get => $this->ts_execjb_datetime;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_datetime', $value);
                            $this->ts_execjb_datetime = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ts_execjb_user_id = NULL {
                        get => $this->ts_execjb_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_user_id', $value);
                            $this->ts_execjb_user_id = $value;
                        }
                    }

    /**
     * Cron (Minutes)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_execjb_cron_expression = null {
                        get => $this->ts_execjb_cron_expression;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_cron_expression', $value);
                            $this->ts_execjb_cron_expression = $value;
                        }
                    }

    /**
     * Timezone
     *
     *
     *
     * {domain{timezone_code}}
     *
     * @var string|null Domain: timezone_code Type: varchar
     */
    public string|null $ts_execjb_timezone_code = null {
                        get => $this->ts_execjb_timezone_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_timezone_code', $value);
                            $this->ts_execjb_timezone_code = $value;
                        }
                    }

    /**
     * Parameters
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $ts_execjb_parameters = null {
                        get => $this->ts_execjb_parameters;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_parameters', $value);
                            $this->ts_execjb_parameters = $value;
                        }
                    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $ts_execjb_module_id = NULL {
                        get => $this->ts_execjb_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_module_id', $value);
                            $this->ts_execjb_module_id = $value;
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
    public int|null $ts_execjb_inactive = 0 {
                        get => $this->ts_execjb_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_inactive', $value);
                            $this->ts_execjb_inactive = $value;
                        }
                    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $ts_execjb_inserted_timestamp = null {
                        get => $this->ts_execjb_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_inserted_timestamp', $value);
                            $this->ts_execjb_inserted_timestamp = $value;
                        }
                    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ts_execjb_inserted_user_id = NULL {
                        get => $this->ts_execjb_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_execjb_inserted_user_id', $value);
                            $this->ts_execjb_inserted_user_id = $value;
                        }
                    }
}
