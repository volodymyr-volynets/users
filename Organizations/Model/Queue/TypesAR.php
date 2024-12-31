<?php

namespace Numbers\Users\Organizations\Model\Queue;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Queue\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_quetype_tenant_id','on_quetype_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_quetype_tenant_id = NULL {
                        get => $this->on_quetype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_tenant_id', $value);
                            $this->on_quetype_tenant_id = $value;
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
    public int|null $on_quetype_id = null {
                        get => $this->on_quetype_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_id', $value);
                            $this->on_quetype_id = $value;
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
    public string|null $on_quetype_code = null {
                        get => $this->on_quetype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_code', $value);
                            $this->on_quetype_code = $value;
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
    public string|null $on_quetype_name = null {
                        get => $this->on_quetype_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_name', $value);
                            $this->on_quetype_name = $value;
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
    public string|null $on_quetype_icon = null {
                        get => $this->on_quetype_icon;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_icon', $value);
                            $this->on_quetype_icon = $value;
                        }
                    }

    /**
     * Method
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Queue\Methods}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $on_quetype_method_id = NULL {
                        get => $this->on_quetype_method_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_method_id', $value);
                            $this->on_quetype_method_id = $value;
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
    public int|null $on_quetype_inactive = 0 {
                        get => $this->on_quetype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_inactive', $value);
                            $this->on_quetype_inactive = $value;
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
    public string|null $on_quetype_optimistic_lock = 'now()' {
                        get => $this->on_quetype_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_quetype_optimistic_lock', $value);
                            $this->on_quetype_optimistic_lock = $value;
                        }
                    }
}
