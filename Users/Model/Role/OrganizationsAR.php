<?php

namespace Numbers\Users\Users\Model\Role;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolorg_tenant_id','um_rolorg_role_id','um_rolorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolorg_tenant_id = NULL {
                        get => $this->um_rolorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolorg_tenant_id', $value);
                            $this->um_rolorg_tenant_id = $value;
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
    public string|null $um_rolorg_timestamp = 'now()' {
                        get => $this->um_rolorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolorg_timestamp', $value);
                            $this->um_rolorg_timestamp = $value;
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
    public int|null $um_rolorg_role_id = NULL {
                        get => $this->um_rolorg_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolorg_role_id', $value);
                            $this->um_rolorg_role_id = $value;
                        }
                    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $um_rolorg_organization_id = NULL {
                        get => $this->um_rolorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolorg_organization_id', $value);
                            $this->um_rolorg_organization_id = $value;
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
    public int|null $um_rolorg_inactive = 0 {
                        get => $this->um_rolorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolorg_inactive', $value);
                            $this->um_rolorg_inactive = $value;
                        }
                    }
}
