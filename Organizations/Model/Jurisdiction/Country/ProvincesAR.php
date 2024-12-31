<?php

namespace Numbers\Users\Organizations\Model\Jurisdiction\Country;
class ProvincesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Jurisdiction\Country\Provinces::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_jurisprov_tenant_id','on_jurisprov_jurisdiction_id','on_jurisprov_country_code','on_jurisprov_province_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_jurisprov_tenant_id = NULL {
                        get => $this->on_jurisprov_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_tenant_id', $value);
                            $this->on_jurisprov_tenant_id = $value;
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
    public string|null $on_jurisprov_timestamp = 'now()' {
                        get => $this->on_jurisprov_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_timestamp', $value);
                            $this->on_jurisprov_timestamp = $value;
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
    public int|null $on_jurisprov_jurisdiction_id = NULL {
                        get => $this->on_jurisprov_jurisdiction_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_jurisdiction_id', $value);
                            $this->on_jurisprov_jurisdiction_id = $value;
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
    public string|null $on_jurisprov_country_code = null {
                        get => $this->on_jurisprov_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_country_code', $value);
                            $this->on_jurisprov_country_code = $value;
                        }
                    }

    /**
     * Province Code
     *
     *
     *
     * {domain{province_code}}
     *
     * @var string|null Domain: province_code Type: varchar
     */
    public string|null $on_jurisprov_province_code = null {
                        get => $this->on_jurisprov_province_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_province_code', $value);
                            $this->on_jurisprov_province_code = $value;
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
    public int|null $on_jurisprov_inactive = 0 {
                        get => $this->on_jurisprov_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_jurisprov_inactive', $value);
                            $this->on_jurisprov_inactive = $value;
                        }
                    }
}
