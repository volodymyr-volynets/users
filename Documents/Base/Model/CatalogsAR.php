<?php

namespace Numbers\Users\Documents\Base\Model;
class CatalogsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Documents\Base\Model\Catalogs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['dt_catalog_tenant_id','dt_catalog_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $dt_catalog_tenant_id = NULL {
                        get => $this->dt_catalog_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_tenant_id', $value);
                            $this->dt_catalog_tenant_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $dt_catalog_code = null {
                        get => $this->dt_catalog_code;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_code', $value);
                            $this->dt_catalog_code = $value;
                        }
                    }

    /**
     * Amazon Profile #
     *
     *
     *
     * {domain{profile_id}}
     *
     * @var int|null Domain: profile_id Type: integer
     */
    public int|null $dt_catalog_dt_amzprofile_id = NULL {
                        get => $this->dt_catalog_dt_amzprofile_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_dt_amzprofile_id', $value);
                            $this->dt_catalog_dt_amzprofile_id = $value;
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
    public string|null $dt_catalog_name = null {
                        get => $this->dt_catalog_name;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_name', $value);
                            $this->dt_catalog_name = $value;
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
    public int|null $dt_catalog_organization_id = NULL {
                        get => $this->dt_catalog_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_organization_id', $value);
                            $this->dt_catalog_organization_id = $value;
                        }
                    }

    /**
     * Readonly
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_catalog_readonly = 0 {
                        get => $this->dt_catalog_readonly;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_readonly', $value);
                            $this->dt_catalog_readonly = $value;
                        }
                    }

    /**
     * Approval
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_catalog_approval = 0 {
                        get => $this->dt_catalog_approval;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_approval', $value);
                            $this->dt_catalog_approval = $value;
                        }
                    }

    /**
     * Temporary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_catalog_temporary = 0 {
                        get => $this->dt_catalog_temporary;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_temporary', $value);
                            $this->dt_catalog_temporary = $value;
                        }
                    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_catalog_primary = 0 {
                        get => $this->dt_catalog_primary;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_primary', $value);
                            $this->dt_catalog_primary = $value;
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
    public int|null $dt_catalog_inactive = 0 {
                        get => $this->dt_catalog_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_inactive', $value);
                            $this->dt_catalog_inactive = $value;
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
    public string|null $dt_catalog_optimistic_lock = 'now()' {
                        get => $this->dt_catalog_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('dt_catalog_optimistic_lock', $value);
                            $this->dt_catalog_optimistic_lock = $value;
                        }
                    }
}
