<?php

namespace Numbers\Users\Organizations\Model\Organization\Holiday;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\Holiday\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_holiorg_tenant_id','on_holiorg_holiday_id','on_holiorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_holiorg_tenant_id = NULL {
                        get => $this->on_holiorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_holiorg_tenant_id', $value);
                            $this->on_holiorg_tenant_id = $value;
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
    public string|null $on_holiorg_timestamp = 'now()' {
                        get => $this->on_holiorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_holiorg_timestamp', $value);
                            $this->on_holiorg_timestamp = $value;
                        }
                    }

    /**
     * Holiday #
     *
     *
     *
     * {domain{holiday_id}}
     *
     * @var int|null Domain: holiday_id Type: integer
     */
    public int|null $on_holiorg_holiday_id = NULL {
                        get => $this->on_holiorg_holiday_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_holiorg_holiday_id', $value);
                            $this->on_holiorg_holiday_id = $value;
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
    public int|null $on_holiorg_organization_id = NULL {
                        get => $this->on_holiorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_holiorg_organization_id', $value);
                            $this->on_holiorg_organization_id = $value;
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
    public int|null $on_holiorg_inactive = 0 {
                        get => $this->on_holiorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_holiorg_inactive', $value);
                            $this->on_holiorg_inactive = $value;
                        }
                    }
}
