<?php

namespace Numbers\Users\Users\Model\Role\Policy;
class PoliciesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Policy\Policies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolpolicy_tenant_id','um_rolpolicy_role_id','um_rolpolicy_sm_policy_tenant_id','um_rolpolicy_sm_policy_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolpolicy_tenant_id = NULL {
                        get => $this->um_rolpolicy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_tenant_id', $value);
                            $this->um_rolpolicy_tenant_id = $value;
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
    public string|null $um_rolpolicy_timestamp = 'now()' {
                        get => $this->um_rolpolicy_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_timestamp', $value);
                            $this->um_rolpolicy_timestamp = $value;
                        }
                    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolpolicy_role_id = NULL {
                        get => $this->um_rolpolicy_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_role_id', $value);
                            $this->um_rolpolicy_role_id = $value;
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
    public int|null $um_rolpolicy_sm_policy_tenant_id = NULL {
                        get => $this->um_rolpolicy_sm_policy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_sm_policy_tenant_id', $value);
                            $this->um_rolpolicy_sm_policy_tenant_id = $value;
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
    public string|null $um_rolpolicy_sm_policy_code = null {
                        get => $this->um_rolpolicy_sm_policy_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_sm_policy_code', $value);
                            $this->um_rolpolicy_sm_policy_code = $value;
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
    public int|null $um_rolpolicy_inactive = 0 {
                        get => $this->um_rolpolicy_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolicy_inactive', $value);
                            $this->um_rolpolicy_inactive = $value;
                        }
                    }
}
