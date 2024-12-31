<?php

namespace Numbers\Users\Users\Model\User;
class PermissionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Permissions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrperm_tenant_id','um_usrperm_user_id','um_usrperm_module_id','um_usrperm_resource_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrperm_tenant_id = NULL {
                        get => $this->um_usrperm_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_tenant_id', $value);
                            $this->um_usrperm_tenant_id = $value;
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
    public int|null $um_usrperm_user_id = NULL {
                        get => $this->um_usrperm_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_user_id', $value);
                            $this->um_usrperm_user_id = $value;
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
    public int|null $um_usrperm_module_id = NULL {
                        get => $this->um_usrperm_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_module_id', $value);
                            $this->um_usrperm_module_id = $value;
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
    public int|null $um_usrperm_resource_id = 0 {
                        get => $this->um_usrperm_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_resource_id', $value);
                            $this->um_usrperm_resource_id = $value;
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
    public int|null $um_usrperm_inactive = 0 {
                        get => $this->um_usrperm_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_inactive', $value);
                            $this->um_usrperm_inactive = $value;
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
    public string|null $um_usrperm_inserted_timestamp = null {
                        get => $this->um_usrperm_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_inserted_timestamp', $value);
                            $this->um_usrperm_inserted_timestamp = $value;
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
    public int|null $um_usrperm_inserted_user_id = NULL {
                        get => $this->um_usrperm_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_inserted_user_id', $value);
                            $this->um_usrperm_inserted_user_id = $value;
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
    public string|null $um_usrperm_updated_timestamp = null {
                        get => $this->um_usrperm_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_updated_timestamp', $value);
                            $this->um_usrperm_updated_timestamp = $value;
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
    public int|null $um_usrperm_updated_user_id = NULL {
                        get => $this->um_usrperm_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrperm_updated_user_id', $value);
                            $this->um_usrperm_updated_user_id = $value;
                        }
                    }
}
