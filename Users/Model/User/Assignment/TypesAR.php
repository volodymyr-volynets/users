<?php

namespace Numbers\Users\Users\Model\User\Assignment;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Assignment\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_assignusrtype_tenant_id','um_assignusrtype_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_assignusrtype_tenant_id = NULL {
                        get => $this->um_assignusrtype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_tenant_id', $value);
                            $this->um_assignusrtype_tenant_id = $value;
                        }
                    }

    /**
     * Assignment Type #
     *
     *
     *
     * {domain{assignment_id_sequence}}
     *
     * @var int|null Domain: assignment_id_sequence Type: serial
     */
    public int|null $um_assignusrtype_id = null {
                        get => $this->um_assignusrtype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_id', $value);
                            $this->um_assignusrtype_id = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $um_assignusrtype_code = null {
                        get => $this->um_assignusrtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_code', $value);
                            $this->um_assignusrtype_code = $value;
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
    public string|null $um_assignusrtype_name = null {
                        get => $this->um_assignusrtype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_name', $value);
                            $this->um_assignusrtype_name = $value;
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
    public int|null $um_assignusrtype_parent_role_id = NULL {
                        get => $this->um_assignusrtype_parent_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_parent_role_id', $value);
                            $this->um_assignusrtype_parent_role_id = $value;
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
    public int|null $um_assignusrtype_child_role_id = NULL {
                        get => $this->um_assignusrtype_child_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_child_role_id', $value);
                            $this->um_assignusrtype_child_role_id = $value;
                        }
                    }

    /**
     * Multiple
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_assignusrtype_multiple = 0 {
                        get => $this->um_assignusrtype_multiple;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_multiple', $value);
                            $this->um_assignusrtype_multiple = $value;
                        }
                    }

    /**
     * Mandatory
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_assignusrtype_mandatory = 0 {
                        get => $this->um_assignusrtype_mandatory;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_mandatory', $value);
                            $this->um_assignusrtype_mandatory = $value;
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
    public int|null $um_assignusrtype_inactive = 0 {
                        get => $this->um_assignusrtype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_assignusrtype_inactive', $value);
                            $this->um_assignusrtype_inactive = $value;
                        }
                    }
}
