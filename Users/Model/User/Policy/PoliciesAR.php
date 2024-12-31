<?php

namespace Numbers\Users\Users\Model\User\Policy;
class PoliciesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Policy\Policies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrpolicy_tenant_id','um_usrpolicy_user_id','um_usrpolicy_sm_policy_tenant_id','um_usrpolicy_sm_policy_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrpolicy_tenant_id = NULL {
                        get => $this->um_usrpolicy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_tenant_id', $value);
                            $this->um_usrpolicy_tenant_id = $value;
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
    public string|null $um_usrpolicy_timestamp = 'now()' {
                        get => $this->um_usrpolicy_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_timestamp', $value);
                            $this->um_usrpolicy_timestamp = $value;
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
    public int|null $um_usrpolicy_user_id = NULL {
                        get => $this->um_usrpolicy_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_user_id', $value);
                            $this->um_usrpolicy_user_id = $value;
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
    public int|null $um_usrpolicy_sm_policy_tenant_id = NULL {
                        get => $this->um_usrpolicy_sm_policy_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_sm_policy_tenant_id', $value);
                            $this->um_usrpolicy_sm_policy_tenant_id = $value;
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
    public string|null $um_usrpolicy_sm_policy_code = null {
                        get => $this->um_usrpolicy_sm_policy_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_sm_policy_code', $value);
                            $this->um_usrpolicy_sm_policy_code = $value;
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
    public int|null $um_usrpolicy_inactive = 0 {
                        get => $this->um_usrpolicy_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrpolicy_inactive', $value);
                            $this->um_usrpolicy_inactive = $value;
                        }
                    }
}
