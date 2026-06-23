<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend\Dashboard;

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
    public array $object_table_pk = ['d9_frontdashgrp_tenant_id','d9_frontdashgrp_d9_frontdash_id','d9_frontdashgrp_d9_frontgrp_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_frontdashgrp_tenant_id = null {
        get => $this->d9_frontdashgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdashgrp_tenant_id', $value);
            $this->d9_frontdashgrp_tenant_id = $value;
        }
    }

    /**
     * Dashboard #
     *
     *
     *
     * {domain{dashboard_id}}
     *
     * @var int|null Domain: dashboard_id Type: integer
     */
    public int|null $d9_frontdashgrp_d9_frontdash_id = null {
        get => $this->d9_frontdashgrp_d9_frontdash_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdashgrp_d9_frontdash_id', $value);
            $this->d9_frontdashgrp_d9_frontdash_id = $value;
        }
    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $d9_frontdashgrp_d9_frontgrp_id = null {
        get => $this->d9_frontdashgrp_d9_frontgrp_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdashgrp_d9_frontgrp_id', $value);
            $this->d9_frontdashgrp_d9_frontgrp_id = $value;
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
    public int|null $d9_frontdashgrp_inactive = 0 {
        get => $this->d9_frontdashgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_frontdashgrp_inactive', $value);
            $this->d9_frontdashgrp_inactive = $value;
        }
    }
}
