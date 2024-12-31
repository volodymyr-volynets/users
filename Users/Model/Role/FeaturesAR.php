<?php

namespace Numbers\Users\Users\Model\Role;
class FeaturesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Features::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolfeature_tenant_id','um_rolfeature_role_id','um_rolfeature_module_id','um_rolfeature_feature_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolfeature_tenant_id = NULL {
                        get => $this->um_rolfeature_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_tenant_id', $value);
                            $this->um_rolfeature_tenant_id = $value;
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
    public string|null $um_rolfeature_timestamp = 'now()' {
                        get => $this->um_rolfeature_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_timestamp', $value);
                            $this->um_rolfeature_timestamp = $value;
                        }
                    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolfeature_role_id = NULL {
                        get => $this->um_rolfeature_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_role_id', $value);
                            $this->um_rolfeature_role_id = $value;
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
    public int|null $um_rolfeature_module_id = NULL {
                        get => $this->um_rolfeature_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_module_id', $value);
                            $this->um_rolfeature_module_id = $value;
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
    public string|null $um_rolfeature_feature_code = null {
                        get => $this->um_rolfeature_feature_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_feature_code', $value);
                            $this->um_rolfeature_feature_code = $value;
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
    public int|null $um_rolfeature_inactive = 0 {
                        get => $this->um_rolfeature_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolfeature_inactive', $value);
                            $this->um_rolfeature_inactive = $value;
                        }
                    }
}
