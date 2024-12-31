<?php

namespace Numbers\Users\Organizations\Model;
class JurisdictionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Jurisdictions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_jurisdiction_tenant_id','on_jurisdiction_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_jurisdiction_tenant_id = NULL {
                        get => $this->on_jurisdiction_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_tenant_id', $value);
                            $this->on_jurisdiction_tenant_id = $value;
                        }
                    }

    /**
     * Jurisdictions #
     *
     *
     *
     * {domain{jurisdiction_id_sequence}}
     *
     * @var int|null Domain: jurisdiction_id_sequence Type: serial
     */
    public int|null $on_jurisdiction_id = null {
                        get => $this->on_jurisdiction_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_id', $value);
                            $this->on_jurisdiction_id = $value;
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
    public string|null $on_jurisdiction_code = null {
                        get => $this->on_jurisdiction_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_code', $value);
                            $this->on_jurisdiction_code = $value;
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
    public string|null $on_jurisdiction_name = null {
                        get => $this->on_jurisdiction_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_name', $value);
                            $this->on_jurisdiction_name = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Jurisdiction\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $on_jurisdiction_type = NULL {
                        get => $this->on_jurisdiction_type;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_type', $value);
                            $this->on_jurisdiction_type = $value;
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
    public int|null $on_jurisdiction_inactive = 0 {
                        get => $this->on_jurisdiction_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_inactive', $value);
                            $this->on_jurisdiction_inactive = $value;
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
    public string|null $on_jurisdiction_optimistic_lock = 'now()' {
                        get => $this->on_jurisdiction_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisdiction_optimistic_lock', $value);
                            $this->on_jurisdiction_optimistic_lock = $value;
                        }
                    }
}
