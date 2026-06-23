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

class PresetsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Presets::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_imppreset_id'];

    /**
     * Preset #
     *
     *
     *
     * {domain{preset_id_sequence}}
     *
     * @var int|null Domain: preset_id_sequence Type: serial
     */
    public int|null $um_imppreset_id = null {
        get => $this->um_imppreset_id;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_id', $value);
            $this->um_imppreset_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_imppreset_code = null {
        get => $this->um_imppreset_code;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_code', $value);
            $this->um_imppreset_code = $value;
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
    public string|null $um_imppreset_name = null {
        get => $this->um_imppreset_name;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_name', $value);
            $this->um_imppreset_name = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_imppreset_um_imppretype_code = 'IMPORT' {
        get => $this->um_imppreset_um_imppretype_code;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_um_imppretype_code', $value);
            $this->um_imppreset_um_imppretype_code = $value;
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
    public string|null $um_imppreset_module_code = null {
        get => $this->um_imppreset_module_code;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_module_code', $value);
            $this->um_imppreset_module_code = $value;
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
    public int|null $um_imppreset_sm_model_id = null {
        get => $this->um_imppreset_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_sm_model_id', $value);
            $this->um_imppreset_sm_model_id = $value;
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
    public string|null $um_imppreset_sm_model_code = null {
        get => $this->um_imppreset_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_sm_model_code', $value);
            $this->um_imppreset_sm_model_code = $value;
        }
    }

    /**
     * Activation Method
     *
     *
     *
     * {domain{method}}
     *
     * @var string|null Domain: method Type: varchar
     */
    public string|null $um_imppreset_activation_method = null {
        get => $this->um_imppreset_activation_method;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_activation_method', $value);
            $this->um_imppreset_activation_method = $value;
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
    public int|null $um_imppreset_inactive = 0 {
        get => $this->um_imppreset_inactive;
        set {
            $this->setFullPkAndFilledColumn('um_imppreset_inactive', $value);
            $this->um_imppreset_inactive = $value;
        }
    }
}
