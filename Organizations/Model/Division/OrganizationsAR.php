<?php

namespace Numbers\Users\Organizations\Model\Division;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Division\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_diviorg_tenant_id','on_diviorg_division_id','on_diviorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_diviorg_tenant_id = NULL {
                        get => $this->on_diviorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_diviorg_tenant_id', $value);
                            $this->on_diviorg_tenant_id = $value;
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
    public string|null $on_diviorg_timestamp = 'now()' {
                        get => $this->on_diviorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_diviorg_timestamp', $value);
                            $this->on_diviorg_timestamp = $value;
                        }
                    }

    /**
     * Brand #
     *
     *
     *
     * {domain{division_id}}
     *
     * @var int|null Domain: division_id Type: integer
     */
    public int|null $on_diviorg_division_id = NULL {
                        get => $this->on_diviorg_division_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_diviorg_division_id', $value);
                            $this->on_diviorg_division_id = $value;
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
    public int|null $on_diviorg_organization_id = NULL {
                        get => $this->on_diviorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_diviorg_organization_id', $value);
                            $this->on_diviorg_organization_id = $value;
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
    public int|null $on_diviorg_inactive = 0 {
                        get => $this->on_diviorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_diviorg_inactive', $value);
                            $this->on_diviorg_inactive = $value;
                        }
                    }
}
