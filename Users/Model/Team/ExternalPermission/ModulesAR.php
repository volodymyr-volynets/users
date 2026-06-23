<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team\ExternalPermission;

use Object\ActiveRecord;

class ModulesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Modules::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temextprmmod_tenant_id','um_temextprmmod_team_id','um_temextprmmod_um_extmdids_id','um_temextprmmod_um_extactn_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temextprmmod_tenant_id = null {
        get => $this->um_temextprmmod_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_tenant_id', $value);
            $this->um_temextprmmod_tenant_id = $value;
        }
    }

    /**
     * Team #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_temextprmmod_team_id = null {
        get => $this->um_temextprmmod_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_team_id', $value);
            $this->um_temextprmmod_team_id = $value;
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
    public int|null $um_temextprmmod_um_extmdids_id = null {
        get => $this->um_temextprmmod_um_extmdids_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_um_extmdids_id', $value);
            $this->um_temextprmmod_um_extmdids_id = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code_external}}
     *
     * @var string|null Domain: module_code_external Type: char
     */
    public string|null $um_temextprmmod_um_extmdl_code = null {
        get => $this->um_temextprmmod_um_extmdl_code;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_um_extmdl_code', $value);
            $this->um_temextprmmod_um_extmdl_code = $value;
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
    public int|null $um_temextprmmod_um_extactn_id = 0 {
        get => $this->um_temextprmmod_um_extactn_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_um_extactn_id', $value);
            $this->um_temextprmmod_um_extactn_id = $value;
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
    public int|null $um_temextprmmod_inactive = 0 {
        get => $this->um_temextprmmod_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_inactive', $value);
            $this->um_temextprmmod_inactive = $value;
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
    public string|null $um_temextprmmod_inserted_timestamp = null {
        get => $this->um_temextprmmod_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_inserted_timestamp', $value);
            $this->um_temextprmmod_inserted_timestamp = $value;
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
    public int|null $um_temextprmmod_inserted_user_id = null {
        get => $this->um_temextprmmod_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_inserted_user_id', $value);
            $this->um_temextprmmod_inserted_user_id = $value;
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
    public string|null $um_temextprmmod_updated_timestamp = null {
        get => $this->um_temextprmmod_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_updated_timestamp', $value);
            $this->um_temextprmmod_updated_timestamp = $value;
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
    public int|null $um_temextprmmod_updated_user_id = null {
        get => $this->um_temextprmmod_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_temextprmmod_updated_user_id', $value);
            $this->um_temextprmmod_updated_user_id = $value;
        }
    }
}
