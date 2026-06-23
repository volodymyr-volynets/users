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

class PersonalizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Personalizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrpersonal_tenant_id','um_usrpersonal_user_id','um_usrpersonal_module_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrpersonal_tenant_id = null {
        get => $this->um_usrpersonal_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_tenant_id', $value);
            $this->um_usrpersonal_tenant_id = $value;
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
    public int|null $um_usrpersonal_user_id = null {
        get => $this->um_usrpersonal_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_user_id', $value);
            $this->um_usrpersonal_user_id = $value;
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
    public string|null $um_usrpersonal_module_code = null {
        get => $this->um_usrpersonal_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_module_code', $value);
            $this->um_usrpersonal_module_code = $value;
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
    public string|null $um_usrpersonal_name = null {
        get => $this->um_usrpersonal_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_name', $value);
            $this->um_usrpersonal_name = $value;
        }
    }

    /**
     * Is Avatar
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrpersonal_is_avatar = 0 {
        get => $this->um_usrpersonal_is_avatar;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_is_avatar', $value);
            $this->um_usrpersonal_is_avatar = $value;
        }
    }

    /**
     * Photo File #
     *
     *
     *
     * {domain{file_id}}
     *
     * @var int|null Domain: file_id Type: bigint
     */
    public int|null $um_usrpersonal_photo_file_id = null {
        get => $this->um_usrpersonal_photo_file_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_photo_file_id', $value);
            $this->um_usrpersonal_photo_file_id = $value;
        }
    }

    /**
     * Photo File URL
     *
     *
     *
     * {domain{url}}
     *
     * @var string|null Domain: url Type: text
     */
    public string|null $um_usrpersonal_photo_file_url = null {
        get => $this->um_usrpersonal_photo_file_url;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_photo_file_url', $value);
            $this->um_usrpersonal_photo_file_url = $value;
        }
    }

    /**
     * Biography (wysiwyg)
     *
     *
     *
     * {domain{content}}
     *
     * @var string|null Domain: content Type: text
     */
    public string|null $um_usrpersonal_biography_wysiwyg = null {
        get => $this->um_usrpersonal_biography_wysiwyg;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_biography_wysiwyg', $value);
            $this->um_usrpersonal_biography_wysiwyg = $value;
        }
    }

    /**
     * Signature #
     *
     *
     *
     * {domain{signature_id}}
     *
     * @var int|null Domain: signature_id Type: bigint
     */
    public int|null $um_usrpersonal_um_usrsign_id = null {
        get => $this->um_usrpersonal_um_usrsign_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_um_usrsign_id', $value);
            $this->um_usrpersonal_um_usrsign_id = $value;
        }
    }

    /**
     * Term #
     *
     *
     *
     * {domain{bigterm_id}}
     *
     * @var int|null Domain: bigterm_id Type: bigint
     */
    public int|null $um_usrpersonal_um_usrterm_id = null {
        get => $this->um_usrpersonal_um_usrterm_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_um_usrterm_id', $value);
            $this->um_usrpersonal_um_usrterm_id = $value;
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
    public int|null $um_usrpersonal_inactive = 0 {
        get => $this->um_usrpersonal_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_inactive', $value);
            $this->um_usrpersonal_inactive = $value;
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
    public string|null $um_usrpersonal_optimistic_lock = 'now()' {
        get => $this->um_usrpersonal_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_usrpersonal_optimistic_lock', $value);
            $this->um_usrpersonal_optimistic_lock = $value;
        }
    }
}
