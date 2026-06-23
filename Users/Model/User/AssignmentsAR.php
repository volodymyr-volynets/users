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

class AssignmentsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Assignments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrassign_tenant_id','um_usrassign_assignusrtype_id','um_usrassign_parent_user_id','um_usrassign_child_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrassign_tenant_id = null {
        get => $this->um_usrassign_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_tenant_id', $value);
            $this->um_usrassign_tenant_id = $value;
        }
    }

    /**
     * Assignment #
     *
     *
     *
     * {domain{assignment_id}}
     *
     * @var int|null Domain: assignment_id Type: integer
     */
    public int|null $um_usrassign_assignusrtype_id = null {
        get => $this->um_usrassign_assignusrtype_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_assignusrtype_id', $value);
            $this->um_usrassign_assignusrtype_id = $value;
        }
    }

    /**
     * Parent Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_usrassign_parent_role_id = null {
        get => $this->um_usrassign_parent_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_parent_role_id', $value);
            $this->um_usrassign_parent_role_id = $value;
        }
    }

    /**
     * Parent User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrassign_parent_user_id = null {
        get => $this->um_usrassign_parent_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_parent_user_id', $value);
            $this->um_usrassign_parent_user_id = $value;
        }
    }

    /**
     * Child Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_usrassign_child_role_id = null {
        get => $this->um_usrassign_child_role_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_child_role_id', $value);
            $this->um_usrassign_child_role_id = $value;
        }
    }

    /**
     * Child User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrassign_child_user_id = null {
        get => $this->um_usrassign_child_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_child_user_id', $value);
            $this->um_usrassign_child_user_id = $value;
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
    public int|null $um_usrassign_inactive = 0 {
        get => $this->um_usrassign_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrassign_inactive', $value);
            $this->um_usrassign_inactive = $value;
        }
    }
}
