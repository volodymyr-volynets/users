<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Model;

use Object\ActiveRecord;

class EmailBodiesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = EmailBodies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['wg_emailingbody_tenant_id','wg_emailingbody_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $wg_emailingbody_tenant_id = null {
        get => $this->wg_emailingbody_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('wg_emailingbody_tenant_id', $value);
            $this->wg_emailingbody_tenant_id = $value;
        }
    }

    /**
     * Body #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $wg_emailingbody_id = null {
        get => $this->wg_emailingbody_id;
        set {
            $this->setFullPkAndFilledColumn('wg_emailingbody_id', $value);
            $this->wg_emailingbody_id = $value;
        }
    }

    /**
     * Message
     *
     *
     *
     *
     *
     * @var string|null Type: bytea
     */
    public string|null $wg_emailingbody_message = null {
        get => $this->wg_emailingbody_message;
        set {
            $this->setFullPkAndFilledColumn('wg_emailingbody_message', $value);
            $this->wg_emailingbody_message = $value;
        }
    }

    /**
     * Text
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $wg_emailingbody_text = null {
        get => $this->wg_emailingbody_text;
        set {
            $this->setFullPkAndFilledColumn('wg_emailingbody_text', $value);
            $this->wg_emailingbody_text = $value;
        }
    }
}
