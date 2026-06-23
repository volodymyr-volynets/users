<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Team\Policy;

use Object\ActiveRecord;

class PoliciesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Policies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_tempolicy_tenant_id','um_tempolicy_team_id','um_tempolicy_sm_policy_tenant_id','um_tempolicy_sm_policy_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_tempolicy_tenant_id = null {
        get => $this->um_tempolicy_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_tenant_id', $value);
            $this->um_tempolicy_tenant_id = $value;
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
    public string|null $um_tempolicy_timestamp = 'now()' {
        get => $this->um_tempolicy_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_timestamp', $value);
            $this->um_tempolicy_timestamp = $value;
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
    public int|null $um_tempolicy_team_id = null {
        get => $this->um_tempolicy_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_team_id', $value);
            $this->um_tempolicy_team_id = $value;
        }
    }

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_tempolicy_sm_policy_tenant_id = null {
        get => $this->um_tempolicy_sm_policy_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_sm_policy_tenant_id', $value);
            $this->um_tempolicy_sm_policy_tenant_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_tempolicy_sm_policy_code = null {
        get => $this->um_tempolicy_sm_policy_code;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_sm_policy_code', $value);
            $this->um_tempolicy_sm_policy_code = $value;
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
    public int|null $um_tempolicy_inactive = 0 {
        get => $this->um_tempolicy_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_tempolicy_inactive', $value);
            $this->um_tempolicy_inactive = $value;
        }
    }
}
