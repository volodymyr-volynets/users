<?php

namespace Numbers\Users\Users\Model\Channel;
class GroupsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Channel\Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_changroup_tenant_id','um_changroup_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_changroup_tenant_id = NULL {
                        get => $this->um_changroup_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_tenant_id', $value);
                            $this->um_changroup_tenant_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_changroup_id = null {
                        get => $this->um_changroup_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_id', $value);
                            $this->um_changroup_id = $value;
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
    public string|null $um_changroup_code = null {
                        get => $this->um_changroup_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_code', $value);
                            $this->um_changroup_code = $value;
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
    public string|null $um_changroup_name = null {
                        get => $this->um_changroup_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_name', $value);
                            $this->um_changroup_name = $value;
                        }
                    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $um_changroup_module_code = null {
                        get => $this->um_changroup_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_module_code', $value);
                            $this->um_changroup_module_code = $value;
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
    public int|null $um_changroup_inactive = 0 {
                        get => $this->um_changroup_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_inactive', $value);
                            $this->um_changroup_inactive = $value;
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
    public string|null $um_changroup_inserted_timestamp = null {
                        get => $this->um_changroup_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_inserted_timestamp', $value);
                            $this->um_changroup_inserted_timestamp = $value;
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
    public int|null $um_changroup_inserted_user_id = NULL {
                        get => $this->um_changroup_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_inserted_user_id', $value);
                            $this->um_changroup_inserted_user_id = $value;
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
    public string|null $um_changroup_updated_timestamp = null {
                        get => $this->um_changroup_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_updated_timestamp', $value);
                            $this->um_changroup_updated_timestamp = $value;
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
    public int|null $um_changroup_updated_user_id = NULL {
                        get => $this->um_changroup_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_changroup_updated_user_id', $value);
                            $this->um_changroup_updated_user_id = $value;
                        }
                    }
}
