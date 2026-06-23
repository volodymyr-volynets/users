<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\ExternalPermission;

use Object\ActiveRecord;

class SubresourcesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Subresources::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrextprsub_tenant_id','um_usrextprsub_user_id','um_usrextprsub_um_extmdids_id','um_usrextprsub_um_extresrc_id','um_usrextprsub_um_extsursrc_id','um_usrextprsub_um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrextprsub_tenant_id = null {
        get => $this->um_usrextprsub_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_tenant_id', $value);
            $this->um_usrextprsub_tenant_id = $value;
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
    public string|null $um_usrextprsub_timestamp = 'now()' {
        get => $this->um_usrextprsub_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_timestamp', $value);
            $this->um_usrextprsub_timestamp = $value;
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
    public int|null $um_usrextprsub_user_id = null {
        get => $this->um_usrextprsub_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_user_id', $value);
            $this->um_usrextprsub_user_id = $value;
        }
    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_usrextprsub_um_extmdids_id = null {
        get => $this->um_usrextprsub_um_extmdids_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_um_extmdids_id', $value);
            $this->um_usrextprsub_um_extmdids_id = $value;
        }
    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_usrextprsub_um_extresrc_id = 0 {
        get => $this->um_usrextprsub_um_extresrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_um_extresrc_id', $value);
            $this->um_usrextprsub_um_extresrc_id = $value;
        }
    }

    /**
     * Subresource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_usrextprsub_um_extsursrc_id = 0 {
        get => $this->um_usrextprsub_um_extsursrc_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_um_extsursrc_id', $value);
            $this->um_usrextprsub_um_extsursrc_id = $value;
        }
    }

    /**
     * Action #
     *
     *
     *
     * {domain{action_id}}
     *
     * @var int|null Domain: action_id Type: smallint
     */
    public int|null $um_usrextprsub_um_extactn_id = 0 {
        get => $this->um_usrextprsub_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_um_extactn_id', $value);
            $this->um_usrextprsub_um_extactn_id = $value;
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
    public int|null $um_usrextprsub_inactive = 0 {
        get => $this->um_usrextprsub_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrextprsub_inactive', $value);
            $this->um_usrextprsub_inactive = $value;
        }
    }
}
