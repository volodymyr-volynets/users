<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain;

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
    public array $object_table_pk = ['um_usrdommap_tenant_id','um_usrdommap_user_id','um_usrdommap_um_domain_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrdommap_tenant_id = null {
        get => $this->um_usrdommap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_tenant_id', $value);
            $this->um_usrdommap_tenant_id = $value;
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
    public string|null $um_usrdommap_timestamp = 'now()' {
        get => $this->um_usrdommap_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_timestamp', $value);
            $this->um_usrdommap_timestamp = $value;
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
    public int|null $um_usrdommap_user_id = null {
        get => $this->um_usrdommap_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_user_id', $value);
            $this->um_usrdommap_user_id = $value;
        }
    }

    /**
     * Domain #
     *
     *
     *
     * {domain{domain_id}}
     *
     * @var int|null Domain: domain_id Type: integer
     */
    public int|null $um_usrdommap_um_domain_id = null {
        get => $this->um_usrdommap_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_um_domain_id', $value);
            $this->um_usrdommap_um_domain_id = $value;
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
    public int|null $um_usrdommap_primary = 0 {
        get => $this->um_usrdommap_primary;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_primary', $value);
            $this->um_usrdommap_primary = $value;
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
    public int|null $um_usrdommap_inactive = 0 {
        get => $this->um_usrdommap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_inactive', $value);
            $this->um_usrdommap_inactive = $value;
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
    public string|null $um_usrdommap_inserted_timestamp = null {
        get => $this->um_usrdommap_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_inserted_timestamp', $value);
            $this->um_usrdommap_inserted_timestamp = $value;
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
    public int|null $um_usrdommap_inserted_user_id = null {
        get => $this->um_usrdommap_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_inserted_user_id', $value);
            $this->um_usrdommap_inserted_user_id = $value;
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
    public string|null $um_usrdommap_updated_timestamp = null {
        get => $this->um_usrdommap_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_updated_timestamp', $value);
            $this->um_usrdommap_updated_timestamp = $value;
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
    public int|null $um_usrdommap_updated_user_id = null {
        get => $this->um_usrdommap_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrdommap_updated_user_id', $value);
            $this->um_usrdommap_updated_user_id = $value;
        }
    }
}
