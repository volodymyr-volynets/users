<?php

namespace Numbers\Users\Users\Model\Team\API;
class MethodsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\API\Methods::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temapmethod_tenant_id','um_temapmethod_team_id','um_temapmethod_module_id','um_temapmethod_resource_id','um_temapmethod_method_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temapmethod_tenant_id = NULL {
                        get => $this->um_temapmethod_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_tenant_id', $value);
                            $this->um_temapmethod_tenant_id = $value;
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
    public int|null $um_temapmethod_team_id = NULL {
                        get => $this->um_temapmethod_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_team_id', $value);
                            $this->um_temapmethod_team_id = $value;
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
    public int|null $um_temapmethod_module_id = NULL {
                        get => $this->um_temapmethod_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_module_id', $value);
                            $this->um_temapmethod_module_id = $value;
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
    public int|null $um_temapmethod_resource_id = 0 {
                        get => $this->um_temapmethod_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_resource_id', $value);
                            $this->um_temapmethod_resource_id = $value;
                        }
                    }

    /**
     * Method Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_temapmethod_method_code = null {
                        get => $this->um_temapmethod_method_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_method_code', $value);
                            $this->um_temapmethod_method_code = $value;
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
    public int|null $um_temapmethod_inactive = 0 {
                        get => $this->um_temapmethod_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_temapmethod_inactive', $value);
                            $this->um_temapmethod_inactive = $value;
                        }
                    }
}
