<?php

namespace Numbers\Users\Organizations\Model\StrategicBusinessUnit;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\StrategicBusinessUnit\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_sborg_tenant_id','on_sborg_sbu_id','on_sborg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_sborg_tenant_id = NULL {
                        get => $this->on_sborg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_tenant_id', $value);
                            $this->on_sborg_tenant_id = $value;
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
    public string|null $on_sborg_timestamp = 'now()' {
                        get => $this->on_sborg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_timestamp', $value);
                            $this->on_sborg_timestamp = $value;
                        }
                    }

    /**
     * SBU #
     *
     *
     *
     * {domain{sbu_id}}
     *
     * @var int|null Domain: sbu_id Type: integer
     */
    public int|null $on_sborg_sbu_id = NULL {
                        get => $this->on_sborg_sbu_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_sbu_id', $value);
                            $this->on_sborg_sbu_id = $value;
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
    public int|null $on_sborg_organization_id = NULL {
                        get => $this->on_sborg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_organization_id', $value);
                            $this->on_sborg_organization_id = $value;
                        }
                    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_sborg_primary = 0 {
                        get => $this->on_sborg_primary;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_primary', $value);
                            $this->on_sborg_primary = $value;
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
    public int|null $on_sborg_inactive = 0 {
                        get => $this->on_sborg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_sborg_inactive', $value);
                            $this->on_sborg_inactive = $value;
                        }
                    }
}
