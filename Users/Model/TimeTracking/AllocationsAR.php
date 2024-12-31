<?php

namespace Numbers\Users\Users\Model\TimeTracking;
class AllocationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\TimeTracking\Allocations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_ttallocation_tenant_id','um_ttallocation_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_ttallocation_tenant_id = NULL {
                        get => $this->um_ttallocation_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_tenant_id', $value);
                            $this->um_ttallocation_tenant_id = $value;
                        }
                    }

    /**
     * Allocation #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $um_ttallocation_id = null {
                        get => $this->um_ttallocation_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_id', $value);
                            $this->um_ttallocation_id = $value;
                        }
                    }

    /**
     * U/M Owner Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_ttallocation_um_ownertype_id = NULL {
                        get => $this->um_ttallocation_um_ownertype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_um_ownertype_id', $value);
                            $this->um_ttallocation_um_ownertype_id = $value;
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
    public int|null $um_ttallocation_um_user_id = NULL {
                        get => $this->um_ttallocation_um_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_um_user_id', $value);
                            $this->um_ttallocation_um_user_id = $value;
                        }
                    }

    /**
     * User Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_ttallocation_um_user_name = null {
                        get => $this->um_ttallocation_um_user_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_um_user_name', $value);
                            $this->um_ttallocation_um_user_name = $value;
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
    public int|null $um_ttallocation_on_organization_id = NULL {
                        get => $this->um_ttallocation_on_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_on_organization_id', $value);
                            $this->um_ttallocation_on_organization_id = $value;
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
    public int|null $um_ttallocation_record_module_id = NULL {
                        get => $this->um_ttallocation_record_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_record_module_id', $value);
                            $this->um_ttallocation_record_module_id = $value;
                        }
                    }

    /**
     * Record #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_ttallocation_record_id = NULL {
                        get => $this->um_ttallocation_record_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_record_id', $value);
                            $this->um_ttallocation_record_id = $value;
                        }
                    }

    /**
     * Record Detail #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_ttallocation_record_detail_id = NULL {
                        get => $this->um_ttallocation_record_detail_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_record_detail_id', $value);
                            $this->um_ttallocation_record_detail_id = $value;
                        }
                    }

    /**
     * Record Resource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_ttallocation_record_resource_id = 0 {
                        get => $this->um_ttallocation_record_resource_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_record_resource_id', $value);
                            $this->um_ttallocation_record_resource_id = $value;
                        }
                    }

    /**
     * S/M Resource Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_ttallocation_sm_resource_name = null {
                        get => $this->um_ttallocation_sm_resource_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_sm_resource_name', $value);
                            $this->um_ttallocation_sm_resource_name = $value;
                        }
                    }

    /**
     * Params
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $um_ttallocation_params = null {
                        get => $this->um_ttallocation_params;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_params', $value);
                            $this->um_ttallocation_params = $value;
                        }
                    }

    /**
     * Start
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $um_ttallocation_start = null {
                        get => $this->um_ttallocation_start;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_start', $value);
                            $this->um_ttallocation_start = $value;
                        }
                    }

    /**
     * Finish
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $um_ttallocation_finish = null {
                        get => $this->um_ttallocation_finish;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_finish', $value);
                            $this->um_ttallocation_finish = $value;
                        }
                    }

    /**
     * Duration In Hours
     *
     *
     *
     * {domain{float_counter}}
     *
     * @var mixed Domain: float_counter Type: bcnumeric
     */
    public mixed $um_ttallocation_duration_in_hours = '0.00' {
                        get => $this->um_ttallocation_duration_in_hours;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_duration_in_hours', $value);
                            $this->um_ttallocation_duration_in_hours = $value;
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
    public int|null $um_ttallocation_inactive = 0 {
                        get => $this->um_ttallocation_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_ttallocation_inactive', $value);
                            $this->um_ttallocation_inactive = $value;
                        }
                    }
}
