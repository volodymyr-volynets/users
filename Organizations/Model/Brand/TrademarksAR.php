<?php

namespace Numbers\Users\Organizations\Model\Brand;
class TrademarksAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Brand\Trademarks::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_brndtrdmrk_tenant_id','on_brndtrdmrk_brand_id','on_brndtrdmrk_trademark_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_brndtrdmrk_tenant_id = NULL {
                        get => $this->on_brndtrdmrk_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndtrdmrk_tenant_id', $value);
                            $this->on_brndtrdmrk_tenant_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $on_brndtrdmrk_timestamp = 'now()' {
                        get => $this->on_brndtrdmrk_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndtrdmrk_timestamp', $value);
                            $this->on_brndtrdmrk_timestamp = $value;
                        }
                    }

    /**
     * Brand #
     *
     *
     *
     * {domain{brand_id}}
     *
     * @var int|null Domain: brand_id Type: integer
     */
    public int|null $on_brndtrdmrk_brand_id = NULL {
                        get => $this->on_brndtrdmrk_brand_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndtrdmrk_brand_id', $value);
                            $this->on_brndtrdmrk_brand_id = $value;
                        }
                    }

    /**
     * Trademark #
     *
     *
     *
     * {domain{trademark_id}}
     *
     * @var int|null Domain: trademark_id Type: integer
     */
    public int|null $on_brndtrdmrk_trademark_id = NULL {
                        get => $this->on_brndtrdmrk_trademark_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndtrdmrk_trademark_id', $value);
                            $this->on_brndtrdmrk_trademark_id = $value;
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
    public int|null $on_brndtrdmrk_inactive = 0 {
                        get => $this->on_brndtrdmrk_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndtrdmrk_inactive', $value);
                            $this->on_brndtrdmrk_inactive = $value;
                        }
                    }
}
