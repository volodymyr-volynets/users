<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification;

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
    public array $object_table_pk = ['um_classtype_tenant_id','um_classtype_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_classtype_tenant_id = null {
        get => $this->um_classtype_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_classtype_tenant_id', $value);
            $this->um_classtype_tenant_id = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_classtype_code = null {
        get => $this->um_classtype_code;
        set {
            $this->setFullPkAndFilledColumn('um_classtype_code', $value);
            $this->um_classtype_code = $value;
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
    public string|null $um_classtype_name = null {
        get => $this->um_classtype_name;
        set {
            $this->setFullPkAndFilledColumn('um_classtype_name', $value);
            $this->um_classtype_name = $value;
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
    public string|null $um_classtype_icon = null {
        get => $this->um_classtype_icon;
        set {
            $this->setFullPkAndFilledColumn('um_classtype_icon', $value);
            $this->um_classtype_icon = $value;
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
    public int|null $um_classtype_inactive = 0 {
        get => $this->um_classtype_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_classtype_inactive', $value);
            $this->um_classtype_inactive = $value;
        }
    }
}
