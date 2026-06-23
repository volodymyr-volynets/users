<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model;

use Object\ActiveRecord;

class CanvasesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Canvases::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatcanvas_tenant_id','c5_chatcanvas_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatcanvas_tenant_id = null {
        get => $this->c5_chatcanvas_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_tenant_id', $value);
            $this->c5_chatcanvas_tenant_id = $value;
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
    public string|null $c5_chatcanvas_code = null {
        get => $this->c5_chatcanvas_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_code', $value);
            $this->c5_chatcanvas_code = $value;
        }
    }

    /**
     * Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $c5_chatcanvas_c5_canvastype_code = null {
        get => $this->c5_chatcanvas_c5_canvastype_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_c5_canvastype_code', $value);
            $this->c5_chatcanvas_c5_canvastype_code = $value;
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
    public string|null $c5_chatcanvas_name = null {
        get => $this->c5_chatcanvas_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_name', $value);
            $this->c5_chatcanvas_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $c5_chatcanvas_icon = null {
        get => $this->c5_chatcanvas_icon;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_icon', $value);
            $this->c5_chatcanvas_icon = $value;
        }
    }

    /**
     * HTML (wysiwyg)
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $c5_chatcanvas_html_wysiwyg = null {
        get => $this->c5_chatcanvas_html_wysiwyg;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_html_wysiwyg', $value);
            $this->c5_chatcanvas_html_wysiwyg = $value;
        }
    }

    /**
     * Link URL
     *
     *
     *
     * {domain{url}}
     *
     * @var string|null Domain: url Type: text
     */
    public string|null $c5_chatcanvas_link_url = null {
        get => $this->c5_chatcanvas_link_url;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_link_url', $value);
            $this->c5_chatcanvas_link_url = $value;
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
    public int|null $c5_chatcanvas_inactive = 0 {
        get => $this->c5_chatcanvas_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_inactive', $value);
            $this->c5_chatcanvas_inactive = $value;
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
    public string|null $c5_chatcanvas_optimistic_lock = 'now()' {
        get => $this->c5_chatcanvas_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_optimistic_lock', $value);
            $this->c5_chatcanvas_optimistic_lock = $value;
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
    public string|null $c5_chatcanvas_inserted_timestamp = null {
        get => $this->c5_chatcanvas_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_inserted_timestamp', $value);
            $this->c5_chatcanvas_inserted_timestamp = $value;
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
    public int|null $c5_chatcanvas_inserted_user_id = null {
        get => $this->c5_chatcanvas_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_inserted_user_id', $value);
            $this->c5_chatcanvas_inserted_user_id = $value;
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
    public string|null $c5_chatcanvas_updated_timestamp = null {
        get => $this->c5_chatcanvas_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_updated_timestamp', $value);
            $this->c5_chatcanvas_updated_timestamp = $value;
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
    public int|null $c5_chatcanvas_updated_user_id = null {
        get => $this->c5_chatcanvas_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatcanvas_updated_user_id', $value);
            $this->c5_chatcanvas_updated_user_id = $value;
        }
    }
}
