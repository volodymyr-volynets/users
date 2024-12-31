<?php

namespace Numbers\Users\Users\Model\User\Group;
class MapAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Group\Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrgrmap_tenant_id','um_usrgrmap_user_id','um_usrgrmap_group_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrgrmap_tenant_id = NULL {
                        get => $this->um_usrgrmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrmap_tenant_id', $value);
                            $this->um_usrgrmap_tenant_id = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrgrmap_user_id = NULL {
                        get => $this->um_usrgrmap_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrmap_user_id', $value);
                            $this->um_usrgrmap_user_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_usrgrmap_group_id = NULL {
                        get => $this->um_usrgrmap_group_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrmap_group_id', $value);
                            $this->um_usrgrmap_group_id = $value;
                        }
                    }
}
