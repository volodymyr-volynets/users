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

class SignaturesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Signatures::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrsign_tenant_id','um_usrsign_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrsign_tenant_id = null {
        get => $this->um_usrsign_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_tenant_id', $value);
            $this->um_usrsign_tenant_id = $value;
        }
    }

    /**
     * Signature #
     *
     *
     *
     * {domain{signature_id_sequence}}
     *
     * @var int|null Domain: signature_id_sequence Type: bigserial
     */
    public int|null $um_usrsign_id = null {
        get => $this->um_usrsign_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_id', $value);
            $this->um_usrsign_id = $value;
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
    public string|null $um_usrsign_name = null {
        get => $this->um_usrsign_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_name', $value);
            $this->um_usrsign_name = $value;
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
    public int|null $um_usrsign_user_id = null {
        get => $this->um_usrsign_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_user_id', $value);
            $this->um_usrsign_user_id = $value;
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
    public string|null $um_usrsign_module_code = null {
        get => $this->um_usrsign_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_module_code', $value);
            $this->um_usrsign_module_code = $value;
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
    public string|null $um_usrsign_content_wysiwyg = null {
        get => $this->um_usrsign_content_wysiwyg;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_content_wysiwyg', $value);
            $this->um_usrsign_content_wysiwyg = $value;
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
    public int|null $um_usrsign_inactive = 0 {
        get => $this->um_usrsign_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_inactive', $value);
            $this->um_usrsign_inactive = $value;
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
    public string|null $um_usrsign_optimistic_lock = 'now()' {
        get => $this->um_usrsign_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_usrsign_optimistic_lock', $value);
            $this->um_usrsign_optimistic_lock = $value;
        }
    }
}
