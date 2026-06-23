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

class ChildrenAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Children::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temtem_tenant_id','um_temtem_parent_team_id','um_temtem_child_team_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temtem_tenant_id = null {
        get => $this->um_temtem_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_temtem_tenant_id', $value);
            $this->um_temtem_tenant_id = $value;
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
    public string|null $um_temtem_timestamp = 'now()' {
        get => $this->um_temtem_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_temtem_timestamp', $value);
            $this->um_temtem_timestamp = $value;
        }
    }

    /**
     * Parent Team #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_temtem_parent_team_id = null {
        get => $this->um_temtem_parent_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_temtem_parent_team_id', $value);
            $this->um_temtem_parent_team_id = $value;
        }
    }

    /**
     * Child Team #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_temtem_child_team_id = null {
        get => $this->um_temtem_child_team_id;
        set {
            $this->setFullPkAndFilledColumn('um_temtem_child_team_id', $value);
            $this->um_temtem_child_team_id = $value;
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
    public int|null $um_temtem_inactive = 0 {
        get => $this->um_temtem_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_temtem_inactive', $value);
            $this->um_temtem_inactive = $value;
        }
    }
}
