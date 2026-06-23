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

class MentionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Mentions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrmention_tenant_id','um_usrmention_user_id','um_usrmention_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrmention_tenant_id = null {
        get => $this->um_usrmention_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_tenant_id', $value);
            $this->um_usrmention_tenant_id = $value;
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
    public int|null $um_usrmention_user_id = null {
        get => $this->um_usrmention_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_user_id', $value);
            $this->um_usrmention_user_id = $value;
        }
    }

    /**
     * Mention #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_usrmention_id = null {
        get => $this->um_usrmention_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_id', $value);
            $this->um_usrmention_id = $value;
        }
    }

    /**
     * Mention
     *
     *
     *
     * {domain{mention}}
     *
     * @var string|null Domain: mention Type: varchar
     */
    public string|null $um_usrmention_mention = null {
        get => $this->um_usrmention_mention;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_mention', $value);
            $this->um_usrmention_mention = $value;
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
    public string|null $um_usrmention_language_code = null {
        get => $this->um_usrmention_language_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_language_code', $value);
            $this->um_usrmention_language_code = $value;
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
    public int|null $um_usrmention_inactive = 0 {
        get => $this->um_usrmention_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrmention_inactive', $value);
            $this->um_usrmention_inactive = $value;
        }
    }
}
