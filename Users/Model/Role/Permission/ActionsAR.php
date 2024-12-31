<?php

namespace Numbers\Users\Users\Model\Role\Permission;
class ActionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Permission\Actions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolperaction_tenant_id','um_rolperaction_role_id','um_rolperaction_module_id','um_rolperaction_resource_id','um_rolperaction_method_code','um_rolperaction_action_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolperaction_tenant_id = NULL {
                        get => $this->um_rolperaction_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_tenant_id', $value);
                            $this->um_rolperaction_tenant_id = $value;
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
    public int|null $um_rolperaction_role_id = NULL {
                        get => $this->um_rolperaction_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_role_id', $value);
                            $this->um_rolperaction_role_id = $value;
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
    public int|null $um_rolperaction_module_id = NULL {
                        get => $this->um_rolperaction_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_module_id', $value);
                            $this->um_rolperaction_module_id = $value;
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
    public int|null $um_rolperaction_resource_id = 0 {
                        get => $this->um_rolperaction_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_resource_id', $value);
                            $this->um_rolperaction_resource_id = $value;
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
    public string|null $um_rolperaction_method_code = null {
                        get => $this->um_rolperaction_method_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_method_code', $value);
                            $this->um_rolperaction_method_code = $value;
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
    public int|null $um_rolperaction_action_id = 0 {
                        get => $this->um_rolperaction_action_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_action_id', $value);
                            $this->um_rolperaction_action_id = $value;
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
    public int|null $um_rolperaction_inactive = 0 {
                        get => $this->um_rolperaction_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolperaction_inactive', $value);
                            $this->um_rolperaction_inactive = $value;
                        }
                    }
}
