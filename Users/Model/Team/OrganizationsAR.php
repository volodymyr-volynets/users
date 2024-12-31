<?php

namespace Numbers\Users\Users\Model\Team;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temorg_tenant_id','um_temorg_team_id','um_temorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temorg_tenant_id = NULL {
                        get => $this->um_temorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temorg_tenant_id', $value);
                            $this->um_temorg_tenant_id = $value;
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
    public string|null $um_temorg_timestamp = 'now()' {
                        get => $this->um_temorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_temorg_timestamp', $value);
                            $this->um_temorg_timestamp = $value;
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
    public int|null $um_temorg_team_id = NULL {
                        get => $this->um_temorg_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temorg_team_id', $value);
                            $this->um_temorg_team_id = $value;
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
    public int|null $um_temorg_organization_id = NULL {
                        get => $this->um_temorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temorg_organization_id', $value);
                            $this->um_temorg_organization_id = $value;
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
    public int|null $um_temorg_inactive = 0 {
                        get => $this->um_temorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_temorg_inactive', $value);
                            $this->um_temorg_inactive = $value;
                        }
                    }
}
