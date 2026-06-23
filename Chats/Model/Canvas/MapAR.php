<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Canvas;

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
    public array $object_table_pk = ['c5_chatcanvsmap_tenant_id','c5_chatcanvsmap_c5_chat_id','c5_chatcanvsmap_c5_chatcanvas_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatcanvsmap_tenant_id = null {
        get => $this->c5_chatcanvsmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_tenant_id', $value);
            $this->c5_chatcanvsmap_tenant_id = $value;
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
    public int|null $c5_chatcanvsmap_c5_chat_id = null {
        get => $this->c5_chatcanvsmap_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_c5_chat_id', $value);
            $this->c5_chatcanvsmap_c5_chat_id = $value;
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
    public string|null $c5_chatcanvsmap_c5_chatcanvas_code = null {
        get => $this->c5_chatcanvsmap_c5_chatcanvas_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_c5_chatcanvas_code', $value);
            $this->c5_chatcanvsmap_c5_chatcanvas_code = $value;
        }
    }

    /**
     * Tab
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $c5_chatcanvsmap_tab = null {
        get => $this->c5_chatcanvsmap_tab;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_tab', $value);
            $this->c5_chatcanvsmap_tab = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $c5_chatcanvsmap_order = 0 {
        get => $this->c5_chatcanvsmap_order;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_order', $value);
            $this->c5_chatcanvsmap_order = $value;
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
    public int|null $c5_chatcanvsmap_inactive = 0 {
        get => $this->c5_chatcanvsmap_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvsmap_inactive', $value);
            $this->c5_chatcanvsmap_inactive = $value;
        }
    }
}
