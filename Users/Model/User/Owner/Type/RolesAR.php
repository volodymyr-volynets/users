<?php

namespace Numbers\Users\Users\Model\User\Owner\Type;
class RolesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Owner\Type\Roles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_ownertprole_tenant_id','um_ownertprole_ownertype_id','um_ownertprole_role_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_ownertprole_tenant_id = NULL {
                        get => $this->um_ownertprole_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertprole_tenant_id', $value);
                            $this->um_ownertprole_tenant_id = $value;
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
    public string|null $um_ownertprole_timestamp = 'now()' {
                        get => $this->um_ownertprole_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertprole_timestamp', $value);
                            $this->um_ownertprole_timestamp = $value;
                        }
                    }

    /**
     * Owner Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_ownertprole_ownertype_id = NULL {
                        get => $this->um_ownertprole_ownertype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertprole_ownertype_id', $value);
                            $this->um_ownertprole_ownertype_id = $value;
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
    public int|null $um_ownertprole_role_id = NULL {
                        get => $this->um_ownertprole_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertprole_role_id', $value);
                            $this->um_ownertprole_role_id = $value;
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
    public int|null $um_ownertprole_inactive = 0 {
                        get => $this->um_ownertprole_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_ownertprole_inactive', $value);
                            $this->um_ownertprole_inactive = $value;
                        }
                    }
}
