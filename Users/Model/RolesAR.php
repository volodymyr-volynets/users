<?php

namespace Numbers\Users\Users\Model;
class RolesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Roles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_role_tenant_id','um_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_role_tenant_id = NULL {
                        get => $this->um_role_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_tenant_id', $value);
                            $this->um_role_tenant_id = $value;
                        }
                    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id_sequence}}
     *
     * @var int|null Domain: role_id_sequence Type: serial
     */
    public int|null $um_role_id = null {
                        get => $this->um_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_id', $value);
                            $this->um_role_id = $value;
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
    public string|null $um_role_code = null {
                        get => $this->um_role_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_code', $value);
                            $this->um_role_code = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_role_type_id = NULL {
                        get => $this->um_role_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_type_id', $value);
                            $this->um_role_type_id = $value;
                        }
                    }

    /**
     * Department #
     *
     *
     *
     * {domain{department_id}}
     *
     * @var int|null Domain: department_id Type: integer
     */
    public int|null $um_role_department_id = NULL {
                        get => $this->um_role_department_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_department_id', $value);
                            $this->um_role_department_id = $value;
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
    public string|null $um_role_name = null {
                        get => $this->um_role_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_name', $value);
                            $this->um_role_name = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $um_role_icon = null {
                        get => $this->um_role_icon;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_icon', $value);
                            $this->um_role_icon = $value;
                        }
                    }

    /**
     * Global
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_role_global = 0 {
                        get => $this->um_role_global;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_global', $value);
                            $this->um_role_global = $value;
                        }
                    }

    /**
     * Super Admin
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_role_super_admin = 0 {
                        get => $this->um_role_super_admin;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_super_admin', $value);
                            $this->um_role_super_admin = $value;
                        }
                    }

    /**
     * Weight
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_role_weight = NULL {
                        get => $this->um_role_weight;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_weight', $value);
                            $this->um_role_weight = $value;
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
    public int|null $um_role_inactive = 0 {
                        get => $this->um_role_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_inactive', $value);
                            $this->um_role_inactive = $value;
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
    public string|null $um_role_optimistic_lock = 'now()' {
                        get => $this->um_role_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_role_optimistic_lock', $value);
                            $this->um_role_optimistic_lock = $value;
                        }
                    }
}
