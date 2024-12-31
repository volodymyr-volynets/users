<?php

namespace Numbers\Users\Users\Model\User;
class IntegrationMappingsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\IntegrationMappings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrintegmap_tenant_id','um_usrintegmap_user_id','um_usrintegmap_integtype_code','um_usrintegmap_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrintegmap_tenant_id = NULL {
                        get => $this->um_usrintegmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_tenant_id', $value);
                            $this->um_usrintegmap_tenant_id = $value;
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
    public string|null $um_usrintegmap_timestamp = 'now()' {
                        get => $this->um_usrintegmap_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_timestamp', $value);
                            $this->um_usrintegmap_timestamp = $value;
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
    public int|null $um_usrintegmap_user_id = NULL {
                        get => $this->um_usrintegmap_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_user_id', $value);
                            $this->um_usrintegmap_user_id = $value;
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
    public string|null $um_usrintegmap_integtype_code = null {
                        get => $this->um_usrintegmap_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_integtype_code', $value);
                            $this->um_usrintegmap_integtype_code = $value;
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
    public string|null $um_usrintegmap_code = null {
                        get => $this->um_usrintegmap_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_code', $value);
                            $this->um_usrintegmap_code = $value;
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
    public string|null $um_usrintegmap_name = null {
                        get => $this->um_usrintegmap_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_name', $value);
                            $this->um_usrintegmap_name = $value;
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
    public int|null $um_usrintegmap_default = 0 {
                        get => $this->um_usrintegmap_default;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_default', $value);
                            $this->um_usrintegmap_default = $value;
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
    public int|null $um_usrintegmap_inactive = 0 {
                        get => $this->um_usrintegmap_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrintegmap_inactive', $value);
                            $this->um_usrintegmap_inactive = $value;
                        }
                    }
}
