<?php

namespace Numbers\Users\Organizations\Model\Common\Note;
class LocationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Common\Note\Locations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_comnotloc_tenant_id','on_comnotloc_comnote_id','on_comnotloc_location_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_comnotloc_tenant_id = NULL {
                        get => $this->on_comnotloc_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotloc_tenant_id', $value);
                            $this->on_comnotloc_tenant_id = $value;
                        }
                    }

    /**
     * Note #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $on_comnotloc_comnote_id = NULL {
                        get => $this->on_comnotloc_comnote_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotloc_comnote_id', $value);
                            $this->on_comnotloc_comnote_id = $value;
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
    public int|null $on_comnotloc_location_id = NULL {
                        get => $this->on_comnotloc_location_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotloc_location_id', $value);
                            $this->on_comnotloc_location_id = $value;
                        }
                    }
}
