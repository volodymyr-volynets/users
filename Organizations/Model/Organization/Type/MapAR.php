<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization\Type;

use Object\ActiveRecord;

class MapAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_orgtpmap_tenant_id','on_orgtpmap_organization_id','on_orgtpmap_type_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_orgtpmap_tenant_id = null {
        get => $this->on_orgtpmap_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('on_orgtpmap_tenant_id', $value);
            $this->on_orgtpmap_tenant_id = $value;
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
    public int|null $on_orgtpmap_organization_id = null {
        get => $this->on_orgtpmap_organization_id;
        set {
            $this->setFullPkAndFilledColumn('on_orgtpmap_organization_id', $value);
            $this->on_orgtpmap_organization_id = $value;
        }
    }

    /**
     * Type Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_orgtpmap_type_code = null {
        get => $this->on_orgtpmap_type_code;
        set {
            $this->setFullPkAndFilledColumn('on_orgtpmap_type_code', $value);
            $this->on_orgtpmap_type_code = $value;
        }
    }
}
