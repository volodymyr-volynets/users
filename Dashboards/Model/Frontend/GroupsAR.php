<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Frontend;

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
    public array $object_table_pk = ['d9_frontgrp_tenant_id','d9_frontgrp_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_frontgrp_tenant_id = null {
        get => $this->d9_frontgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_tenant_id', $value);
            $this->d9_frontgrp_tenant_id = $value;
        }
    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $d9_frontgrp_id = null {
        get => $this->d9_frontgrp_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_id', $value);
            $this->d9_frontgrp_id = $value;
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
    public string|null $d9_frontgrp_code = null {
        get => $this->d9_frontgrp_code;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_code', $value);
            $this->d9_frontgrp_code = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $d9_frontgrp_name = null {
        get => $this->d9_frontgrp_name;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_name', $value);
            $this->d9_frontgrp_name = $value;
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
    public int|null $d9_frontgrp_inactive = 0 {
        get => $this->d9_frontgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_inactive', $value);
            $this->d9_frontgrp_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $d9_frontgrp_optimistic_lock = 'now()' {
        get => $this->d9_frontgrp_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_optimistic_lock', $value);
            $this->d9_frontgrp_optimistic_lock = $value;
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
    public string|null $d9_frontgrp_inserted_timestamp = null {
        get => $this->d9_frontgrp_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_inserted_timestamp', $value);
            $this->d9_frontgrp_inserted_timestamp = $value;
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
    public int|null $d9_frontgrp_inserted_user_id = null {
        get => $this->d9_frontgrp_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_inserted_user_id', $value);
            $this->d9_frontgrp_inserted_user_id = $value;
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
    public string|null $d9_frontgrp_updated_timestamp = null {
        get => $this->d9_frontgrp_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_updated_timestamp', $value);
            $this->d9_frontgrp_updated_timestamp = $value;
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
    public int|null $d9_frontgrp_updated_user_id = null {
        get => $this->d9_frontgrp_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('d9_frontgrp_updated_user_id', $value);
            $this->d9_frontgrp_updated_user_id = $value;
        }
    }
}
