<?php

namespace Numbers\Users\Users\Model\Role;
class ChildrenAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Children::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolrol_tenant_id','um_rolrol_parent_role_id','um_rolrol_child_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolrol_tenant_id = NULL {
                        get => $this->um_rolrol_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolrol_tenant_id', $value);
                            $this->um_rolrol_tenant_id = $value;
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
    public string|null $um_rolrol_timestamp = 'now()' {
                        get => $this->um_rolrol_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolrol_timestamp', $value);
                            $this->um_rolrol_timestamp = $value;
                        }
                    }

    /**
     * Parent Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolrol_parent_role_id = NULL {
                        get => $this->um_rolrol_parent_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolrol_parent_role_id', $value);
                            $this->um_rolrol_parent_role_id = $value;
                        }
                    }

    /**
     * Child Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolrol_child_role_id = NULL {
                        get => $this->um_rolrol_child_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolrol_child_role_id', $value);
                            $this->um_rolrol_child_role_id = $value;
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
    public int|null $um_rolrol_inactive = 0 {
                        get => $this->um_rolrol_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolrol_inactive', $value);
                            $this->um_rolrol_inactive = $value;
                        }
                    }
}
