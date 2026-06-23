<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification\Policy;

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
    public array $object_table_pk = ['um_clspolgrp_tenant_id','um_clspolgrp_um_classification_id','um_clspolgrp_sm_polgroup_tenant_id','um_clspolgrp_sm_polgroup_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_clspolgrp_tenant_id = null {
        get => $this->um_clspolgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_tenant_id', $value);
            $this->um_clspolgrp_tenant_id = $value;
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
    public string|null $um_clspolgrp_timestamp = 'now()' {
        get => $this->um_clspolgrp_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_timestamp', $value);
            $this->um_clspolgrp_timestamp = $value;
        }
    }

    /**
     * Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_clspolgrp_um_classification_id = null {
        get => $this->um_clspolgrp_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_um_classification_id', $value);
            $this->um_clspolgrp_um_classification_id = $value;
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
    public int|null $um_clspolgrp_sm_polgroup_tenant_id = null {
        get => $this->um_clspolgrp_sm_polgroup_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_sm_polgroup_tenant_id', $value);
            $this->um_clspolgrp_sm_polgroup_tenant_id = $value;
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
    public int|null $um_clspolgrp_sm_polgroup_id = null {
        get => $this->um_clspolgrp_sm_polgroup_id;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_sm_polgroup_id', $value);
            $this->um_clspolgrp_sm_polgroup_id = $value;
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
    public int|null $um_clspolgrp_inactive = 0 {
        get => $this->um_clspolgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_clspolgrp_inactive', $value);
            $this->um_clspolgrp_inactive = $value;
        }
    }
}
