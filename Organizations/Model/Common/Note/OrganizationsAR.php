<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Common\Note;

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
    public array $object_table_pk = ['on_comnotorg_tenant_id','on_comnotorg_comnote_id','on_comnotorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_comnotorg_tenant_id = null {
        get => $this->on_comnotorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_comnotorg_tenant_id', $value);
            $this->on_comnotorg_tenant_id = $value;
        }
    }

    /**
     * Note #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $on_comnotorg_comnote_id = null {
        get => $this->on_comnotorg_comnote_id;
        set {
            $this->setFullPkAndFilledColumn('on_comnotorg_comnote_id', $value);
            $this->on_comnotorg_comnote_id = $value;
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
    public int|null $on_comnotorg_organization_id = null {
        get => $this->on_comnotorg_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_comnotorg_organization_id', $value);
            $this->on_comnotorg_organization_id = $value;
        }
    }
}
