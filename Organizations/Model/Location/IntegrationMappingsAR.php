<?php

namespace Numbers\Users\Organizations\Model\Location;
class IntegrationMappingsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\IntegrationMappings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_locintegmap_tenant_id','on_locintegmap_location_id','on_locintegmap_integtype_code','on_locintegmap_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_locintegmap_tenant_id = NULL {
                        get => $this->on_locintegmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_tenant_id', $value);
                            $this->on_locintegmap_tenant_id = $value;
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
    public string|null $on_locintegmap_timestamp = 'now()' {
                        get => $this->on_locintegmap_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_timestamp', $value);
                            $this->on_locintegmap_timestamp = $value;
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
    public int|null $on_locintegmap_location_id = NULL {
                        get => $this->on_locintegmap_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_location_id', $value);
                            $this->on_locintegmap_location_id = $value;
                        }
                    }

    /**
     * Integration Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $on_locintegmap_integtype_code = null {
                        get => $this->on_locintegmap_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_integtype_code', $value);
                            $this->on_locintegmap_integtype_code = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $on_locintegmap_code = null {
                        get => $this->on_locintegmap_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_code', $value);
                            $this->on_locintegmap_code = $value;
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
    public string|null $on_locintegmap_name = null {
                        get => $this->on_locintegmap_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_name', $value);
                            $this->on_locintegmap_name = $value;
                        }
                    }

    /**
     * Default
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_locintegmap_default = 0 {
                        get => $this->on_locintegmap_default;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_default', $value);
                            $this->on_locintegmap_default = $value;
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
    public int|null $on_locintegmap_inactive = 0 {
                        get => $this->on_locintegmap_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_locintegmap_inactive', $value);
                            $this->on_locintegmap_inactive = $value;
                        }
                    }
}
