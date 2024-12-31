<?php

namespace Numbers\Users\Organizations\Model\Location;
class TerritoriesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territories::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_territory_tenant_id','on_territory_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_territory_tenant_id = NULL {
                        get => $this->on_territory_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_tenant_id', $value);
                            $this->on_territory_tenant_id = $value;
                        }
                    }

    /**
     * Territory #
     *
     *
     *
     * {domain{territory_id_sequence}}
     *
     * @var int|null Domain: territory_id_sequence Type: serial
     */
    public int|null $on_territory_id = null {
                        get => $this->on_territory_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_id', $value);
                            $this->on_territory_id = $value;
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
    public string|null $on_territory_code = null {
                        get => $this->on_territory_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_code', $value);
                            $this->on_territory_code = $value;
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
    public string|null $on_territory_name = null {
                        get => $this->on_territory_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_name', $value);
                            $this->on_territory_name = $value;
                        }
                    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $on_territory_organization_id = NULL {
                        get => $this->on_territory_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_organization_id', $value);
                            $this->on_territory_organization_id = $value;
                        }
                    }

    /**
     * Node Type
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Location\Territory\NodeTypes}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $on_territory_node_type_id = NULL {
                        get => $this->on_territory_node_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_node_type_id', $value);
                            $this->on_territory_node_type_id = $value;
                        }
                    }

    /**
     * Parent Territory #
     *
     *
     *
     * {domain{territory_id}}
     *
     * @var int|null Domain: territory_id Type: integer
     */
    public int|null $on_territory_parent_territory_id = NULL {
                        get => $this->on_territory_parent_territory_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_parent_territory_id', $value);
                            $this->on_territory_parent_territory_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Location\Territory\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $on_territory_type_id = NULL {
                        get => $this->on_territory_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_type_id', $value);
                            $this->on_territory_type_id = $value;
                        }
                    }

    /**
     * Postal Codes
     *
     *
     *
     * {domain{postal_codes}}
     *
     * @var string|null Domain: postal_codes Type: varchar
     */
    public string|null $on_territory_postal_codes = null {
                        get => $this->on_territory_postal_codes;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_postal_codes', $value);
                            $this->on_territory_postal_codes = $value;
                        }
                    }

    /**
     * Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $on_territory_country_code = null {
                        get => $this->on_territory_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_country_code', $value);
                            $this->on_territory_country_code = $value;
                        }
                    }

    /**
     * Province Code
     *
     *
     *
     * {domain{province_code}}
     *
     * @var string|null Domain: province_code Type: varchar
     */
    public string|null $on_territory_province_code = null {
                        get => $this->on_territory_province_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_province_code', $value);
                            $this->on_territory_province_code = $value;
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
    public int|null $on_territory_inactive = 0 {
                        get => $this->on_territory_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_inactive', $value);
                            $this->on_territory_inactive = $value;
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
    public string|null $on_territory_optimistic_lock = 'now()' {
                        get => $this->on_territory_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_territory_optimistic_lock', $value);
                            $this->on_territory_optimistic_lock = $value;
                        }
                    }
}
