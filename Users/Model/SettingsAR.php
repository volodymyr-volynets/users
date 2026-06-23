<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\ActiveRecord;

class SettingsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Settings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_setting_tenant_id','um_setting_module_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_setting_tenant_id = null {
        get => $this->um_setting_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('um_setting_tenant_id', $value);
            $this->um_setting_tenant_id = $value;
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
    public int|null $um_setting_module_id = null {
        get => $this->um_setting_module_id;
        set {
            $this->setFullPkAndFilledColumn('um_setting_module_id', $value);
            $this->um_setting_module_id = $value;
        }
    }

    /**
     * MFA Setting Type
     *
     *
     * {options_model{\Numbers\Users\Users\Model\MFA\SettingTypes}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_setting_um_mfasettyp_code = 'NONE' {
        get => $this->um_setting_um_mfasettyp_code;
        set {
            $this->setFullPkAndFilledColumn('um_setting_um_mfasettyp_code', $value);
            $this->um_setting_um_mfasettyp_code = $value;
        }
    }

    /**
     * MFA Default Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_setting_um_mfatype_code = null {
        get => $this->um_setting_um_mfatype_code;
        set {
            $this->setFullPkAndFilledColumn('um_setting_um_mfatype_code', $value);
            $this->um_setting_um_mfatype_code = $value;
        }
    }

    /**
     * Issuer (TOTP)
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_setting_totp_issuer = null {
        get => $this->um_setting_totp_issuer;
        set {
            $this->setFullPkAndFilledColumn('um_setting_totp_issuer', $value);
            $this->um_setting_totp_issuer = $value;
        }
    }

    /**
     * Default File Catalog Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_setting_default_dt_catalog_code = null {
        get => $this->um_setting_default_dt_catalog_code;
        set {
            $this->setFullPkAndFilledColumn('um_setting_default_dt_catalog_code', $value);
            $this->um_setting_default_dt_catalog_code = $value;
        }
    }

    /**
     * Sequence
     *
     *
     *
     *
     *
     * @var int|null Type: bigserial
     */
    public int|null $um_setting_sequence = null {
        get => $this->um_setting_sequence;
        set {
            $this->setFullPkAndFilledColumn('um_setting_sequence', $value);
            $this->um_setting_sequence = $value;
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
    public int|null $um_setting_inactive = 0 {
        get => $this->um_setting_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_setting_inactive', $value);
            $this->um_setting_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $um_setting_optimistic_lock = 'now()' {
        get => $this->um_setting_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('um_setting_optimistic_lock', $value);
            $this->um_setting_optimistic_lock = $value;
        }
    }
}
