<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Resource;

use Object\ActiveRecord;

class FavoritesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Favorites::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrresfavorite_tenant_id','um_usrresfavorite_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrresfavorite_tenant_id = null {
        get => $this->um_usrresfavorite_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_tenant_id', $value);
            $this->um_usrresfavorite_tenant_id = $value;
        }
    }

    /**
     * Favorite #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_usrresfavorite_id = null {
        get => $this->um_usrresfavorite_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_id', $value);
            $this->um_usrresfavorite_id = $value;
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
    public string|null $um_usrresfavorite_name = null {
        get => $this->um_usrresfavorite_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_name', $value);
            $this->um_usrresfavorite_name = $value;
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
    public string|null $um_usrresfavorite_description = null {
        get => $this->um_usrresfavorite_description;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_description', $value);
            $this->um_usrresfavorite_description = $value;
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
    public string|null $um_usrresfavorite_icon = null {
        get => $this->um_usrresfavorite_icon;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_icon', $value);
            $this->um_usrresfavorite_icon = $value;
        }
    }

    /**
     * URL
     *
     *
     *
     * {domain{url}}
     *
     * @var string|null Domain: url Type: text
     */
    public string|null $um_usrresfavorite_url = null {
        get => $this->um_usrresfavorite_url;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_url', $value);
            $this->um_usrresfavorite_url = $value;
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
    public int|null $um_usrresfavorite_user_id = null {
        get => $this->um_usrresfavorite_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_user_id', $value);
            $this->um_usrresfavorite_user_id = $value;
        }
    }

    /**
     * Folder
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_usrresfavorite_folder = null {
        get => $this->um_usrresfavorite_folder;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_folder', $value);
            $this->um_usrresfavorite_folder = $value;
        }
    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_usrresfavorite_resource_id = 0 {
        get => $this->um_usrresfavorite_resource_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_resource_id', $value);
            $this->um_usrresfavorite_resource_id = $value;
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
    public int|null $um_usrresfavorite_inactive = 0 {
        get => $this->um_usrresfavorite_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_inactive', $value);
            $this->um_usrresfavorite_inactive = $value;
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
    public string|null $um_usrresfavorite_inserted_timestamp = null {
        get => $this->um_usrresfavorite_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_inserted_timestamp', $value);
            $this->um_usrresfavorite_inserted_timestamp = $value;
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
    public int|null $um_usrresfavorite_inserted_user_id = null {
        get => $this->um_usrresfavorite_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresfavorite_inserted_user_id', $value);
            $this->um_usrresfavorite_inserted_user_id = $value;
        }
    }
}
