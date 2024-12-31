<?php

namespace Numbers\Users\Users\Model\User;
class AssignmentsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Assignments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrassign_tenant_id','um_usrassign_assignusrtype_id','um_usrassign_parent_user_id','um_usrassign_child_user_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrassign_tenant_id = NULL {
                        get => $this->um_usrassign_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_tenant_id', $value);
                            $this->um_usrassign_tenant_id = $value;
                        }
                    }

    /**
     * Assignment #
     *
     *
     *
     * {domain{assignment_id}}
     *
     * @var int|null Domain: assignment_id Type: integer
     */
    public int|null $um_usrassign_assignusrtype_id = NULL {
                        get => $this->um_usrassign_assignusrtype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_assignusrtype_id', $value);
                            $this->um_usrassign_assignusrtype_id = $value;
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
    public int|null $um_usrassign_parent_role_id = NULL {
                        get => $this->um_usrassign_parent_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_parent_role_id', $value);
                            $this->um_usrassign_parent_role_id = $value;
                        }
                    }

    /**
     * Parent User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrassign_parent_user_id = NULL {
                        get => $this->um_usrassign_parent_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_parent_user_id', $value);
                            $this->um_usrassign_parent_user_id = $value;
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
    public int|null $um_usrassign_child_role_id = NULL {
                        get => $this->um_usrassign_child_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_child_role_id', $value);
                            $this->um_usrassign_child_role_id = $value;
                        }
                    }

    /**
     * Child User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrassign_child_user_id = NULL {
                        get => $this->um_usrassign_child_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_child_user_id', $value);
                            $this->um_usrassign_child_user_id = $value;
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
    public int|null $um_usrassign_inactive = 0 {
                        get => $this->um_usrassign_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrassign_inactive', $value);
                            $this->um_usrassign_inactive = $value;
                        }
                    }
}
