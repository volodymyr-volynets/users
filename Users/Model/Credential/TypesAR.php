<?php

namespace Numbers\Users\Users\Model\Credential;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Credential\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_passtype_tenant_id','um_passtype_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_passtype_tenant_id = NULL {
                        get => $this->um_passtype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_tenant_id', $value);
                            $this->um_passtype_tenant_id = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_passtype_code = null {
                        get => $this->um_passtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_code', $value);
                            $this->um_passtype_code = $value;
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
    public string|null $um_passtype_name = null {
                        get => $this->um_passtype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_name', $value);
                            $this->um_passtype_name = $value;
                        }
                    }

    /**
     * Value Counter
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $um_passtype_value_counter = 0 {
                        get => $this->um_passtype_value_counter;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_value_counter', $value);
                            $this->um_passtype_value_counter = $value;
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
    public int|null $um_passtype_inactive = 0 {
                        get => $this->um_passtype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_inactive', $value);
                            $this->um_passtype_inactive = $value;
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
    public string|null $um_passtype_optimistic_lock = 'now()' {
                        get => $this->um_passtype_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_passtype_optimistic_lock', $value);
                            $this->um_passtype_optimistic_lock = $value;
                        }
                    }
}
