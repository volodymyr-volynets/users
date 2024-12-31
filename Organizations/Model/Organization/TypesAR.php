<?php

namespace Numbers\Users\Organizations\Model\Organization;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_orgtype_tenant_id','on_orgtype_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_orgtype_tenant_id = NULL {
                        get => $this->on_orgtype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_tenant_id', $value);
                            $this->on_orgtype_tenant_id = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_orgtype_code = null {
                        get => $this->on_orgtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_code', $value);
                            $this->on_orgtype_code = $value;
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
    public string|null $on_orgtype_name = null {
                        get => $this->on_orgtype_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_name', $value);
                            $this->on_orgtype_name = $value;
                        }
                    }

    /**
     * Parent Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_orgtype_parent_type_code = null {
                        get => $this->on_orgtype_parent_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_parent_type_code', $value);
                            $this->on_orgtype_parent_type_code = $value;
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
    public int|null $on_orgtype_inactive = 0 {
                        get => $this->on_orgtype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_inactive', $value);
                            $this->on_orgtype_inactive = $value;
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
    public string|null $on_orgtype_optimistic_lock = 'now()' {
                        get => $this->on_orgtype_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtype_optimistic_lock', $value);
                            $this->on_orgtype_optimistic_lock = $value;
                        }
                    }
}
