<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain\Policy;

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
    public array $object_table_pk = ['um_dompolgrp_tenant_id','um_dompolgrp_um_domain_id','um_dompolgrp_sm_polgroup_tenant_id','um_dompolgrp_sm_polgroup_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_dompolgrp_tenant_id = null {
        get => $this->um_dompolgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_tenant_id', $value);
            $this->um_dompolgrp_tenant_id = $value;
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
    public string|null $um_dompolgrp_timestamp = 'now()' {
        get => $this->um_dompolgrp_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_timestamp', $value);
            $this->um_dompolgrp_timestamp = $value;
        }
    }

    /**
     * Domain #
     *
     *
     *
     * {domain{domain_id}}
     *
     * @var int|null Domain: domain_id Type: integer
     */
    public int|null $um_dompolgrp_um_domain_id = null {
        get => $this->um_dompolgrp_um_domain_id;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_um_domain_id', $value);
            $this->um_dompolgrp_um_domain_id = $value;
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
    public int|null $um_dompolgrp_sm_polgroup_tenant_id = null {
        get => $this->um_dompolgrp_sm_polgroup_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_sm_polgroup_tenant_id', $value);
            $this->um_dompolgrp_sm_polgroup_tenant_id = $value;
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
    public int|null $um_dompolgrp_sm_polgroup_id = null {
        get => $this->um_dompolgrp_sm_polgroup_id;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_sm_polgroup_id', $value);
            $this->um_dompolgrp_sm_polgroup_id = $value;
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
    public int|null $um_dompolgrp_inactive = 0 {
        get => $this->um_dompolgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_dompolgrp_inactive', $value);
            $this->um_dompolgrp_inactive = $value;
        }
    }
}
