<?php

namespace Numbers\Users\Users\Model\User\Assignment\Customer;
class CustomersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Assignment\Customer\Customers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_assigncustomer_tenant_id','um_assigncustomer_user_id','um_assigncustomer_organization_id','um_assigncustomer_customer_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_assigncustomer_tenant_id = NULL {
                        get => $this->um_assigncustomer_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_tenant_id', $value);
                            $this->um_assigncustomer_tenant_id = $value;
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
    public string|null $um_assigncustomer_timestamp = 'now()' {
                        get => $this->um_assigncustomer_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_timestamp', $value);
                            $this->um_assigncustomer_timestamp = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_assigncustomer_user_id = NULL {
                        get => $this->um_assigncustomer_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_user_id', $value);
                            $this->um_assigncustomer_user_id = $value;
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
    public int|null $um_assigncustomer_organization_id = NULL {
                        get => $this->um_assigncustomer_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_organization_id', $value);
                            $this->um_assigncustomer_organization_id = $value;
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
    public int|null $um_assigncustomer_customer_id = NULL {
                        get => $this->um_assigncustomer_customer_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_customer_id', $value);
                            $this->um_assigncustomer_customer_id = $value;
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
    public int|null $um_assigncustomer_inactive = 0 {
                        get => $this->um_assigncustomer_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_assigncustomer_inactive', $value);
                            $this->um_assigncustomer_inactive = $value;
                        }
                    }
}
