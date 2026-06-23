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

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_clsorg_tenant_id','um_clsorg_um_classification_id','um_clsorg_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_clsorg_tenant_id = null {
        get => $this->um_clsorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsorg_tenant_id', $value);
            $this->um_clsorg_tenant_id = $value;
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
    public string|null $um_clsorg_timestamp = 'now()' {
        get => $this->um_clsorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_clsorg_timestamp', $value);
            $this->um_clsorg_timestamp = $value;
        }
    }

    /**
     * Classification #
     *
     *
     *
     * {domain{classification_id}}
     *
     * @var int|null Domain: classification_id Type: integer
     */
    public int|null $um_clsorg_um_classification_id = null {
        get => $this->um_clsorg_um_classification_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsorg_um_classification_id', $value);
            $this->um_clsorg_um_classification_id = $value;
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
    public int|null $um_clsorg_organization_id = null {
        get => $this->um_clsorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('um_clsorg_organization_id', $value);
            $this->um_clsorg_organization_id = $value;
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
    public int|null $um_clsorg_inactive = 0 {
        get => $this->um_clsorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_clsorg_inactive', $value);
            $this->um_clsorg_inactive = $value;
        }
    }
}
