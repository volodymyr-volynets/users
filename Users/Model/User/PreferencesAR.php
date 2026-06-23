<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\ActiveRecord;

class PreferencesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Preferences::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrpreference_tenant_id','um_usrpreference_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrpreference_tenant_id = null {
        get => $this->um_usrpreference_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpreference_tenant_id', $value);
            $this->um_usrpreference_tenant_id = $value;
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
    public int|null $um_usrpreference_user_id = null {
        get => $this->um_usrpreference_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpreference_user_id', $value);
            $this->um_usrpreference_user_id = $value;
        }
    }

    /**
     * Dynamic Menu
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrpreference_dynamic_menu = 0 {
        get => $this->um_usrpreference_dynamic_menu;
        set {
            $this->setFullPkAndFilledColumn('um_usrpreference_dynamic_menu', $value);
            $this->um_usrpreference_dynamic_menu = $value;
        }
    }
}
