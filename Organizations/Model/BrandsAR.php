<?php

namespace Numbers\Users\Organizations\Model;
class BrandsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Brands::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_brand_tenant_id','on_brand_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_brand_tenant_id = NULL {
                        get => $this->on_brand_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_tenant_id', $value);
                            $this->on_brand_tenant_id = $value;
                        }
                    }

    /**
     * Brand #
     *
     *
     *
     * {domain{brand_id_sequence}}
     *
     * @var int|null Domain: brand_id_sequence Type: serial
     */
    public int|null $on_brand_id = null {
                        get => $this->on_brand_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_id', $value);
                            $this->on_brand_id = $value;
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
    public string|null $on_brand_code = null {
                        get => $this->on_brand_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_code', $value);
                            $this->on_brand_code = $value;
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
    public string|null $on_brand_name = null {
                        get => $this->on_brand_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_name', $value);
                            $this->on_brand_name = $value;
                        }
                    }

    /**
     * Logo File #
     *
     *
     *
     * {domain{file_id}}
     *
     * @var int|null Domain: file_id Type: bigint
     */
    public int|null $on_brand_logo_file_id = NULL {
                        get => $this->on_brand_logo_file_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_logo_file_id', $value);
                            $this->on_brand_logo_file_id = $value;
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
    public int|null $on_brand_inactive = 0 {
                        get => $this->on_brand_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_inactive', $value);
                            $this->on_brand_inactive = $value;
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
    public string|null $on_brand_optimistic_lock = 'now()' {
                        get => $this->on_brand_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_brand_optimistic_lock', $value);
                            $this->on_brand_optimistic_lock = $value;
                        }
                    }
}
