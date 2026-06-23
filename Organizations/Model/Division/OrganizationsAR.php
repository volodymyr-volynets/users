<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Division;

use Object\ActiveRecord;

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_diviorg_tenant_id','on_diviorg_division_id','on_diviorg_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_diviorg_tenant_id = null {
        get => $this->on_diviorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_diviorg_tenant_id', $value);
            $this->on_diviorg_tenant_id = $value;
        }
    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $on_diviorg_timestamp = 'now()' {
        get => $this->on_diviorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('on_diviorg_timestamp', $value);
            $this->on_diviorg_timestamp = $value;
        }
    }

    /**
     * Brand #
     *
     *
     *
     * {domain{division_id}}
     *
     * @var int|null Domain: division_id Type: integer
     */
    public int|null $on_diviorg_division_id = null {
        get => $this->on_diviorg_division_id;
        set {
            $this->setFullPkAndFilledColumn('on_diviorg_division_id', $value);
            $this->on_diviorg_division_id = $value;
        }
    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $on_diviorg_organization_id = null {
        get => $this->on_diviorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_diviorg_organization_id', $value);
            $this->on_diviorg_organization_id = $value;
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
    public int|null $on_diviorg_inactive = 0 {
        get => $this->on_diviorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('on_diviorg_inactive', $value);
            $this->on_diviorg_inactive = $value;
        }
    }
}
