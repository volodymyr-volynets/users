<?php

namespace Numbers\Users\Organizations\Model\Location;
class ZonesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Zones::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_loczone_tenant_id','on_loczone_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_loczone_tenant_id = NULL {
                        get => $this->on_loczone_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_tenant_id', $value);
                            $this->on_loczone_tenant_id = $value;
                        }
                    }

    /**
     * Zone / Slot #
     *
     *
     *
     * {domain{zone_id_sequence}}
     *
     * @var int|null Domain: zone_id_sequence Type: serial
     */
    public int|null $on_loczone_id = null {
                        get => $this->on_loczone_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_id', $value);
                            $this->on_loczone_id = $value;
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
    public string|null $on_loczone_name = null {
                        get => $this->on_loczone_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_name', $value);
                            $this->on_loczone_name = $value;
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
    public int|null $on_loczone_location_id = NULL {
                        get => $this->on_loczone_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_location_id', $value);
                            $this->on_loczone_location_id = $value;
                        }
                    }

    /**
     * Zone Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loczone_zone_code = null {
                        get => $this->on_loczone_zone_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_zone_code', $value);
                            $this->on_loczone_zone_code = $value;
                        }
                    }

    /**
     * Aisle Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loczone_aisle_code = null {
                        get => $this->on_loczone_aisle_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_aisle_code', $value);
                            $this->on_loczone_aisle_code = $value;
                        }
                    }

    /**
     * Bay Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loczone_bay_code = null {
                        get => $this->on_loczone_bay_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_bay_code', $value);
                            $this->on_loczone_bay_code = $value;
                        }
                    }

    /**
     * Level Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loczone_level_code = null {
                        get => $this->on_loczone_level_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_level_code', $value);
                            $this->on_loczone_level_code = $value;
                        }
                    }

    /**
     * Slot Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loczone_slot_code = null {
                        get => $this->on_loczone_slot_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_slot_code', $value);
                            $this->on_loczone_slot_code = $value;
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
    public int|null $on_loczone_inactive = 0 {
                        get => $this->on_loczone_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_inactive', $value);
                            $this->on_loczone_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $on_loczone_optimistic_lock = 'now()' {
                        get => $this->on_loczone_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_loczone_optimistic_lock', $value);
                            $this->on_loczone_optimistic_lock = $value;
                        }
                    }
}
