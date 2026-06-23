<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\ActiveRecord;

class AlertsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Alerts::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usralert_tenant_id','um_usralert_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usralert_tenant_id = null {
        get => $this->um_usralert_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_tenant_id', $value);
            $this->um_usralert_tenant_id = $value;
        }
    }

    /**
     * Alert #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_usralert_id = null {
        get => $this->um_usralert_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_id', $value);
            $this->um_usralert_id = $value;
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
    public int|null $um_usralert_um_user_id = null {
        get => $this->um_usralert_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_um_user_id', $value);
            $this->um_usralert_um_user_id = $value;
        }
    }

    /**
     * Type Code
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\Alert\UserAlertTypes}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usralert_um_usralrttype_code = null {
        get => $this->um_usralert_um_usralrttype_code;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_um_usralrttype_code', $value);
            $this->um_usralert_um_usralrttype_code = $value;
        }
    }

    /**
     * Record #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_usralert_record_id = null {
        get => $this->um_usralert_record_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_record_id', $value);
            $this->um_usralert_record_id = $value;
        }
    }

    /**
     * Record Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usralert_record_code = null {
        get => $this->um_usralert_record_code;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_record_code', $value);
            $this->um_usralert_record_code = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $um_usralert_description = null {
        get => $this->um_usralert_description;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_description', $value);
            $this->um_usralert_description = $value;
        }
    }

    /**
     * Body
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $um_usralert_body = null {
        get => $this->um_usralert_body;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_body', $value);
            $this->um_usralert_body = $value;
        }
    }

    /**
     * Localization (JSON)
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $um_usralert_loc_json = null {
        get => $this->um_usralert_loc_json;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_loc_json', $value);
            $this->um_usralert_loc_json = $value;
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
    public string|null $um_usralert_url = null {
        get => $this->um_usralert_url;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_url', $value);
            $this->um_usralert_url = $value;
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
    public int|null $um_usralert_inactive = 0 {
        get => $this->um_usralert_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_inactive', $value);
            $this->um_usralert_inactive = $value;
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
    public string|null $um_usralert_inserted_timestamp = null {
        get => $this->um_usralert_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_inserted_timestamp', $value);
            $this->um_usralert_inserted_timestamp = $value;
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
    public int|null $um_usralert_inserted_user_id = null {
        get => $this->um_usralert_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_inserted_user_id', $value);
            $this->um_usralert_inserted_user_id = $value;
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
    public string|null $um_usralert_updated_timestamp = null {
        get => $this->um_usralert_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_updated_timestamp', $value);
            $this->um_usralert_updated_timestamp = $value;
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
    public int|null $um_usralert_updated_user_id = null {
        get => $this->um_usralert_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_usralert_updated_user_id', $value);
            $this->um_usralert_updated_user_id = $value;
        }
    }
}
