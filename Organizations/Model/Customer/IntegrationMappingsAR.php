<?php

namespace Numbers\Users\Organizations\Model\Customer;
class IntegrationMappingsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Customer\IntegrationMappings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_custintegmap_tenant_id','on_custintegmap_customer_id','on_custintegmap_integtype_code','on_custintegmap_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_custintegmap_tenant_id = NULL {
                        get => $this->on_custintegmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_tenant_id', $value);
                            $this->on_custintegmap_tenant_id = $value;
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
    public string|null $on_custintegmap_timestamp = 'now()' {
                        get => $this->on_custintegmap_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_timestamp', $value);
                            $this->on_custintegmap_timestamp = $value;
                        }
                    }

    /**
     * Customer #
     *
     *
     *
     * {domain{customer_id}}
     *
     * @var int|null Domain: customer_id Type: bigint
     */
    public int|null $on_custintegmap_customer_id = NULL {
                        get => $this->on_custintegmap_customer_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_customer_id', $value);
                            $this->on_custintegmap_customer_id = $value;
                        }
                    }

    /**
     * Integration Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $on_custintegmap_integtype_code = null {
                        get => $this->on_custintegmap_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_integtype_code', $value);
                            $this->on_custintegmap_integtype_code = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $on_custintegmap_code = null {
                        get => $this->on_custintegmap_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_code', $value);
                            $this->on_custintegmap_code = $value;
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
    public string|null $on_custintegmap_name = null {
                        get => $this->on_custintegmap_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_name', $value);
                            $this->on_custintegmap_name = $value;
                        }
                    }

    /**
     * Default
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_custintegmap_default = 0 {
                        get => $this->on_custintegmap_default;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_default', $value);
                            $this->on_custintegmap_default = $value;
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
    public int|null $on_custintegmap_inactive = 0 {
                        get => $this->on_custintegmap_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_custintegmap_inactive', $value);
                            $this->on_custintegmap_inactive = $value;
                        }
                    }
}
