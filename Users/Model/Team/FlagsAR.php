<?php

namespace Numbers\Users\Users\Model\Team;
class FlagsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\Flags::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_temsysflag_tenant_id','um_temsysflag_team_id','um_temsysflag_module_id','um_temsysflag_sysflag_id','um_temsysflag_action_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_temsysflag_tenant_id = NULL {
                        get => $this->um_temsysflag_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_tenant_id', $value);
                            $this->um_temsysflag_tenant_id = $value;
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
    public string|null $um_temsysflag_timestamp = 'now()' {
                        get => $this->um_temsysflag_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_timestamp', $value);
                            $this->um_temsysflag_timestamp = $value;
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
    public int|null $um_temsysflag_team_id = NULL {
                        get => $this->um_temsysflag_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_team_id', $value);
                            $this->um_temsysflag_team_id = $value;
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
    public int|null $um_temsysflag_module_id = NULL {
                        get => $this->um_temsysflag_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_module_id', $value);
                            $this->um_temsysflag_module_id = $value;
                        }
                    }

    /**
     * Subresource #
     *
     *
     *
     * {domain{resource_id}}
     *
     * @var int|null Domain: resource_id Type: integer
     */
    public int|null $um_temsysflag_sysflag_id = 0 {
                        get => $this->um_temsysflag_sysflag_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_sysflag_id', $value);
                            $this->um_temsysflag_sysflag_id = $value;
                        }
                    }

    /**
     * Action #
     *
     *
     *
     * {domain{action_id}}
     *
     * @var int|null Domain: action_id Type: smallint
     */
    public int|null $um_temsysflag_action_id = 0 {
                        get => $this->um_temsysflag_action_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_action_id', $value);
                            $this->um_temsysflag_action_id = $value;
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
    public int|null $um_temsysflag_inactive = 0 {
                        get => $this->um_temsysflag_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_temsysflag_inactive', $value);
                            $this->um_temsysflag_inactive = $value;
                        }
                    }
}
