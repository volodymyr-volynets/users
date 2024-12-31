<?php

namespace Numbers\Users\Users\Model;
class TeamsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Teams::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_team_tenant_id','um_team_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_team_tenant_id = NULL {
                        get => $this->um_team_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_tenant_id', $value);
                            $this->um_team_tenant_id = $value;
                        }
                    }

    /**
     * Team #
     *
     *
     *
     * {domain{team_id_sequence}}
     *
     * @var int|null Domain: team_id_sequence Type: serial
     */
    public int|null $um_team_id = null {
                        get => $this->um_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_id', $value);
                            $this->um_team_id = $value;
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
    public string|null $um_team_code = null {
                        get => $this->um_team_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_code', $value);
                            $this->um_team_code = $value;
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
    public string|null $um_team_name = null {
                        get => $this->um_team_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_name', $value);
                            $this->um_team_name = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $um_team_icon = null {
                        get => $this->um_team_icon;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_icon', $value);
                            $this->um_team_icon = $value;
                        }
                    }

    /**
     * Weight
     *
     *
     *
     * {domain{weight}}
     *
     * @var int|null Domain: weight Type: integer
     */
    public int|null $um_team_weight = NULL {
                        get => $this->um_team_weight;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_weight', $value);
                            $this->um_team_weight = $value;
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
    public int|null $um_team_inactive = 0 {
                        get => $this->um_team_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_team_inactive', $value);
                            $this->um_team_inactive = $value;
                        }
                    }
}
