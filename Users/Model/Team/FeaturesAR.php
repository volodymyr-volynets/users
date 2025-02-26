<?php

namespace Numbers\Users\Users\Model\Team;
class FeaturesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\Features::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temfeature_tenant_id','um_temfeature_team_id','um_temfeature_module_id','um_temfeature_feature_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temfeature_tenant_id = NULL {
                        get => $this->um_temfeature_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_tenant_id', $value);
                            $this->um_temfeature_tenant_id = $value;
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
    public string|null $um_temfeature_timestamp = 'now()' {
                        get => $this->um_temfeature_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_timestamp', $value);
                            $this->um_temfeature_timestamp = $value;
                        }
                    }

    /**
     * Team #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_temfeature_team_id = NULL {
                        get => $this->um_temfeature_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_team_id', $value);
                            $this->um_temfeature_team_id = $value;
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
    public int|null $um_temfeature_module_id = NULL {
                        get => $this->um_temfeature_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_module_id', $value);
                            $this->um_temfeature_module_id = $value;
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
    public string|null $um_temfeature_feature_code = null {
                        get => $this->um_temfeature_feature_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_feature_code', $value);
                            $this->um_temfeature_feature_code = $value;
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
    public int|null $um_temfeature_inactive = 0 {
                        get => $this->um_temfeature_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_temfeature_inactive', $value);
                            $this->um_temfeature_inactive = $value;
                        }
                    }
}
