<?php

namespace Numbers\Users\Users\Model\Role\Permission;
class SubresourcesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Permission\Subresources::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolsubres_tenant_id','um_rolsubres_role_id','um_rolsubres_module_id','um_rolsubres_resource_id','um_rolsubres_rsrsubres_id','um_rolsubres_action_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolsubres_tenant_id = NULL {
                        get => $this->um_rolsubres_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_tenant_id', $value);
                            $this->um_rolsubres_tenant_id = $value;
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
    public string|null $um_rolsubres_timestamp = 'now()' {
                        get => $this->um_rolsubres_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_timestamp', $value);
                            $this->um_rolsubres_timestamp = $value;
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
    public int|null $um_rolsubres_role_id = NULL {
                        get => $this->um_rolsubres_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_role_id', $value);
                            $this->um_rolsubres_role_id = $value;
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
    public int|null $um_rolsubres_module_id = NULL {
                        get => $this->um_rolsubres_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_module_id', $value);
                            $this->um_rolsubres_module_id = $value;
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
    public int|null $um_rolsubres_resource_id = 0 {
                        get => $this->um_rolsubres_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_resource_id', $value);
                            $this->um_rolsubres_resource_id = $value;
                        }
                    }

    /**
     * Subresource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_rolsubres_rsrsubres_id = 0 {
                        get => $this->um_rolsubres_rsrsubres_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_rsrsubres_id', $value);
                            $this->um_rolsubres_rsrsubres_id = $value;
                        }
                    }

    /**
     * Action #
     *
     *
     *
     * {domain{action_id}}
     *
     * @var int|null Domain: action_id Type: smallint
     */
    public int|null $um_rolsubres_action_id = 0 {
                        get => $this->um_rolsubres_action_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_action_id', $value);
                            $this->um_rolsubres_action_id = $value;
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
    public int|null $um_rolsubres_inactive = 0 {
                        get => $this->um_rolsubres_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolsubres_inactive', $value);
                            $this->um_rolsubres_inactive = $value;
                        }
                    }
}
