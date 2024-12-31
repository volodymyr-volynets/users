<?php

namespace Numbers\Users\Documents\Base\Model\File;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Documents\Base\Model\File\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['dt_filetype_tenant_id','dt_filetype_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $dt_filetype_tenant_id = NULL {
                        get => $this->dt_filetype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_tenant_id', $value);
                            $this->dt_filetype_tenant_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{type_id_sequence}}
     *
     * @var int|null Domain: type_id_sequence Type: smallserial
     */
    public int|null $dt_filetype_id = null {
                        get => $this->dt_filetype_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_id', $value);
                            $this->dt_filetype_id = $value;
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
    public string|null $dt_filetype_code = null {
                        get => $this->dt_filetype_code;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_code', $value);
                            $this->dt_filetype_code = $value;
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
    public string|null $dt_filetype_name = null {
                        get => $this->dt_filetype_name;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_name', $value);
                            $this->dt_filetype_name = $value;
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
    public int|null $dt_filetype_organization_id = NULL {
                        get => $this->dt_filetype_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_organization_id', $value);
                            $this->dt_filetype_organization_id = $value;
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
    public int|null $dt_filetype_inactive = 0 {
                        get => $this->dt_filetype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_inactive', $value);
                            $this->dt_filetype_inactive = $value;
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
    public string|null $dt_filetype_optimistic_lock = 'now()' {
                        get => $this->dt_filetype_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('dt_filetype_optimistic_lock', $value);
                            $this->dt_filetype_optimistic_lock = $value;
                        }
                    }
}
