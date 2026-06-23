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

class GroupsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_reapolgrp_tenant_id','um_reapolgrp_um_realm_id','um_reapolgrp_sm_polgroup_tenant_id','um_reapolgrp_sm_polgroup_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reapolgrp_tenant_id = null {
        get => $this->um_reapolgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_tenant_id', $value);
            $this->um_reapolgrp_tenant_id = $value;
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
    public string|null $um_reapolgrp_timestamp = 'now()' {
        get => $this->um_reapolgrp_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_timestamp', $value);
            $this->um_reapolgrp_timestamp = $value;
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
    public int|null $um_reapolgrp_um_realm_id = null {
        get => $this->um_reapolgrp_um_realm_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_um_realm_id', $value);
            $this->um_reapolgrp_um_realm_id = $value;
        }
    }

    /**
     * Child Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_reapolgrp_sm_polgroup_tenant_id = null {
        get => $this->um_reapolgrp_sm_polgroup_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_sm_polgroup_tenant_id', $value);
            $this->um_reapolgrp_sm_polgroup_tenant_id = $value;
        }
    }

    /**
     * Child Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_reapolgrp_sm_polgroup_id = null {
        get => $this->um_reapolgrp_sm_polgroup_id;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_sm_polgroup_id', $value);
            $this->um_reapolgrp_sm_polgroup_id = $value;
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
    public int|null $um_reapolgrp_inactive = 0 {
        get => $this->um_reapolgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_reapolgrp_inactive', $value);
            $this->um_reapolgrp_inactive = $value;
        }
    }
}
