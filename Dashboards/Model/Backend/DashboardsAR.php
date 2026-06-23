<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Backend;

use Object\ActiveRecord;

class DashboardsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Dashboards::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['d9_backdash_tenant_id','d9_backdash_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $d9_backdash_tenant_id = null {
        get => $this->d9_backdash_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_tenant_id', $value);
            $this->d9_backdash_tenant_id = $value;
        }
    }

    /**
     * Dashboard Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $d9_backdash_code = null {
        get => $this->d9_backdash_code;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_code', $value);
            $this->d9_backdash_code = $value;
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
    public string|null $d9_backdash_name = null {
        get => $this->d9_backdash_name;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_name', $value);
            $this->d9_backdash_name = $value;
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
    public string|null $d9_backdash_module_code = null {
        get => $this->d9_backdash_module_code;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_module_code', $value);
            $this->d9_backdash_module_code = $value;
        }
    }

    /**
     * Model
     *
     *
     *
     * {domain{model}}
     *
     * @var string|null Domain: model Type: varchar
     */
    public string|null $d9_backdash_model = null {
        get => $this->d9_backdash_model;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_model', $value);
            $this->d9_backdash_model = $value;
        }
    }

    /**
     * Size X
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_backdash_x_size = 0 {
        get => $this->d9_backdash_x_size;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_x_size', $value);
            $this->d9_backdash_x_size = $value;
        }
    }

    /**
     * Size Y
     *
     *
     *
     * {domain{cell_size}}
     *
     * @var int|null Domain: cell_size Type: smallint
     */
    public int|null $d9_backdash_y_size = 0 {
        get => $this->d9_backdash_y_size;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_y_size', $value);
            $this->d9_backdash_y_size = $value;
        }
    }

    /**
     * Size Description
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $d9_backdash_size_description = null {
        get => $this->d9_backdash_size_description;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_size_description', $value);
            $this->d9_backdash_size_description = $value;
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
    public int|null $d9_backdash_inactive = 0 {
        get => $this->d9_backdash_inactive;
        set {
            $this->setFullPkAndFilledColumn('d9_backdash_inactive', $value);
            $this->d9_backdash_inactive = $value;
        }
    }
}
