<?php

namespace Numbers\Users\Organizations\Model\LegalAuthority;
class JurisdictionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\LegalAuthority\Jurisdictions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_authjuris_tenant_id','on_authjuris_authority_id','on_authjuris_jurisdiction_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_authjuris_tenant_id = NULL {
                        get => $this->on_authjuris_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_authjuris_tenant_id', $value);
                            $this->on_authjuris_tenant_id = $value;
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
    public string|null $on_authjuris_timestamp = 'now()' {
                        get => $this->on_authjuris_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_authjuris_timestamp', $value);
                            $this->on_authjuris_timestamp = $value;
                        }
                    }

    /**
     * Authority #
     *
     *
     *
     * {domain{authority_id}}
     *
     * @var int|null Domain: authority_id Type: integer
     */
    public int|null $on_authjuris_authority_id = NULL {
                        get => $this->on_authjuris_authority_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_authjuris_authority_id', $value);
                            $this->on_authjuris_authority_id = $value;
                        }
                    }

    /**
     * Jurisdiction #
     *
     *
     *
     * {domain{jurisdiction_id}}
     *
     * @var int|null Domain: jurisdiction_id Type: integer
     */
    public int|null $on_authjuris_jurisdiction_id = NULL {
                        get => $this->on_authjuris_jurisdiction_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_authjuris_jurisdiction_id', $value);
                            $this->on_authjuris_jurisdiction_id = $value;
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
    public int|null $on_authjuris_inactive = 0 {
                        get => $this->on_authjuris_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_authjuris_inactive', $value);
                            $this->on_authjuris_inactive = $value;
                        }
                    }
}
