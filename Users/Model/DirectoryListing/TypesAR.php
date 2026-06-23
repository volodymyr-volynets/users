<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\DirectoryListing;

use Object\ActiveRecord;

class TypesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_dirlisttype_id'];

    /**
     * Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_dirlisttype_id = null {
        get => $this->um_dirlisttype_id;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_id', $value);
            $this->um_dirlisttype_id = $value;
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
    public string|null $um_dirlisttype_name = null {
        get => $this->um_dirlisttype_name;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_name', $value);
            $this->um_dirlisttype_name = $value;
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
    public string|null $um_dirlisttype_icon = null {
        get => $this->um_dirlisttype_icon;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_icon', $value);
            $this->um_dirlisttype_icon = $value;
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
    public int|null $um_dirlisttype_order = 0 {
        get => $this->um_dirlisttype_order;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_order', $value);
            $this->um_dirlisttype_order = $value;
        }
    }

    /**
     * Parent Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_dirlisttype_parent_um_dirlisttype_id = null {
        get => $this->um_dirlisttype_parent_um_dirlisttype_id;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_parent_um_dirlisttype_id', $value);
            $this->um_dirlisttype_parent_um_dirlisttype_id = $value;
        }
    }

    /**
     * Root
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_dirlisttype_root = 0 {
        get => $this->um_dirlisttype_root;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_root', $value);
            $this->um_dirlisttype_root = $value;
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
    public int|null $um_dirlisttype_inactive = 0 {
        get => $this->um_dirlisttype_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_dirlisttype_inactive', $value);
            $this->um_dirlisttype_inactive = $value;
        }
    }
}
