<?php

namespace Numbers\Users\Organizations\Model;
class CostCentersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\CostCenters::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_costcenter_tenant_id','on_costcenter_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_costcenter_tenant_id = NULL {
                        get => $this->on_costcenter_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_tenant_id', $value);
                            $this->on_costcenter_tenant_id = $value;
                        }
                    }

    /**
     * Cost Center #
     *
     *
     *
     * {domain{cost_center_id_sequence}}
     *
     * @var int|null Domain: cost_center_id_sequence Type: serial
     */
    public int|null $on_costcenter_id = null {
                        get => $this->on_costcenter_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_id', $value);
                            $this->on_costcenter_id = $value;
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
    public string|null $on_costcenter_code = null {
                        get => $this->on_costcenter_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_code', $value);
                            $this->on_costcenter_code = $value;
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
    public string|null $on_costcenter_name = null {
                        get => $this->on_costcenter_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_name', $value);
                            $this->on_costcenter_name = $value;
                        }
                    }

    /**
     * Department #
     *
     *
     *
     * {domain{department_id}}
     *
     * @var int|null Domain: department_id Type: integer
     */
    public int|null $on_costcenter_department_id = NULL {
                        get => $this->on_costcenter_department_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_department_id', $value);
                            $this->on_costcenter_department_id = $value;
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
    public int|null $on_costcenter_inactive = 0 {
                        get => $this->on_costcenter_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_inactive', $value);
                            $this->on_costcenter_inactive = $value;
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
    public string|null $on_costcenter_optimistic_lock = 'now()' {
                        get => $this->on_costcenter_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_optimistic_lock', $value);
                            $this->on_costcenter_optimistic_lock = $value;
                        }
                    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $on_costcenter_inserted_timestamp = null {
                        get => $this->on_costcenter_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_inserted_timestamp', $value);
                            $this->on_costcenter_inserted_timestamp = $value;
                        }
                    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $on_costcenter_inserted_user_id = NULL {
                        get => $this->on_costcenter_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_costcenter_inserted_user_id', $value);
                            $this->on_costcenter_inserted_user_id = $value;
                        }
                    }
}
