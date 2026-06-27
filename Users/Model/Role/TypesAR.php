<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Role;

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
    public array $object_table_pk = ['um_roltype_id'];
    /**
     * Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_roltype_id = null {
        get => $this->um_roltype_id;
        set {
            $this->setFullPkAndFilledColumn('um_roltype_id', $value);
            $this->um_roltype_id = $value;
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
    public string|null $um_roltype_name = null {
        get => $this->um_roltype_name;
        set {
            $this->setFullPkAndFilledColumn('um_roltype_name', $value);
            $this->um_roltype_name = $value;
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
    public int|null $um_roltype_inactive = 0 {
        get => $this->um_roltype_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_roltype_inactive', $value);
            $this->um_roltype_inactive = $value;
        }
    }
}
