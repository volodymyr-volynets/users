<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Resource;

use Object\ActiveRecord;

class VisitedAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Visited::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrresvisit_tenant_id','um_usrresvisit_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrresvisit_tenant_id = null {
        get => $this->um_usrresvisit_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_tenant_id', $value);
            $this->um_usrresvisit_tenant_id = $value;
        }
    }

    /**
     * Visit #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_usrresvisit_id = null {
        get => $this->um_usrresvisit_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_id', $value);
            $this->um_usrresvisit_id = $value;
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
    public string|null $um_usrresvisit_name = null {
        get => $this->um_usrresvisit_name;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_name', $value);
            $this->um_usrresvisit_name = $value;
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
    public string|null $um_usrresvisit_description = null {
        get => $this->um_usrresvisit_description;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_description', $value);
            $this->um_usrresvisit_description = $value;
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
    public string|null $um_usrresvisit_icon = null {
        get => $this->um_usrresvisit_icon;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_icon', $value);
            $this->um_usrresvisit_icon = $value;
        }
    }

    /**
     * URL
     *
     *
     *
     * {domain{url}}
     *
     * @var string|null Domain: url Type: text
     */
    public string|null $um_usrresvisit_url = null {
        get => $this->um_usrresvisit_url;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_url', $value);
            $this->um_usrresvisit_url = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrresvisit_user_id = null {
        get => $this->um_usrresvisit_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_user_id', $value);
            $this->um_usrresvisit_user_id = $value;
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
    public string|null $um_usrresvisit_module_code = null {
        get => $this->um_usrresvisit_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_module_code', $value);
            $this->um_usrresvisit_module_code = $value;
        }
    }

    /**
     * Counter
     *
     *
     *
     * {domain{bigcounter}}
     *
     * @var int|null Domain: bigcounter Type: bigint
     */
    public int|null $um_usrresvisit_counter = 0 {
        get => $this->um_usrresvisit_counter;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_counter', $value);
            $this->um_usrresvisit_counter = $value;
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
    public int|null $um_usrresvisit_inactive = 0 {
        get => $this->um_usrresvisit_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_inactive', $value);
            $this->um_usrresvisit_inactive = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrresvisit_inserted_timestamp = null {
        get => $this->um_usrresvisit_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_inserted_timestamp', $value);
            $this->um_usrresvisit_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrresvisit_inserted_user_id = null {
        get => $this->um_usrresvisit_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_inserted_user_id', $value);
            $this->um_usrresvisit_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrresvisit_updated_timestamp = null {
        get => $this->um_usrresvisit_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_updated_timestamp', $value);
            $this->um_usrresvisit_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrresvisit_updated_user_id = null {
        get => $this->um_usrresvisit_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usrresvisit_updated_user_id', $value);
            $this->um_usrresvisit_updated_user_id = $value;
        }
    }
}
