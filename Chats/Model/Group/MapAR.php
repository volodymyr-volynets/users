<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Group;

use Object\ActiveRecord;

class MapAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatgrpmap_tenant_id','c5_chatgrpmap_c5_chat_id','c5_chatgrpmap_c5_chatgroup_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatgrpmap_tenant_id = null {
        get => $this->c5_chatgrpmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpmap_tenant_id', $value);
            $this->c5_chatgrpmap_tenant_id = $value;
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
    public int|null $c5_chatgrpmap_c5_chat_id = null {
        get => $this->c5_chatgrpmap_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpmap_c5_chat_id', $value);
            $this->c5_chatgrpmap_c5_chat_id = $value;
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
    public string|null $c5_chatgrpmap_c5_chatgroup_code = null {
        get => $this->c5_chatgrpmap_c5_chatgroup_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpmap_c5_chatgroup_code', $value);
            $this->c5_chatgrpmap_c5_chatgroup_code = $value;
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
    public int|null $c5_chatgrpmap_inactive = 0 {
        get => $this->c5_chatgrpmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatgrpmap_inactive', $value);
            $this->c5_chatgrpmap_inactive = $value;
        }
    }
}
