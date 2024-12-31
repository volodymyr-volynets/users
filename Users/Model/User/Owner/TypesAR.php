<?php

namespace Numbers\Users\Users\Model\User\Owner;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Owner\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_ownertype_tenant_id','um_ownertype_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_ownertype_tenant_id = NULL {
                        get => $this->um_ownertype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_tenant_id', $value);
                            $this->um_ownertype_tenant_id = $value;
                        }
                    }

    /**
     * Type #
     *
     *
     *
     * {domain{type_id_sequence}}
     *
     * @var int|null Domain: type_id_sequence Type: smallserial
     */
    public int|null $um_ownertype_id = null {
                        get => $this->um_ownertype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_id', $value);
                            $this->um_ownertype_id = $value;
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
    public string|null $um_ownertype_code = null {
                        get => $this->um_ownertype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_code', $value);
                            $this->um_ownertype_code = $value;
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
    public string|null $um_ownertype_name = null {
                        get => $this->um_ownertype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_name', $value);
                            $this->um_ownertype_name = $value;
                        }
                    }

    /**
     * Multiple
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_ownertype_multiple = 0 {
                        get => $this->um_ownertype_multiple;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_multiple', $value);
                            $this->um_ownertype_multiple = $value;
                        }
                    }

    /**
     * Readonly
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_ownertype_readonly = 0 {
                        get => $this->um_ownertype_readonly;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_readonly', $value);
                            $this->um_ownertype_readonly = $value;
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
    public int|null $um_ownertype_inactive = 0 {
                        get => $this->um_ownertype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_inactive', $value);
                            $this->um_ownertype_inactive = $value;
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
    public string|null $um_ownertype_optimistic_lock = 'now()' {
                        get => $this->um_ownertype_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertype_optimistic_lock', $value);
                            $this->um_ownertype_optimistic_lock = $value;
                        }
                    }
}
