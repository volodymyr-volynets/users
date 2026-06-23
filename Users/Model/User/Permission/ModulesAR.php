<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Permission;

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
    public array $object_table_pk = ['um_usrprmmod_tenant_id','um_usrprmmod_user_id','um_usrprmmod_module_id','um_usrprmmod_action_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrprmmod_tenant_id = null {
        get => $this->um_usrprmmod_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_tenant_id', $value);
            $this->um_usrprmmod_tenant_id = $value;
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
    public int|null $um_usrprmmod_user_id = null {
        get => $this->um_usrprmmod_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_user_id', $value);
            $this->um_usrprmmod_user_id = $value;
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
    public int|null $um_usrprmmod_module_id = null {
        get => $this->um_usrprmmod_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_module_id', $value);
            $this->um_usrprmmod_module_id = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $um_usrprmmod_module_code = null {
        get => $this->um_usrprmmod_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_module_code', $value);
            $this->um_usrprmmod_module_code = $value;
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
    public int|null $um_usrprmmod_action_id = 0 {
        get => $this->um_usrprmmod_action_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_action_id', $value);
            $this->um_usrprmmod_action_id = $value;
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
    public int|null $um_usrprmmod_inactive = 0 {
        get => $this->um_usrprmmod_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_inactive', $value);
            $this->um_usrprmmod_inactive = $value;
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
    public string|null $um_usrprmmod_inserted_timestamp = null {
        get => $this->um_usrprmmod_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_inserted_timestamp', $value);
            $this->um_usrprmmod_inserted_timestamp = $value;
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
    public int|null $um_usrprmmod_inserted_user_id = null {
        get => $this->um_usrprmmod_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_inserted_user_id', $value);
            $this->um_usrprmmod_inserted_user_id = $value;
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
    public string|null $um_usrprmmod_updated_timestamp = null {
        get => $this->um_usrprmmod_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_updated_timestamp', $value);
            $this->um_usrprmmod_updated_timestamp = $value;
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
    public int|null $um_usrprmmod_updated_user_id = null {
        get => $this->um_usrprmmod_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrprmmod_updated_user_id', $value);
            $this->um_usrprmmod_updated_user_id = $value;
        }
    }
}
