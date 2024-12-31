<?php

namespace Numbers\Users\Organizations\Model;
class MarketsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Markets::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_market_tenant_id','on_market_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_market_tenant_id = NULL {
                        get => $this->on_market_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_tenant_id', $value);
                            $this->on_market_tenant_id = $value;
                        }
                    }

    /**
     * District #
     *
     *
     *
     * {domain{market_id_sequence}}
     *
     * @var int|null Domain: market_id_sequence Type: serial
     */
    public int|null $on_market_id = null {
                        get => $this->on_market_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_id', $value);
                            $this->on_market_id = $value;
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
    public string|null $on_market_code = null {
                        get => $this->on_market_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_code', $value);
                            $this->on_market_code = $value;
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
    public string|null $on_market_name = null {
                        get => $this->on_market_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_name', $value);
                            $this->on_market_name = $value;
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
    public int|null $on_market_organization_id = NULL {
                        get => $this->on_market_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_organization_id', $value);
                            $this->on_market_organization_id = $value;
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
    public int|null $on_market_inactive = 0 {
                        get => $this->on_market_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_inactive', $value);
                            $this->on_market_inactive = $value;
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
    public string|null $on_market_optimistic_lock = 'now()' {
                        get => $this->on_market_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_market_optimistic_lock', $value);
                            $this->on_market_optimistic_lock = $value;
                        }
                    }
}
