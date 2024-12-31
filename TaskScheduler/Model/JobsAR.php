<?php

namespace Numbers\Users\TaskScheduler\Model;
class JobsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\TaskScheduler\Model\Jobs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_job_tenant_id','ts_job_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ts_job_tenant_id = NULL {
                        get => $this->ts_job_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_tenant_id', $value);
                            $this->ts_job_tenant_id = $value;
                        }
                    }

    /**
     * Job #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $ts_job_id = null {
                        get => $this->ts_job_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_id', $value);
                            $this->ts_job_id = $value;
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
    public string|null $ts_job_daemon_code = null {
                        get => $this->ts_job_daemon_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_daemon_code', $value);
                            $this->ts_job_daemon_code = $value;
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
    public string|null $ts_job_task_code = null {
                        get => $this->ts_job_task_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_task_code', $value);
                            $this->ts_job_task_code = $value;
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
    public string|null $ts_job_name = null {
                        get => $this->ts_job_name;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_name', $value);
                            $this->ts_job_name = $value;
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
    public int|null $ts_job_user_id = NULL {
                        get => $this->ts_job_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_user_id', $value);
                            $this->ts_job_user_id = $value;
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
    public string|null $ts_job_cron_minute = null {
                        get => $this->ts_job_cron_minute;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_minute', $value);
                            $this->ts_job_cron_minute = $value;
                        }
                    }

    /**
     * Cron (Hours)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_job_cron_hour = null {
                        get => $this->ts_job_cron_hour;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_hour', $value);
                            $this->ts_job_cron_hour = $value;
                        }
                    }

    /**
     * Cron (Day of Month)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_job_cron_day_of_month = null {
                        get => $this->ts_job_cron_day_of_month;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_day_of_month', $value);
                            $this->ts_job_cron_day_of_month = $value;
                        }
                    }

    /**
     * Cron (Month)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_job_cron_month = null {
                        get => $this->ts_job_cron_month;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_month', $value);
                            $this->ts_job_cron_month = $value;
                        }
                    }

    /**
     * Cron (Day of Week)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_job_cron_day_of_week = null {
                        get => $this->ts_job_cron_day_of_week;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_day_of_week', $value);
                            $this->ts_job_cron_day_of_week = $value;
                        }
                    }

    /**
     * Cron (Years)
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $ts_job_cron_year = null {
                        get => $this->ts_job_cron_year;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_cron_year', $value);
                            $this->ts_job_cron_year = $value;
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
    public string|null $ts_job_timezone_code = null {
                        get => $this->ts_job_timezone_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_timezone_code', $value);
                            $this->ts_job_timezone_code = $value;
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
    public int|null $ts_job_module_id = NULL {
                        get => $this->ts_job_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_module_id', $value);
                            $this->ts_job_module_id = $value;
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
    public int|null $ts_job_inactive = 0 {
                        get => $this->ts_job_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_inactive', $value);
                            $this->ts_job_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $ts_job_optimistic_lock = 'now()' {
                        get => $this->ts_job_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_optimistic_lock', $value);
                            $this->ts_job_optimistic_lock = $value;
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
    public string|null $ts_job_inserted_timestamp = null {
                        get => $this->ts_job_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_inserted_timestamp', $value);
                            $this->ts_job_inserted_timestamp = $value;
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
    public int|null $ts_job_inserted_user_id = NULL {
                        get => $this->ts_job_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_inserted_user_id', $value);
                            $this->ts_job_inserted_user_id = $value;
                        }
                    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $ts_job_updated_timestamp = null {
                        get => $this->ts_job_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_updated_timestamp', $value);
                            $this->ts_job_updated_timestamp = $value;
                        }
                    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $ts_job_updated_user_id = NULL {
                        get => $this->ts_job_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_job_updated_user_id', $value);
                            $this->ts_job_updated_user_id = $value;
                        }
                    }
}
