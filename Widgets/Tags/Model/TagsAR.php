<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Tags\Model;

use Object\ActiveRecord;

class TagsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Tags::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_tag_tenant_id','um_tag_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_tag_tenant_id = null {
        get => $this->um_tag_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_tag_tenant_id', $value);
            $this->um_tag_tenant_id = $value;
        }
    }

    /**
     * Tag #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_tag_id = null {
        get => $this->um_tag_id;
        set {
            $this->setFullPkAndFilledColumn('um_tag_id', $value);
            $this->um_tag_id = $value;
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
    public string|null $um_tag_name = null {
        get => $this->um_tag_name;
        set {
            $this->setFullPkAndFilledColumn('um_tag_name', $value);
            $this->um_tag_name = $value;
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
    public int|null $um_tag_inactive = 0 {
        get => $this->um_tag_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_tag_inactive', $value);
            $this->um_tag_inactive = $value;
        }
    }
}
