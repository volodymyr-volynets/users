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

class NotificationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Notifications::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrnoti_tenant_id','um_usrnoti_user_id','um_usrnoti_module_id','um_usrnoti_feature_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrnoti_tenant_id = null {
        get => $this->um_usrnoti_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_tenant_id', $value);
            $this->um_usrnoti_tenant_id = $value;
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
    public string|null $um_usrnoti_timestamp = 'now()' {
        get => $this->um_usrnoti_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_timestamp', $value);
            $this->um_usrnoti_timestamp = $value;
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
    public int|null $um_usrnoti_user_id = null {
        get => $this->um_usrnoti_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_user_id', $value);
            $this->um_usrnoti_user_id = $value;
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
    public int|null $um_usrnoti_module_id = null {
        get => $this->um_usrnoti_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_module_id', $value);
            $this->um_usrnoti_module_id = $value;
        }
    }

    /**
     * Feature Code
     *
     *
     *
     * {domain{feature_code}}
     *
     * @var string|null Domain: feature_code Type: varchar
     */
    public string|null $um_usrnoti_feature_code = null {
        get => $this->um_usrnoti_feature_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_feature_code', $value);
            $this->um_usrnoti_feature_code = $value;
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
    public int|null $um_usrnoti_inactive = 0 {
        get => $this->um_usrnoti_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrnoti_inactive', $value);
            $this->um_usrnoti_inactive = $value;
        }
    }
}
