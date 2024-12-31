<?php

namespace Numbers\Users\Users\Model\User;
class InternalizationAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Internalization::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usri18n_tenant_id','um_usri18n_user_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usri18n_tenant_id = NULL {
                        get => $this->um_usri18n_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_tenant_id', $value);
                            $this->um_usri18n_tenant_id = $value;
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
    public int|null $um_usri18n_user_id = NULL {
                        get => $this->um_usri18n_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_user_id', $value);
                            $this->um_usri18n_user_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_usri18n_group_id = NULL {
                        get => $this->um_usri18n_group_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_group_id', $value);
                            $this->um_usri18n_group_id = $value;
                        }
                    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $um_usri18n_language_code = null {
                        get => $this->um_usri18n_language_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_language_code', $value);
                            $this->um_usri18n_language_code = $value;
                        }
                    }

    /**
     * Locale Code
     *
     *
     *
     * {domain{locale_code}}
     *
     * @var string|null Domain: locale_code Type: varchar
     */
    public string|null $um_usri18n_locale_code = null {
                        get => $this->um_usri18n_locale_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_locale_code', $value);
                            $this->um_usri18n_locale_code = $value;
                        }
                    }

    /**
     * Timezone Code
     *
     *
     *
     * {domain{timezone_code}}
     *
     * @var string|null Domain: timezone_code Type: varchar
     */
    public string|null $um_usri18n_timezone_code = null {
                        get => $this->um_usri18n_timezone_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_timezone_code', $value);
                            $this->um_usri18n_timezone_code = $value;
                        }
                    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $um_usri18n_organization_id = NULL {
                        get => $this->um_usri18n_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_organization_id', $value);
                            $this->um_usri18n_organization_id = $value;
                        }
                    }

    /**
     * Date Format
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_format_date = null {
                        get => $this->um_usri18n_format_date;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_date', $value);
                            $this->um_usri18n_format_date = $value;
                        }
                    }

    /**
     * Time Format
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_format_time = null {
                        get => $this->um_usri18n_format_time;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_time', $value);
                            $this->um_usri18n_format_time = $value;
                        }
                    }

    /**
     * Datetime Format
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_format_datetime = null {
                        get => $this->um_usri18n_format_datetime;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_datetime', $value);
                            $this->um_usri18n_format_datetime = $value;
                        }
                    }

    /**
     * Timestamp Format
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_format_timestamp = null {
                        get => $this->um_usri18n_format_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_timestamp', $value);
                            $this->um_usri18n_format_timestamp = $value;
                        }
                    }

    /**
     * Amounts In Forms
     *
     *
     * {options_model{\Object\Format\Amounts}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_usri18n_format_amount_frm = NULL {
                        get => $this->um_usri18n_format_amount_frm;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_amount_frm', $value);
                            $this->um_usri18n_format_amount_frm = $value;
                        }
                    }

    /**
     * Amounts In Financial Statement
     *
     *
     * {options_model{\Object\Format\Amounts}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_usri18n_format_amount_fs = NULL {
                        get => $this->um_usri18n_format_amount_fs;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_amount_fs', $value);
                            $this->um_usri18n_format_amount_fs = $value;
                        }
                    }

    /**
     * Unit of Measures
     *
     *
     * {options_model{\Object\Format\UoM}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_usri18n_format_uom = 'METRIC' {
                        get => $this->um_usri18n_format_uom;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_format_uom', $value);
                            $this->um_usri18n_format_uom = $value;
                        }
                    }

    /**
     * Print Format
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_print_format = null {
                        get => $this->um_usri18n_print_format;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_print_format', $value);
                            $this->um_usri18n_print_format = $value;
                        }
                    }

    /**
     * Print Font
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_usri18n_print_font = null {
                        get => $this->um_usri18n_print_font;
                        set {
                            $this->setFullPkAndFilledColumn('um_usri18n_print_font', $value);
                            $this->um_usri18n_print_font = $value;
                        }
                    }
}
