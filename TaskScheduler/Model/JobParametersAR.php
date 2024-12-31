<?php

namespace Numbers\Users\TaskScheduler\Model;
class JobParametersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\TaskScheduler\Model\JobParameters::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_jbparam_tenant_id','ts_jbparam_job_id','ts_jbparam_name'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $ts_jbparam_tenant_id = NULL {
                        get => $this->ts_jbparam_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_jbparam_tenant_id', $value);
                            $this->ts_jbparam_tenant_id = $value;
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
    public int|null $ts_jbparam_job_id = null {
                        get => $this->ts_jbparam_job_id;
                        set {
                            $this->setFullPkAndFilledColumn('ts_jbparam_job_id', $value);
                            $this->ts_jbparam_job_id = $value;
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
    public string|null $ts_jbparam_name = null {
                        get => $this->ts_jbparam_name;
                        set {
                            $this->setFullPkAndFilledColumn('ts_jbparam_name', $value);
                            $this->ts_jbparam_name = $value;
                        }
                    }

    /**
     * Value
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $ts_jbparam_value = null {
                        get => $this->ts_jbparam_value;
                        set {
                            $this->setFullPkAndFilledColumn('ts_jbparam_value', $value);
                            $this->ts_jbparam_value = $value;
                        }
                    }
}
