<?php

namespace Numbers\Users\Organizations\Model\Brand;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Brand\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_brndorg_tenant_id','on_brndorg_brand_id','on_brndorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_brndorg_tenant_id = NULL {
                        get => $this->on_brndorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_tenant_id', $value);
                            $this->on_brndorg_tenant_id = $value;
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
    public string|null $on_brndorg_timestamp = 'now()' {
                        get => $this->on_brndorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_timestamp', $value);
                            $this->on_brndorg_timestamp = $value;
                        }
                    }

    /**
     * Brand #
     *
     *
     *
     * {domain{brand_id}}
     *
     * @var int|null Domain: brand_id Type: integer
     */
    public int|null $on_brndorg_brand_id = NULL {
                        get => $this->on_brndorg_brand_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_brand_id', $value);
                            $this->on_brndorg_brand_id = $value;
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
    public int|null $on_brndorg_organization_id = NULL {
                        get => $this->on_brndorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_organization_id', $value);
                            $this->on_brndorg_organization_id = $value;
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
    public int|null $on_brndorg_primary = 0 {
                        get => $this->on_brndorg_primary;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_primary', $value);
                            $this->on_brndorg_primary = $value;
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
    public int|null $on_brndorg_inactive = 0 {
                        get => $this->on_brndorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_brndorg_inactive', $value);
                            $this->on_brndorg_inactive = $value;
                        }
                    }
}
