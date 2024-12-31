<?php

namespace Numbers\Users\Users\Model\Role\Policy;
class GroupsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Policy\Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_rolpolgrp_tenant_id','um_rolpolgrp_role_id','um_rolpolgrp_sm_polgroup_tenant_id','um_rolpolgrp_sm_polgroup_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolpolgrp_tenant_id = NULL {
                        get => $this->um_rolpolgrp_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_tenant_id', $value);
                            $this->um_rolpolgrp_tenant_id = $value;
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
    public string|null $um_rolpolgrp_timestamp = 'now()' {
                        get => $this->um_rolpolgrp_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_timestamp', $value);
                            $this->um_rolpolgrp_timestamp = $value;
                        }
                    }

    /**
     * Role #
     *
     *
     *
     * {domain{role_id}}
     *
     * @var int|null Domain: role_id Type: integer
     */
    public int|null $um_rolpolgrp_role_id = NULL {
                        get => $this->um_rolpolgrp_role_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_role_id', $value);
                            $this->um_rolpolgrp_role_id = $value;
                        }
                    }

    /**
     * Child Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_rolpolgrp_sm_polgroup_tenant_id = NULL {
                        get => $this->um_rolpolgrp_sm_polgroup_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_sm_polgroup_tenant_id', $value);
                            $this->um_rolpolgrp_sm_polgroup_tenant_id = $value;
                        }
                    }

    /**
     * Child Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_rolpolgrp_sm_polgroup_id = NULL {
                        get => $this->um_rolpolgrp_sm_polgroup_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_sm_polgroup_id', $value);
                            $this->um_rolpolgrp_sm_polgroup_id = $value;
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
    public int|null $um_rolpolgrp_inactive = 0 {
                        get => $this->um_rolpolgrp_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_rolpolgrp_inactive', $value);
                            $this->um_rolpolgrp_inactive = $value;
                        }
                    }
}
