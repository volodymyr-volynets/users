<?php

namespace Numbers\Users\Users\Model\Setting\Policy;
class GroupsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Setting\Policy\Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_setpolgrp_tenant_id','um_setpolgrp_module_id','um_setpolgrp_sm_polgroup_tenant_id','um_setpolgrp_sm_polgroup_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_setpolgrp_tenant_id = NULL {
                        get => $this->um_setpolgrp_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_tenant_id', $value);
                            $this->um_setpolgrp_tenant_id = $value;
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
    public string|null $um_setpolgrp_timestamp = 'now()' {
                        get => $this->um_setpolgrp_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_timestamp', $value);
                            $this->um_setpolgrp_timestamp = $value;
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
    public int|null $um_setpolgrp_module_id = NULL {
                        get => $this->um_setpolgrp_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_module_id', $value);
                            $this->um_setpolgrp_module_id = $value;
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
    public int|null $um_setpolgrp_sm_polgroup_tenant_id = NULL {
                        get => $this->um_setpolgrp_sm_polgroup_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_sm_polgroup_tenant_id', $value);
                            $this->um_setpolgrp_sm_polgroup_tenant_id = $value;
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
    public int|null $um_setpolgrp_sm_polgroup_id = NULL {
                        get => $this->um_setpolgrp_sm_polgroup_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_sm_polgroup_id', $value);
                            $this->um_setpolgrp_sm_polgroup_id = $value;
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
    public int|null $um_setpolgrp_inactive = 0 {
                        get => $this->um_setpolgrp_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_setpolgrp_inactive', $value);
                            $this->um_setpolgrp_inactive = $value;
                        }
                    }
}
