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

class ListsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Lists::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatcanvslist_tenant_id','c5_chatcanvslist_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatcanvslist_tenant_id = null {
        get => $this->c5_chatcanvslist_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_tenant_id', $value);
            $this->c5_chatcanvslist_tenant_id = $value;
        }
    }

    /**
     * List #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $c5_chatcanvslist_id = null {
        get => $this->c5_chatcanvslist_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_id', $value);
            $this->c5_chatcanvslist_id = $value;
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
    public string|null $c5_chatcanvslist_c5_chatcanvas_code = null {
        get => $this->c5_chatcanvslist_c5_chatcanvas_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_c5_chatcanvas_code', $value);
            $this->c5_chatcanvslist_c5_chatcanvas_code = $value;
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
    public string|null $c5_chatcanvslist_name = null {
        get => $this->c5_chatcanvslist_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_name', $value);
            $this->c5_chatcanvslist_name = $value;
        }
    }

    /**
     * Description
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $c5_chatcanvslist_description = null {
        get => $this->c5_chatcanvslist_description;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_description', $value);
            $this->c5_chatcanvslist_description = $value;
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
    public int|null $c5_chatcanvslist_order = 0 {
        get => $this->c5_chatcanvslist_order;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_order', $value);
            $this->c5_chatcanvslist_order = $value;
        }
    }

    /**
     * Group
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $c5_chatcanvslist_group = null {
        get => $this->c5_chatcanvslist_group;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_group', $value);
            $this->c5_chatcanvslist_group = $value;
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
    public int|null $c5_chatcanvslist_inactive = 0 {
        get => $this->c5_chatcanvslist_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvslist_inactive', $value);
            $this->c5_chatcanvslist_inactive = $value;
        }
    }
}
