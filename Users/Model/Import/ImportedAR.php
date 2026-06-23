<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Import;

use Object\ActiveRecord;

class ImportedAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Imported::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_impimported_tenant_id','um_impimported_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_impimported_tenant_id = null {
        get => $this->um_impimported_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_tenant_id', $value);
            $this->um_impimported_tenant_id = $value;
        }
    }

    /**
     * Action #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_impimported_id = null {
        get => $this->um_impimported_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_id', $value);
            $this->um_impimported_id = $value;
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
    public string|null $um_impimported_name = null {
        get => $this->um_impimported_name;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_name', $value);
            $this->um_impimported_name = $value;
        }
    }

    /**
     * Import Preset #
     *
     *
     *
     * {domain{preset_id}}
     *
     * @var int|null Domain: preset_id Type: integer
     */
    public int|null $um_impimported_um_imppreset_id = null {
        get => $this->um_impimported_um_imppreset_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_um_imppreset_id', $value);
            $this->um_impimported_um_imppreset_id = $value;
        }
    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $um_impimported_module_id = null {
        get => $this->um_impimported_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_module_id', $value);
            $this->um_impimported_module_id = $value;
        }
    }

    /**
     * Model #
     *
     *
     *
     * {domain{model_id}}
     *
     * @var int|null Domain: model_id Type: integer
     */
    public int|null $um_impimported_sm_model_id = null {
        get => $this->um_impimported_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_sm_model_id', $value);
            $this->um_impimported_sm_model_id = $value;
        }
    }

    /**
     * Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_impimported_sm_model_code = null {
        get => $this->um_impimported_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_sm_model_code', $value);
            $this->um_impimported_sm_model_code = $value;
        }
    }

    /**
     * Import Details
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_impimported_import_details = null {
        get => $this->um_impimported_import_details;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_import_details', $value);
            $this->um_impimported_import_details = $value;
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
    public int|null $um_impimported_inactive = 0 {
        get => $this->um_impimported_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_inactive', $value);
            $this->um_impimported_inactive = $value;
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
    public string|null $um_impimported_inserted_timestamp = null {
        get => $this->um_impimported_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_inserted_timestamp', $value);
            $this->um_impimported_inserted_timestamp = $value;
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
    public int|null $um_impimported_inserted_user_id = null {
        get => $this->um_impimported_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('um_impimported_inserted_user_id', $value);
            $this->um_impimported_inserted_user_id = $value;
        }
    }
}
