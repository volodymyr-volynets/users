<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification;

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
    public array $object_table_pk = ['um_usrclsmap_tenant_id','um_usrclsmap_user_id','um_usrclsmap_um_classification_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrclsmap_tenant_id = null {
        get => $this->um_usrclsmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_tenant_id', $value);
            $this->um_usrclsmap_tenant_id = $value;
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
    public string|null $um_usrclsmap_timestamp = 'now()' {
        get => $this->um_usrclsmap_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_timestamp', $value);
            $this->um_usrclsmap_timestamp = $value;
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
    public int|null $um_usrclsmap_user_id = null {
        get => $this->um_usrclsmap_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_user_id', $value);
            $this->um_usrclsmap_user_id = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrclsmap_um_classtype_code = null {
        get => $this->um_usrclsmap_um_classtype_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_um_classtype_code', $value);
            $this->um_usrclsmap_um_classtype_code = $value;
        }
    }

    /**
     * Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_usrclsmap_um_classification_id = null {
        get => $this->um_usrclsmap_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_um_classification_id', $value);
            $this->um_usrclsmap_um_classification_id = $value;
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
    public int|null $um_usrclsmap_inactive = 0 {
        get => $this->um_usrclsmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_inactive', $value);
            $this->um_usrclsmap_inactive = $value;
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
    public string|null $um_usrclsmap_inserted_timestamp = null {
        get => $this->um_usrclsmap_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_inserted_timestamp', $value);
            $this->um_usrclsmap_inserted_timestamp = $value;
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
    public int|null $um_usrclsmap_inserted_user_id = null {
        get => $this->um_usrclsmap_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_inserted_user_id', $value);
            $this->um_usrclsmap_inserted_user_id = $value;
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
    public string|null $um_usrclsmap_updated_timestamp = null {
        get => $this->um_usrclsmap_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_updated_timestamp', $value);
            $this->um_usrclsmap_updated_timestamp = $value;
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
    public int|null $um_usrclsmap_updated_user_id = null {
        get => $this->um_usrclsmap_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrclsmap_updated_user_id', $value);
            $this->um_usrclsmap_updated_user_id = $value;
        }
    }
}
