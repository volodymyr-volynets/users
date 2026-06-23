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

class TermsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Terms::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrterm_tenant_id','um_usrterm_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrterm_tenant_id = null {
        get => $this->um_usrterm_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_tenant_id', $value);
            $this->um_usrterm_tenant_id = $value;
        }
    }

    /**
     * Term #
     *
     *
     *
     * {domain{bigterm_id_sequence}}
     *
     * @var int|null Domain: bigterm_id_sequence Type: bigserial
     */
    public int|null $um_usrterm_id = null {
        get => $this->um_usrterm_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_id', $value);
            $this->um_usrterm_id = $value;
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
    public string|null $um_usrterm_name = null {
        get => $this->um_usrterm_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_name', $value);
            $this->um_usrterm_name = $value;
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
    public int|null $um_usrterm_user_id = null {
        get => $this->um_usrterm_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_user_id', $value);
            $this->um_usrterm_user_id = $value;
        }
    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $um_usrterm_module_code = null {
        get => $this->um_usrterm_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_module_code', $value);
            $this->um_usrterm_module_code = $value;
        }
    }

    /**
     * Content (wysiwyg)
     *
     *
     *
     * {domain{content}}
     *
     * @var string|null Domain: content Type: text
     */
    public string|null $um_usrterm_content_wysiwyg = null {
        get => $this->um_usrterm_content_wysiwyg;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_content_wysiwyg', $value);
            $this->um_usrterm_content_wysiwyg = $value;
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
    public int|null $um_usrterm_order = 0 {
        get => $this->um_usrterm_order;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_order', $value);
            $this->um_usrterm_order = $value;
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
    public int|null $um_usrterm_inactive = 0 {
        get => $this->um_usrterm_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_inactive', $value);
            $this->um_usrterm_inactive = $value;
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
    public string|null $um_usrterm_optimistic_lock = 'now()' {
        get => $this->um_usrterm_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_usrterm_optimistic_lock', $value);
            $this->um_usrterm_optimistic_lock = $value;
        }
    }
}
