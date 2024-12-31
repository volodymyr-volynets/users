<?php

namespace Numbers\Users\Organizations\Model\Location\Territory;
class PostalCodesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Location\Territory\PostalCodes::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_terrpostal_tenant_id','on_terrpostal_territory_id','on_terrpostal_organization_id','on_terrpostal_location_id','on_terrpostal_postal_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_terrpostal_tenant_id = NULL {
                        get => $this->on_terrpostal_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrpostal_tenant_id', $value);
                            $this->on_terrpostal_tenant_id = $value;
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
    public int|null $on_terrpostal_territory_id = NULL {
                        get => $this->on_terrpostal_territory_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrpostal_territory_id', $value);
                            $this->on_terrpostal_territory_id = $value;
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
    public int|null $on_terrpostal_organization_id = NULL {
                        get => $this->on_terrpostal_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrpostal_organization_id', $value);
                            $this->on_terrpostal_organization_id = $value;
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
    public int|null $on_terrpostal_location_id = NULL {
                        get => $this->on_terrpostal_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrpostal_location_id', $value);
                            $this->on_terrpostal_location_id = $value;
                        }
                    }

    /**
     * Postal Code
     *
     *
     *
     * {domain{postal_code}}
     *
     * @var string|null Domain: postal_code Type: varchar
     */
    public string|null $on_terrpostal_postal_code = null {
                        get => $this->on_terrpostal_postal_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_terrpostal_postal_code', $value);
                            $this->on_terrpostal_postal_code = $value;
                        }
                    }
}
