<?php

namespace Numbers\Users\Documents\Drivers\Amazon\Model;
class ProfilesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Documents\Drivers\Amazon\Model\Profiles::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['dt_amzprofile_tenant_id','dt_amzprofile_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $dt_amzprofile_tenant_id = NULL {
                        get => $this->dt_amzprofile_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_tenant_id', $value);
                            $this->dt_amzprofile_tenant_id = $value;
                        }
                    }

    /**
     * Profile #
     *
     *
     *
     * {domain{profile_id_sequence}}
     *
     * @var int|null Domain: profile_id_sequence Type: serial
     */
    public int|null $dt_amzprofile_id = null {
                        get => $this->dt_amzprofile_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_id', $value);
                            $this->dt_amzprofile_id = $value;
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
    public string|null $dt_amzprofile_name = null {
                        get => $this->dt_amzprofile_name;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_name', $value);
                            $this->dt_amzprofile_name = $value;
                        }
                    }

    /**
     * Bucket
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $dt_amzprofile_bucket = null {
                        get => $this->dt_amzprofile_bucket;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_bucket', $value);
                            $this->dt_amzprofile_bucket = $value;
                        }
                    }

    /**
     * Region
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $dt_amzprofile_region = null {
                        get => $this->dt_amzprofile_region;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_region', $value);
                            $this->dt_amzprofile_region = $value;
                        }
                    }

    /**
     * Access Key
     *
     *
     *
     * {domain{encrypted_password}}
     *
     * @var string|null Domain: encrypted_password Type: bytea
     */
    public string|null $dt_amzprofile_aws_access_key_id = null {
                        get => $this->dt_amzprofile_aws_access_key_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_aws_access_key_id', $value);
                            $this->dt_amzprofile_aws_access_key_id = $value;
                        }
                    }

    /**
     * Secret Access Key
     *
     *
     *
     * {domain{encrypted_password}}
     *
     * @var string|null Domain: encrypted_password Type: bytea
     */
    public string|null $dt_amzprofile_aws_secret_access_key = null {
                        get => $this->dt_amzprofile_aws_secret_access_key;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_aws_secret_access_key', $value);
                            $this->dt_amzprofile_aws_secret_access_key = $value;
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
    public int|null $dt_amzprofile_inactive = 0 {
                        get => $this->dt_amzprofile_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_inactive', $value);
                            $this->dt_amzprofile_inactive = $value;
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
    public string|null $dt_amzprofile_optimistic_lock = 'now()' {
                        get => $this->dt_amzprofile_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('dt_amzprofile_optimistic_lock', $value);
                            $this->dt_amzprofile_optimistic_lock = $value;
                        }
                    }
}
