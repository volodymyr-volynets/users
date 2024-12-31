<?php

namespace Numbers\Users\Users\Model;
class SettingsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Settings::class;

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
    public int|null $um_setting_tenant_id = NULL {
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
    public int|null $um_setting_module_id = NULL {
                        get => $this->um_setting_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setting_module_id', $value);
                            $this->um_setting_module_id = $value;
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
