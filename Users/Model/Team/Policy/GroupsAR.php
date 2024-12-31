<?php

namespace Numbers\Users\Users\Model\Team\Policy;
class GroupsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\Policy\Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_tempolgrp_tenant_id','um_tempolgrp_team_id','um_tempolgrp_sm_polgroup_tenant_id','um_tempolgrp_sm_polgroup_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_tempolgrp_tenant_id = NULL {
                        get => $this->um_tempolgrp_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_tenant_id', $value);
                            $this->um_tempolgrp_tenant_id = $value;
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
    public string|null $um_tempolgrp_timestamp = 'now()' {
                        get => $this->um_tempolgrp_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_timestamp', $value);
                            $this->um_tempolgrp_timestamp = $value;
                        }
                    }

    /**
     * Team #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_tempolgrp_team_id = NULL {
                        get => $this->um_tempolgrp_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_team_id', $value);
                            $this->um_tempolgrp_team_id = $value;
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
    public int|null $um_tempolgrp_sm_polgroup_tenant_id = NULL {
                        get => $this->um_tempolgrp_sm_polgroup_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_sm_polgroup_tenant_id', $value);
                            $this->um_tempolgrp_sm_polgroup_tenant_id = $value;
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
    public int|null $um_tempolgrp_sm_polgroup_id = NULL {
                        get => $this->um_tempolgrp_sm_polgroup_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_sm_polgroup_id', $value);
                            $this->um_tempolgrp_sm_polgroup_id = $value;
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
    public int|null $um_tempolgrp_inactive = 0 {
                        get => $this->um_tempolgrp_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_tempolgrp_inactive', $value);
                            $this->um_tempolgrp_inactive = $value;
                        }
                    }
}
