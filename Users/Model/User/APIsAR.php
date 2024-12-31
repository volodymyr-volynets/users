<?php

namespace Numbers\Users\Users\Model\User;
class APIsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\APIs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrapi_tenant_id','um_usrapi_user_id','um_usrapi_module_id','um_usrapi_resource_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrapi_tenant_id = NULL {
                        get => $this->um_usrapi_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_tenant_id', $value);
                            $this->um_usrapi_tenant_id = $value;
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
    public int|null $um_usrapi_user_id = NULL {
                        get => $this->um_usrapi_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_user_id', $value);
                            $this->um_usrapi_user_id = $value;
                        }
                    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_usrapi_module_id = NULL {
                        get => $this->um_usrapi_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_module_id', $value);
                            $this->um_usrapi_module_id = $value;
                        }
                    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_usrapi_resource_id = 0 {
                        get => $this->um_usrapi_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_resource_id', $value);
                            $this->um_usrapi_resource_id = $value;
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
    public int|null $um_usrapi_inactive = 0 {
                        get => $this->um_usrapi_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_inactive', $value);
                            $this->um_usrapi_inactive = $value;
                        }
                    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrapi_inserted_timestamp = null {
                        get => $this->um_usrapi_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_inserted_timestamp', $value);
                            $this->um_usrapi_inserted_timestamp = $value;
                        }
                    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrapi_inserted_user_id = NULL {
                        get => $this->um_usrapi_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_inserted_user_id', $value);
                            $this->um_usrapi_inserted_user_id = $value;
                        }
                    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrapi_updated_timestamp = null {
                        get => $this->um_usrapi_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_updated_timestamp', $value);
                            $this->um_usrapi_updated_timestamp = $value;
                        }
                    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrapi_updated_user_id = NULL {
                        get => $this->um_usrapi_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrapi_updated_user_id', $value);
                            $this->um_usrapi_updated_user_id = $value;
                        }
                    }
}
