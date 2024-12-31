<?php

namespace Numbers\Users\Organizations\Model\Jurisdiction;
class CountriesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Jurisdiction\Countries::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_juriscntr_tenant_id','on_juriscntr_jurisdiction_id','on_juriscntr_country_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_juriscntr_tenant_id = NULL {
                        get => $this->on_juriscntr_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_tenant_id', $value);
                            $this->on_juriscntr_tenant_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $on_juriscntr_timestamp = 'now()' {
                        get => $this->on_juriscntr_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_timestamp', $value);
                            $this->on_juriscntr_timestamp = $value;
                        }
                    }

    /**
     * Jurisdictions #
     *
     *
     *
     * {domain{jurisdiction_id}}
     *
     * @var int|null Domain: jurisdiction_id Type: integer
     */
    public int|null $on_juriscntr_jurisdiction_id = NULL {
                        get => $this->on_juriscntr_jurisdiction_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_jurisdiction_id', $value);
                            $this->on_juriscntr_jurisdiction_id = $value;
                        }
                    }

    /**
     * Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $on_juriscntr_country_code = null {
                        get => $this->on_juriscntr_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_country_code', $value);
                            $this->on_juriscntr_country_code = $value;
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
    public int|null $on_juriscntr_all_provinces = 0 {
                        get => $this->on_juriscntr_all_provinces;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_all_provinces', $value);
                            $this->on_juriscntr_all_provinces = $value;
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
    public int|null $on_juriscntr_inactive = 0 {
                        get => $this->on_juriscntr_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_juriscntr_inactive', $value);
                            $this->on_juriscntr_inactive = $value;
                        }
                    }
}
