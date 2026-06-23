<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Message;

use Object\ActiveRecord;

class BodiesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Bodies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_mesbody_tenant_id','um_mesbody_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_mesbody_tenant_id = null {
        get => $this->um_mesbody_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_mesbody_tenant_id', $value);
            $this->um_mesbody_tenant_id = $value;
        }
    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id_sequence}}
     *
     * @var int|null Domain: message_id_sequence Type: bigserial
     */
    public int|null $um_mesbody_id = null {
        get => $this->um_mesbody_id;
        set {
            $this->setFullPkAndFilledColumn('um_mesbody_id', $value);
            $this->um_mesbody_id = $value;
        }
    }

    /**
     * Type #
     *
     *
     * {options_model{\Numbers\Users\Users\Model\Message\BodyTypes}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_mesbody_type_id = null {
        get => $this->um_mesbody_type_id;
        set {
            $this->setFullPkAndFilledColumn('um_mesbody_type_id', $value);
            $this->um_mesbody_type_id = $value;
        }
    }

    /**
     * Body
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_mesbody_body = null {
        get => $this->um_mesbody_body;
        set {
            $this->setFullPkAndFilledColumn('um_mesbody_body', $value);
            $this->um_mesbody_body = $value;
        }
    }

    /**
     * Body (Binary)
     *
     *
     *
     *
     *
     * @var string|null Type: bytea
     */
    public string|null $um_mesbody_bytea = null {
        get => $this->um_mesbody_bytea;
        set {
            $this->setFullPkAndFilledColumn('um_mesbody_bytea', $value);
            $this->um_mesbody_bytea = $value;
        }
    }
}
