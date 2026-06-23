<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm;

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
    public array $object_table_pk = ['um_usrreamap_tenant_id','um_usrreamap_user_id','um_usrreamap_um_realm_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrreamap_tenant_id = null {
        get => $this->um_usrreamap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_tenant_id', $value);
            $this->um_usrreamap_tenant_id = $value;
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
    public string|null $um_usrreamap_timestamp = 'now()' {
        get => $this->um_usrreamap_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_timestamp', $value);
            $this->um_usrreamap_timestamp = $value;
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
    public int|null $um_usrreamap_user_id = null {
        get => $this->um_usrreamap_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_user_id', $value);
            $this->um_usrreamap_user_id = $value;
        }
    }

    /**
     * Realm #
     *
     *
     *
     * {domain{realm_id}}
     *
     * @var int|null Domain: realm_id Type: integer
     */
    public int|null $um_usrreamap_um_realm_id = null {
        get => $this->um_usrreamap_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_um_realm_id', $value);
            $this->um_usrreamap_um_realm_id = $value;
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
    public int|null $um_usrreamap_primary = 0 {
        get => $this->um_usrreamap_primary;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_primary', $value);
            $this->um_usrreamap_primary = $value;
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
    public int|null $um_usrreamap_inactive = 0 {
        get => $this->um_usrreamap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_inactive', $value);
            $this->um_usrreamap_inactive = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrreamap_inserted_timestamp = null {
        get => $this->um_usrreamap_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_inserted_timestamp', $value);
            $this->um_usrreamap_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrreamap_inserted_user_id = null {
        get => $this->um_usrreamap_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_inserted_user_id', $value);
            $this->um_usrreamap_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrreamap_updated_timestamp = null {
        get => $this->um_usrreamap_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_updated_timestamp', $value);
            $this->um_usrreamap_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrreamap_updated_user_id = null {
        get => $this->um_usrreamap_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrreamap_updated_user_id', $value);
            $this->um_usrreamap_updated_user_id = $value;
        }
    }
}
