<?php

namespace Numbers\Users\Organizations\Model\Organization\Type;
class MapAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\Type\Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_orgtpmap_tenant_id','on_orgtpmap_organization_id','on_orgtpmap_type_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_orgtpmap_tenant_id = NULL {
                        get => $this->on_orgtpmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtpmap_tenant_id', $value);
                            $this->on_orgtpmap_tenant_id = $value;
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
    public int|null $on_orgtpmap_organization_id = NULL {
                        get => $this->on_orgtpmap_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtpmap_organization_id', $value);
                            $this->on_orgtpmap_organization_id = $value;
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
    public string|null $on_orgtpmap_type_code = null {
                        get => $this->on_orgtpmap_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgtpmap_type_code', $value);
                            $this->on_orgtpmap_type_code = $value;
                        }
                    }
}
