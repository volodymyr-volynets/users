<?php

namespace Numbers\Users\Users\Model\User\Linked;
class AccountsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Linked\Accounts::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrlinked_tenant_id','um_usrlinked_module_id','um_usrlinked_user_id','um_usrlinked_type_code','um_usrlinked_linked_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrlinked_tenant_id = NULL {
                        get => $this->um_usrlinked_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_tenant_id', $value);
                            $this->um_usrlinked_tenant_id = $value;
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
    public int|null $um_usrlinked_module_id = NULL {
                        get => $this->um_usrlinked_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_module_id', $value);
                            $this->um_usrlinked_module_id = $value;
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
    public string|null $um_usrlinked_timestamp = 'now()' {
                        get => $this->um_usrlinked_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_timestamp', $value);
                            $this->um_usrlinked_timestamp = $value;
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
    public int|null $um_usrlinked_user_id = NULL {
                        get => $this->um_usrlinked_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_user_id', $value);
                            $this->um_usrlinked_user_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\Linked\Types}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrlinked_type_code = null {
                        get => $this->um_usrlinked_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_type_code', $value);
                            $this->um_usrlinked_type_code = $value;
                        }
                    }

    /**
     * Linked #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_usrlinked_linked_id = NULL {
                        get => $this->um_usrlinked_linked_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_linked_id', $value);
                            $this->um_usrlinked_linked_id = $value;
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
    public int|null $um_usrlinked_inactive = 0 {
                        get => $this->um_usrlinked_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrlinked_inactive', $value);
                            $this->um_usrlinked_inactive = $value;
                        }
                    }
}
