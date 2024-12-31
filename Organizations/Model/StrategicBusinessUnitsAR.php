<?php

namespace Numbers\Users\Organizations\Model;
class StrategicBusinessUnitsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\StrategicBusinessUnits::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_sbu_tenant_id','on_sbu_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_sbu_tenant_id = NULL {
                        get => $this->on_sbu_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_tenant_id', $value);
                            $this->on_sbu_tenant_id = $value;
                        }
                    }

    /**
     * SBU #
     *
     *
     *
     * {domain{sbu_id_sequence}}
     *
     * @var int|null Domain: sbu_id_sequence Type: serial
     */
    public int|null $on_sbu_id = null {
                        get => $this->on_sbu_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_id', $value);
                            $this->on_sbu_id = $value;
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
    public string|null $on_sbu_code = null {
                        get => $this->on_sbu_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_code', $value);
                            $this->on_sbu_code = $value;
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
    public string|null $on_sbu_name = null {
                        get => $this->on_sbu_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_name', $value);
                            $this->on_sbu_name = $value;
                        }
                    }

    /**
     * Parent Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $on_sbu_parent_organization_id = NULL {
                        get => $this->on_sbu_parent_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_parent_organization_id', $value);
                            $this->on_sbu_parent_organization_id = $value;
                        }
                    }

    /**
     * Parent Division #
     *
     *
     *
     * {domain{division_id}}
     *
     * @var int|null Domain: division_id Type: integer
     */
    public int|null $on_sbu_parent_division_id = NULL {
                        get => $this->on_sbu_parent_division_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_parent_division_id', $value);
                            $this->on_sbu_parent_division_id = $value;
                        }
                    }

    /**
     * Primary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $on_sbu_email = null {
                        get => $this->on_sbu_email;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_email', $value);
                            $this->on_sbu_email = $value;
                        }
                    }

    /**
     * Secondary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $on_sbu_email2 = null {
                        get => $this->on_sbu_email2;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_email2', $value);
                            $this->on_sbu_email2 = $value;
                        }
                    }

    /**
     * Primary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_sbu_phone = null {
                        get => $this->on_sbu_phone;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_phone', $value);
                            $this->on_sbu_phone = $value;
                        }
                    }

    /**
     * Secondary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_sbu_phone2 = null {
                        get => $this->on_sbu_phone2;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_phone2', $value);
                            $this->on_sbu_phone2 = $value;
                        }
                    }

    /**
     * Cell Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_sbu_cell = null {
                        get => $this->on_sbu_cell;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_cell', $value);
                            $this->on_sbu_cell = $value;
                        }
                    }

    /**
     * Fax
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $on_sbu_fax = null {
                        get => $this->on_sbu_fax;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_fax', $value);
                            $this->on_sbu_fax = $value;
                        }
                    }

    /**
     * Hold
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_sbu_hold = 0 {
                        get => $this->on_sbu_hold;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_hold', $value);
                            $this->on_sbu_hold = $value;
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
    public int|null $on_sbu_inactive = 0 {
                        get => $this->on_sbu_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_inactive', $value);
                            $this->on_sbu_inactive = $value;
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
    public string|null $on_sbu_optimistic_lock = 'now()' {
                        get => $this->on_sbu_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_optimistic_lock', $value);
                            $this->on_sbu_optimistic_lock = $value;
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
    public string|null $on_sbu_inserted_timestamp = null {
                        get => $this->on_sbu_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_inserted_timestamp', $value);
                            $this->on_sbu_inserted_timestamp = $value;
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
    public int|null $on_sbu_inserted_user_id = NULL {
                        get => $this->on_sbu_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sbu_inserted_user_id', $value);
                            $this->on_sbu_inserted_user_id = $value;
                        }
                    }
}
