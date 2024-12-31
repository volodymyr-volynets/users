<?php

namespace Numbers\Users\Users\Model\Setting\Policy;
class PoliciesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Setting\Policy\Policies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_setpolicy_tenant_id','um_setpolicy_module_id','um_setpolicy_sm_policy_tenant_id','um_setpolicy_sm_policy_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_setpolicy_tenant_id = NULL {
                        get => $this->um_setpolicy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_tenant_id', $value);
                            $this->um_setpolicy_tenant_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $um_setpolicy_timestamp = 'now()' {
                        get => $this->um_setpolicy_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_timestamp', $value);
                            $this->um_setpolicy_timestamp = $value;
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
    public int|null $um_setpolicy_module_id = NULL {
                        get => $this->um_setpolicy_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_module_id', $value);
                            $this->um_setpolicy_module_id = $value;
                        }
                    }

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_setpolicy_sm_policy_tenant_id = NULL {
                        get => $this->um_setpolicy_sm_policy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_sm_policy_tenant_id', $value);
                            $this->um_setpolicy_sm_policy_tenant_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_setpolicy_sm_policy_code = null {
                        get => $this->um_setpolicy_sm_policy_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_sm_policy_code', $value);
                            $this->um_setpolicy_sm_policy_code = $value;
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
    public int|null $um_setpolicy_inactive = 0 {
                        get => $this->um_setpolicy_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolicy_inactive', $value);
                            $this->um_setpolicy_inactive = $value;
                        }
                    }
}
