<?php

namespace Numbers\Users\Monitoring\Model;
class UsagesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Monitoring\Model\Usages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['sm_monusage_tenant_id','sm_monusage_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $sm_monusage_tenant_id = NULL {
                        get => $this->sm_monusage_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_tenant_id', $value);
                            $this->sm_monusage_tenant_id = $value;
                        }
                    }

    /**
     * Usage #
     *
     *
     *
     *
     *
     * @var int|null Type: bigserial
     */
    public int|null $sm_monusage_id = null {
                        get => $this->sm_monusage_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_id', $value);
                            $this->sm_monusage_id = $value;
                        }
                    }

    /**
     * Session #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $sm_monusage_session_id = NULL {
                        get => $this->sm_monusage_session_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_session_id', $value);
                            $this->sm_monusage_session_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $sm_monusage_timestamp = null {
                        get => $this->sm_monusage_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_timestamp', $value);
                            $this->sm_monusage_timestamp = $value;
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
    public int|null $sm_monusage_user_id = NULL {
                        get => $this->sm_monusage_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_user_id', $value);
                            $this->sm_monusage_user_id = $value;
                        }
                    }

    /**
     * User IP
     *
     *
     *
     * {domain{ip}}
     *
     * @var string|null Domain: ip Type: varchar
     */
    public string|null $sm_monusage_user_ip = null {
                        get => $this->sm_monusage_user_ip;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_user_ip', $value);
                            $this->sm_monusage_user_ip = $value;
                        }
                    }

    /**
     * Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $sm_monusage_resource_id = 0 {
                        get => $this->sm_monusage_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_resource_id', $value);
                            $this->sm_monusage_resource_id = $value;
                        }
                    }

    /**
     * Resource Name
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $sm_monusage_resource_name = null {
                        get => $this->sm_monusage_resource_name;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_resource_name', $value);
                            $this->sm_monusage_resource_name = $value;
                        }
                    }

    /**
     * Method
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $sm_monusage_method = null {
                        get => $this->sm_monusage_method;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_method', $value);
                            $this->sm_monusage_method = $value;
                        }
                    }

    /**
     * Duration (Seconds)
     *
     *
     *
     * {domain{quantity}}
     *
     * @var mixed Domain: quantity Type: bcnumeric
     */
    public mixed $sm_monusage_duration = '0.0000' {
                        get => $this->sm_monusage_duration;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_duration', $value);
                            $this->sm_monusage_duration = $value;
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
    public string|null $sm_monusage_country_code = null {
                        get => $this->sm_monusage_country_code;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusage_country_code', $value);
                            $this->sm_monusage_country_code = $value;
                        }
                    }
}
