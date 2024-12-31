<?php

namespace Numbers\Users\Users\Model\Team;
class APIsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\APIs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temapi_tenant_id','um_temapi_team_id','um_temapi_module_id','um_temapi_resource_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temapi_tenant_id = NULL {
                        get => $this->um_temapi_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_tenant_id', $value);
                            $this->um_temapi_tenant_id = $value;
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
    public string|null $um_temapi_timestamp = 'now()' {
                        get => $this->um_temapi_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_timestamp', $value);
                            $this->um_temapi_timestamp = $value;
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
    public int|null $um_temapi_team_id = NULL {
                        get => $this->um_temapi_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_team_id', $value);
                            $this->um_temapi_team_id = $value;
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
    public int|null $um_temapi_module_id = NULL {
                        get => $this->um_temapi_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_module_id', $value);
                            $this->um_temapi_module_id = $value;
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
    public int|null $um_temapi_resource_id = 0 {
                        get => $this->um_temapi_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_resource_id', $value);
                            $this->um_temapi_resource_id = $value;
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
    public int|null $um_temapi_inactive = 0 {
                        get => $this->um_temapi_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapi_inactive', $value);
                            $this->um_temapi_inactive = $value;
                        }
                    }
}
