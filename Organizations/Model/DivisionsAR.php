<?php

namespace Numbers\Users\Organizations\Model;
class DivisionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Divisions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_division_tenant_id','on_division_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_division_tenant_id = NULL {
                        get => $this->on_division_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_tenant_id', $value);
                            $this->on_division_tenant_id = $value;
                        }
                    }

    /**
     * Division #
     *
     *
     *
     * {domain{division_id_sequence}}
     *
     * @var int|null Domain: division_id_sequence Type: serial
     */
    public int|null $on_division_id = null {
                        get => $this->on_division_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_id', $value);
                            $this->on_division_id = $value;
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
    public string|null $on_division_code = null {
                        get => $this->on_division_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_code', $value);
                            $this->on_division_code = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Division\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $on_division_type_id = NULL {
                        get => $this->on_division_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_type_id', $value);
                            $this->on_division_type_id = $value;
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
    public string|null $on_division_name = null {
                        get => $this->on_division_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_name', $value);
                            $this->on_division_name = $value;
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
    public int|null $on_division_parent_organization_id = NULL {
                        get => $this->on_division_parent_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_parent_organization_id', $value);
                            $this->on_division_parent_organization_id = $value;
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
    public int|null $on_division_parent_division_id = NULL {
                        get => $this->on_division_parent_division_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_parent_division_id', $value);
                            $this->on_division_parent_division_id = $value;
                        }
                    }

    /**
     * Region #
     *
     *
     *
     * {domain{country_number}}
     *
     * @var int|null Domain: country_number Type: smallint
     */
    public int|null $on_division_region_id = NULL {
                        get => $this->on_division_region_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_region_id', $value);
                            $this->on_division_region_id = $value;
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
    public int|null $on_division_inactive = 0 {
                        get => $this->on_division_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_inactive', $value);
                            $this->on_division_inactive = $value;
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
    public string|null $on_division_optimistic_lock = 'now()' {
                        get => $this->on_division_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_division_optimistic_lock', $value);
                            $this->on_division_optimistic_lock = $value;
                        }
                    }
}
