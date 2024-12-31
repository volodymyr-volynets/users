<?php

namespace Numbers\Users\Organizations\Model\Location\Type;
class MapAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Type\Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_loctpmap_tenant_id','on_loctpmap_location_id','on_loctpmap_type_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_loctpmap_tenant_id = NULL {
                        get => $this->on_loctpmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_loctpmap_tenant_id', $value);
                            $this->on_loctpmap_tenant_id = $value;
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
    public int|null $on_loctpmap_location_id = NULL {
                        get => $this->on_loctpmap_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_loctpmap_location_id', $value);
                            $this->on_loctpmap_location_id = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_loctpmap_type_code = null {
                        get => $this->on_loctpmap_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_loctpmap_type_code', $value);
                            $this->on_loctpmap_type_code = $value;
                        }
                    }
}
