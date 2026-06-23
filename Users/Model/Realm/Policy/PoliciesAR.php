<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Realm\Policy;

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
    public array $object_table_pk = ['um_reapolicy_tenant_id','um_reapolicy_um_realm_id','um_reapolicy_sm_policy_tenant_id','um_reapolicy_sm_policy_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reapolicy_tenant_id = null {
        get => $this->um_reapolicy_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_tenant_id', $value);
            $this->um_reapolicy_tenant_id = $value;
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
    public string|null $um_reapolicy_timestamp = 'now()' {
        get => $this->um_reapolicy_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_timestamp', $value);
            $this->um_reapolicy_timestamp = $value;
        }
    }

    /**
     * Realm #
     *
     *
     *
     * {domain{realm_id}}
     *
     * @var int|null Domain: realm_id Type: integer
     */
    public int|null $um_reapolicy_um_realm_id = null {
        get => $this->um_reapolicy_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_um_realm_id', $value);
            $this->um_reapolicy_um_realm_id = $value;
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
    public int|null $um_reapolicy_sm_policy_tenant_id = null {
        get => $this->um_reapolicy_sm_policy_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_sm_policy_tenant_id', $value);
            $this->um_reapolicy_sm_policy_tenant_id = $value;
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
    public string|null $um_reapolicy_sm_policy_code = null {
        get => $this->um_reapolicy_sm_policy_code;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_sm_policy_code', $value);
            $this->um_reapolicy_sm_policy_code = $value;
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
    public int|null $um_reapolicy_inactive = 0 {
        get => $this->um_reapolicy_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_reapolicy_inactive', $value);
            $this->um_reapolicy_inactive = $value;
        }
    }
}
