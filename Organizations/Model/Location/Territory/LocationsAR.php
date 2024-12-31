<?php

namespace Numbers\Users\Organizations\Model\Location\Territory;
class LocationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territory\Locations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_terrloc_tenant_id','on_terrloc_territory_id','on_terrloc_location_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_terrloc_tenant_id = NULL {
                        get => $this->on_terrloc_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_tenant_id', $value);
                            $this->on_terrloc_tenant_id = $value;
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
    public string|null $on_terrloc_timestamp = 'now()' {
                        get => $this->on_terrloc_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_timestamp', $value);
                            $this->on_terrloc_timestamp = $value;
                        }
                    }

    /**
     * Territory #
     *
     *
     *
     * {domain{territory_id}}
     *
     * @var int|null Domain: territory_id Type: integer
     */
    public int|null $on_terrloc_territory_id = NULL {
                        get => $this->on_terrloc_territory_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_territory_id', $value);
                            $this->on_terrloc_territory_id = $value;
                        }
                    }

    /**
     * Location #
     *
     *
     *
     * {domain{location_id}}
     *
     * @var int|null Domain: location_id Type: integer
     */
    public int|null $on_terrloc_location_id = NULL {
                        get => $this->on_terrloc_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_location_id', $value);
                            $this->on_terrloc_location_id = $value;
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
    public int|null $on_terrloc_primary = 0 {
                        get => $this->on_terrloc_primary;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_primary', $value);
                            $this->on_terrloc_primary = $value;
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
    public int|null $on_terrloc_inactive = 0 {
                        get => $this->on_terrloc_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrloc_inactive', $value);
                            $this->on_terrloc_inactive = $value;
                        }
                    }
}
