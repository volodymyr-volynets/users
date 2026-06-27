<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team;

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
    public array $object_table_pk = ['um_usrtmmap_tenant_id','um_usrtmmap_user_id','um_usrtmmap_team_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrtmmap_tenant_id = null {
        get => $this->um_usrtmmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_tenant_id', $value);
            $this->um_usrtmmap_tenant_id = $value;
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
    public string|null $um_usrtmmap_timestamp = 'now()' {
        get => $this->um_usrtmmap_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_timestamp', $value);
            $this->um_usrtmmap_timestamp = $value;
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
    public int|null $um_usrtmmap_user_id = null {
        get => $this->um_usrtmmap_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_user_id', $value);
            $this->um_usrtmmap_user_id = $value;
        }
    }

    /**
     * Group #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_usrtmmap_team_id = null {
        get => $this->um_usrtmmap_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_team_id', $value);
            $this->um_usrtmmap_team_id = $value;
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
    public int|null $um_usrtmmap_inactive = 0 {
        get => $this->um_usrtmmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_inactive', $value);
            $this->um_usrtmmap_inactive = $value;
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
    public string|null $um_usrtmmap_inserted_timestamp = null {
        get => $this->um_usrtmmap_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_inserted_timestamp', $value);
            $this->um_usrtmmap_inserted_timestamp = $value;
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
    public int|null $um_usrtmmap_inserted_user_id = null {
        get => $this->um_usrtmmap_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_inserted_user_id', $value);
            $this->um_usrtmmap_inserted_user_id = $value;
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
    public string|null $um_usrtmmap_updated_timestamp = null {
        get => $this->um_usrtmmap_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_updated_timestamp', $value);
            $this->um_usrtmmap_updated_timestamp = $value;
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
    public int|null $um_usrtmmap_updated_user_id = null {
        get => $this->um_usrtmmap_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrtmmap_updated_user_id', $value);
            $this->um_usrtmmap_updated_user_id = $value;
        }
    }
}
