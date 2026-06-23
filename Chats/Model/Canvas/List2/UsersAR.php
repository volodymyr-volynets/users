<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Canvas\List2;

use Object\ActiveRecord;

class UsersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Users::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatcanvslstuser_tenant_id','c5_chatcanvslstuser_c5_chatcanvslist_id','c5_chatcanvslstuser_c5_chat_id','c5_chatcanvslstuser_um_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatcanvslstuser_tenant_id = null {
        get => $this->c5_chatcanvslstuser_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_tenant_id', $value);
            $this->c5_chatcanvslstuser_tenant_id = $value;
        }
    }

    /**
     * List #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $c5_chatcanvslstuser_c5_chatcanvslist_id = null {
        get => $this->c5_chatcanvslstuser_c5_chatcanvslist_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_c5_chatcanvslist_id', $value);
            $this->c5_chatcanvslstuser_c5_chatcanvslist_id = $value;
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
    public int|null $c5_chatcanvslstuser_um_user_id = null {
        get => $this->c5_chatcanvslstuser_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_um_user_id', $value);
            $this->c5_chatcanvslstuser_um_user_id = $value;
        }
    }

    /**
     * Chat #
     *
     *
     *
     * {domain{chat_id}}
     *
     * @var int|null Domain: chat_id Type: bigint
     */
    public int|null $c5_chatcanvslstuser_c5_chat_id = null {
        get => $this->c5_chatcanvslstuser_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_c5_chat_id', $value);
            $this->c5_chatcanvslstuser_c5_chat_id = $value;
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
    public string|null $c5_chatcanvslstuser_c5_chatcanvas_code = null {
        get => $this->c5_chatcanvslstuser_c5_chatcanvas_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_c5_chatcanvas_code', $value);
            $this->c5_chatcanvslstuser_c5_chatcanvas_code = $value;
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
    public int|null $c5_chatcanvslstuser_inactive = 0 {
        get => $this->c5_chatcanvslstuser_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslstuser_inactive', $value);
            $this->c5_chatcanvslstuser_inactive = $value;
        }
    }
}
