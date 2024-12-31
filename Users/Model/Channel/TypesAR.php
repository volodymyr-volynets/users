<?php

namespace Numbers\Users\Users\Model\Channel;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Channel\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_chantype_code'];
    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_chantype_code = null {
                        get => $this->um_chantype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_code', $value);
                            $this->um_chantype_code = $value;
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
    public string|null $um_chantype_name = null {
                        get => $this->um_chantype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_name', $value);
                            $this->um_chantype_name = $value;
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
    public string|null $um_chantype_module_code = null {
                        get => $this->um_chantype_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_module_code', $value);
                            $this->um_chantype_module_code = $value;
                        }
                    }

    /**
     * Model
     *
     *
     *
     * {domain{model}}
     *
     * @var string|null Domain: model Type: varchar
     */
    public string|null $um_chantype_model = null {
                        get => $this->um_chantype_model;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_model', $value);
                            $this->um_chantype_model = $value;
                        }
                    }

    /**
     * Validator Method
     *
     *
     *
     * {domain{method}}
     *
     * @var string|null Domain: method Type: varchar
     */
    public string|null $um_chantype_validator_method = null {
                        get => $this->um_chantype_validator_method;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_validator_method', $value);
                            $this->um_chantype_validator_method = $value;
                        }
                    }

    /**
     * Field Code
     *
     *
     *
     * {domain{field_code}}
     *
     * @var string|null Domain: field_code Type: varchar
     */
    public string|null $um_chantype_field_code = null {
                        get => $this->um_chantype_field_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_field_code', $value);
                            $this->um_chantype_field_code = $value;
                        }
                    }

    /**
     * Field Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_chantype_field_name = null {
                        get => $this->um_chantype_field_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_field_name', $value);
                            $this->um_chantype_field_name = $value;
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
    public int|null $um_chantype_inactive = 0 {
                        get => $this->um_chantype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_chantype_inactive', $value);
                            $this->um_chantype_inactive = $value;
                        }
                    }
}
