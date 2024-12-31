<?php

namespace Numbers\Users\Users\Model\Form;
class OverridesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Form\Overrides::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_formoverride_tenant_id','um_formoverride_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_formoverride_tenant_id = NULL {
                        get => $this->um_formoverride_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_tenant_id', $value);
                            $this->um_formoverride_tenant_id = $value;
                        }
                    }

    /**
     * Override #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_formoverride_id = null {
                        get => $this->um_formoverride_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_id', $value);
                            $this->um_formoverride_id = $value;
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
    public int|null $um_formoverride_module_id = NULL {
                        get => $this->um_formoverride_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_module_id', $value);
                            $this->um_formoverride_module_id = $value;
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
    public string|null $um_formoverride_module_code = null {
                        get => $this->um_formoverride_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_module_code', $value);
                            $this->um_formoverride_module_code = $value;
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
    public string|null $um_formoverride_name = null {
                        get => $this->um_formoverride_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_name', $value);
                            $this->um_formoverride_name = $value;
                        }
                    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_formoverride_role_id = NULL {
                        get => $this->um_formoverride_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_role_id', $value);
                            $this->um_formoverride_role_id = $value;
                        }
                    }

    /**
     * Role Weight
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_formoverride_role_weight = NULL {
                        get => $this->um_formoverride_role_weight;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_role_weight', $value);
                            $this->um_formoverride_role_weight = $value;
                        }
                    }

    /**
     * Form Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_formoverride_form_code = null {
                        get => $this->um_formoverride_form_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_form_code', $value);
                            $this->um_formoverride_form_code = $value;
                        }
                    }

    /**
     * Form Field Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_formoverride_form_field_code = null {
                        get => $this->um_formoverride_form_field_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_form_field_code', $value);
                            $this->um_formoverride_form_field_code = $value;
                        }
                    }

    /**
     * Action
     *
     *
     * {options_model{\Numbers\Users\Users\Model\Form\ActionTypes}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_formoverride_action = NULL {
                        get => $this->um_formoverride_action;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_action', $value);
                            $this->um_formoverride_action = $value;
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
    public int|null $um_formoverride_inactive = 0 {
                        get => $this->um_formoverride_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_inactive', $value);
                            $this->um_formoverride_inactive = $value;
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
    public string|null $um_formoverride_optimistic_lock = 'now()' {
                        get => $this->um_formoverride_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_formoverride_optimistic_lock', $value);
                            $this->um_formoverride_optimistic_lock = $value;
                        }
                    }
}
