<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Group;

use Object\ActiveRecord;

class MapAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Map::class;

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
    public int|null $um_usrgrmap_tenant_id = null {
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
    public int|null $um_usrgrmap_user_id = null {
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
    public int|null $um_usrgrmap_group_id = null {
        get => $this->um_usrgrmap_group_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrgrmap_group_id', $value);
            $this->um_usrgrmap_group_id = $value;
        }
    }
}
