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

class SkillsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Skills::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrskill_tenant_id','um_usrskill_user_id','um_usrskill_name'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrskill_tenant_id = null {
        get => $this->um_usrskill_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_tenant_id', $value);
            $this->um_usrskill_tenant_id = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrskill_user_id = null {
        get => $this->um_usrskill_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_user_id', $value);
            $this->um_usrskill_user_id = $value;
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
    public string|null $um_usrskill_name = null {
        get => $this->um_usrskill_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_name', $value);
            $this->um_usrskill_name = $value;
        }
    }

    /**
     * Proficiency
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrskill_um_usrskillprof_code = null {
        get => $this->um_usrskill_um_usrskillprof_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_um_usrskillprof_code', $value);
            $this->um_usrskill_um_usrskillprof_code = $value;
        }
    }

    /**
     * Years In Practice
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $um_usrskill_years_in_practice = null {
        get => $this->um_usrskill_years_in_practice;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_years_in_practice', $value);
            $this->um_usrskill_years_in_practice = $value;
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
    public int|null $um_usrskill_inactive = 0 {
        get => $this->um_usrskill_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrskill_inactive', $value);
            $this->um_usrskill_inactive = $value;
        }
    }
}
