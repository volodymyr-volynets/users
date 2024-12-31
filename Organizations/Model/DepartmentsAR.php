<?php

namespace Numbers\Users\Organizations\Model;
class DepartmentsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Departments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_department_tenant_id','on_department_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_department_tenant_id = NULL {
                        get => $this->on_department_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_tenant_id', $value);
                            $this->on_department_tenant_id = $value;
                        }
                    }

    /**
     * SBU #
     *
     *
     *
     * {domain{department_id_sequence}}
     *
     * @var int|null Domain: department_id_sequence Type: serial
     */
    public int|null $on_department_id = null {
                        get => $this->on_department_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_id', $value);
                            $this->on_department_id = $value;
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
    public string|null $on_department_code = null {
                        get => $this->on_department_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_code', $value);
                            $this->on_department_code = $value;
                        }
                    }

    /**
     * SBU #
     *
     *
     *
     * {domain{sbu_id}}
     *
     * @var int|null Domain: sbu_id Type: integer
     */
    public int|null $on_department_sbu_id = NULL {
                        get => $this->on_department_sbu_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_sbu_id', $value);
                            $this->on_department_sbu_id = $value;
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
    public string|null $on_department_name = null {
                        get => $this->on_department_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_name', $value);
                            $this->on_department_name = $value;
                        }
                    }

    /**
     * Primary Contact
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $on_department_primary_contact = null {
                        get => $this->on_department_primary_contact;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_primary_contact', $value);
                            $this->on_department_primary_contact = $value;
                        }
                    }

    /**
     * Department Head
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $on_department_head = null {
                        get => $this->on_department_head;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_head', $value);
                            $this->on_department_head = $value;
                        }
                    }

    /**
     * Description
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $on_department_description = null {
                        get => $this->on_department_description;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_description', $value);
                            $this->on_department_description = $value;
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
    public int|null $on_department_inactive = 0 {
                        get => $this->on_department_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_inactive', $value);
                            $this->on_department_inactive = $value;
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
    public string|null $on_department_optimistic_lock = 'now()' {
                        get => $this->on_department_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_optimistic_lock', $value);
                            $this->on_department_optimistic_lock = $value;
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
    public string|null $on_department_inserted_timestamp = null {
                        get => $this->on_department_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_inserted_timestamp', $value);
                            $this->on_department_inserted_timestamp = $value;
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
    public int|null $on_department_inserted_user_id = NULL {
                        get => $this->on_department_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_department_inserted_user_id', $value);
                            $this->on_department_inserted_user_id = $value;
                        }
                    }
}
