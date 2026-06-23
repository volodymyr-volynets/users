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

class LanguagesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Languages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrsplang_tenant_id','um_usrsplang_user_id','um_usrsplang_language_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrsplang_tenant_id = null {
        get => $this->um_usrsplang_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_tenant_id', $value);
            $this->um_usrsplang_tenant_id = $value;
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
    public int|null $um_usrsplang_user_id = null {
        get => $this->um_usrsplang_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_user_id', $value);
            $this->um_usrsplang_user_id = $value;
        }
    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $um_usrsplang_language_code = null {
        get => $this->um_usrsplang_language_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_language_code', $value);
            $this->um_usrsplang_language_code = $value;
        }
    }

    /**
     * Listening Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrsplang_listening_um_usrpiiprof_code = null {
        get => $this->um_usrsplang_listening_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_listening_um_usrpiiprof_code', $value);
            $this->um_usrsplang_listening_um_usrpiiprof_code = $value;
        }
    }

    /**
     * Speaking Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrsplang_speaking_um_usrpiiprof_code = null {
        get => $this->um_usrsplang_speaking_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_speaking_um_usrpiiprof_code', $value);
            $this->um_usrsplang_speaking_um_usrpiiprof_code = $value;
        }
    }

    /**
     * Writing Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usrsplang_writing_um_usrpiiprof_code = null {
        get => $this->um_usrsplang_writing_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_writing_um_usrpiiprof_code', $value);
            $this->um_usrsplang_writing_um_usrpiiprof_code = $value;
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
    public int|null $um_usrsplang_inactive = 0 {
        get => $this->um_usrsplang_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrsplang_inactive', $value);
            $this->um_usrsplang_inactive = $value;
        }
    }
}
