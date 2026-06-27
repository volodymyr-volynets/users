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

class NotificationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Notifications::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temnoti_tenant_id','um_temnoti_team_id','um_temnoti_module_id','um_temnoti_feature_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temnoti_tenant_id = null {
        get => $this->um_temnoti_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_tenant_id', $value);
            $this->um_temnoti_tenant_id = $value;
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
    public string|null $um_temnoti_timestamp = 'now()' {
        get => $this->um_temnoti_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_timestamp', $value);
            $this->um_temnoti_timestamp = $value;
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
    public int|null $um_temnoti_team_id = null {
        get => $this->um_temnoti_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_team_id', $value);
            $this->um_temnoti_team_id = $value;
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
    public int|null $um_temnoti_module_id = null {
        get => $this->um_temnoti_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_module_id', $value);
            $this->um_temnoti_module_id = $value;
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
    public string|null $um_temnoti_feature_code = null {
        get => $this->um_temnoti_feature_code;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_feature_code', $value);
            $this->um_temnoti_feature_code = $value;
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
    public int|null $um_temnoti_inactive = 0 {
        get => $this->um_temnoti_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_temnoti_inactive', $value);
            $this->um_temnoti_inactive = $value;
        }
    }
}
