<?php

namespace Numbers\Users\Users\Model\User;
class FeaturesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Features::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrfeature_tenant_id','um_usrfeature_user_id','um_usrfeature_module_id','um_usrfeature_feature_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrfeature_tenant_id = NULL {
                        get => $this->um_usrfeature_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_tenant_id', $value);
                            $this->um_usrfeature_tenant_id = $value;
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
    public string|null $um_usrfeature_timestamp = 'now()' {
                        get => $this->um_usrfeature_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_timestamp', $value);
                            $this->um_usrfeature_timestamp = $value;
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
    public int|null $um_usrfeature_user_id = NULL {
                        get => $this->um_usrfeature_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_user_id', $value);
                            $this->um_usrfeature_user_id = $value;
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
    public int|null $um_usrfeature_module_id = NULL {
                        get => $this->um_usrfeature_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_module_id', $value);
                            $this->um_usrfeature_module_id = $value;
                        }
                    }

    /**
     * Feature Code
     *
     *
     *
     * {domain{feature_code}}
     *
     * @var string|null Domain: feature_code Type: varchar
     */
    public string|null $um_usrfeature_feature_code = null {
                        get => $this->um_usrfeature_feature_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_feature_code', $value);
                            $this->um_usrfeature_feature_code = $value;
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
    public int|null $um_usrfeature_inactive = 0 {
                        get => $this->um_usrfeature_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrfeature_inactive', $value);
                            $this->um_usrfeature_inactive = $value;
                        }
                    }
}
