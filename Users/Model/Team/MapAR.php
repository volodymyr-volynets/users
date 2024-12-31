<?php

namespace Numbers\Users\Users\Model\Team;
class MapAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Team\Map::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrtmmap_tenant_id','um_usrtmmap_user_id','um_usrtmmap_team_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrtmmap_tenant_id = NULL {
                        get => $this->um_usrtmmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_tenant_id', $value);
                            $this->um_usrtmmap_tenant_id = $value;
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
    public string|null $um_usrtmmap_timestamp = 'now()' {
                        get => $this->um_usrtmmap_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_timestamp', $value);
                            $this->um_usrtmmap_timestamp = $value;
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
    public int|null $um_usrtmmap_user_id = NULL {
                        get => $this->um_usrtmmap_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_user_id', $value);
                            $this->um_usrtmmap_user_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{team_id}}
     *
     * @var int|null Domain: team_id Type: integer
     */
    public int|null $um_usrtmmap_team_id = NULL {
                        get => $this->um_usrtmmap_team_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_team_id', $value);
                            $this->um_usrtmmap_team_id = $value;
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
    public int|null $um_usrtmmap_inactive = 0 {
                        get => $this->um_usrtmmap_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_inactive', $value);
                            $this->um_usrtmmap_inactive = $value;
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
    public string|null $um_usrtmmap_inserted_timestamp = null {
                        get => $this->um_usrtmmap_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_inserted_timestamp', $value);
                            $this->um_usrtmmap_inserted_timestamp = $value;
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
    public int|null $um_usrtmmap_inserted_user_id = NULL {
                        get => $this->um_usrtmmap_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_inserted_user_id', $value);
                            $this->um_usrtmmap_inserted_user_id = $value;
                        }
                    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_usrtmmap_updated_timestamp = null {
                        get => $this->um_usrtmmap_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_updated_timestamp', $value);
                            $this->um_usrtmmap_updated_timestamp = $value;
                        }
                    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrtmmap_updated_user_id = NULL {
                        get => $this->um_usrtmmap_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtmmap_updated_user_id', $value);
                            $this->um_usrtmmap_updated_user_id = $value;
                        }
                    }
}
