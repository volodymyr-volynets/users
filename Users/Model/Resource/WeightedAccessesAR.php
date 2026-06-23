<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\ActiveRecord;

class WeightedAccessesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = WeightedAccesses::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_weiaccess_tenant_id','um_weiaccess_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_weiaccess_tenant_id = null {
        get => $this->um_weiaccess_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_tenant_id', $value);
            $this->um_weiaccess_tenant_id = $value;
        }
    }

    /**
     * Weighted #
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_weiaccess_id = null {
        get => $this->um_weiaccess_id;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_id', $value);
            $this->um_weiaccess_id = $value;
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
    public string|null $um_weiaccess_name = null {
        get => $this->um_weiaccess_name;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_name', $value);
            $this->um_weiaccess_name = $value;
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
    public string|null $um_weiaccess_icon = null {
        get => $this->um_weiaccess_icon;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_icon', $value);
            $this->um_weiaccess_icon = $value;
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
    public string|null $um_weiaccess_description = null {
        get => $this->um_weiaccess_description;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_description', $value);
            $this->um_weiaccess_description = $value;
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
    public int|null $um_weiaccess_inactive = 0 {
        get => $this->um_weiaccess_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_weiaccess_inactive', $value);
            $this->um_weiaccess_inactive = $value;
        }
    }
}
