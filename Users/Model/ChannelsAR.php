<?php

namespace Numbers\Users\Users\Model;
class ChannelsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Channels::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_channel_tenant_id','um_channel_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_channel_tenant_id = NULL {
                        get => $this->um_channel_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_tenant_id', $value);
                            $this->um_channel_tenant_id = $value;
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
    public string|null $um_channel_code = null {
                        get => $this->um_channel_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_code', $value);
                            $this->um_channel_code = $value;
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
    public string|null $um_channel_name = null {
                        get => $this->um_channel_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_name', $value);
                            $this->um_channel_name = $value;
                        }
                    }

    /**
     * Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $um_channel_um_chantype_code = null {
                        get => $this->um_channel_um_chantype_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_um_chantype_code', $value);
                            $this->um_channel_um_chantype_code = $value;
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
    public string|null $um_channel_module_code = null {
                        get => $this->um_channel_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_module_code', $value);
                            $this->um_channel_module_code = $value;
                        }
                    }

    /**
     * Field #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $um_channel_field_id = NULL {
                        get => $this->um_channel_field_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_field_id', $value);
                            $this->um_channel_field_id = $value;
                        }
                    }

    /**
     * Field Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $um_channel_field_code = null {
                        get => $this->um_channel_field_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_field_code', $value);
                            $this->um_channel_field_code = $value;
                        }
                    }

    /**
     * Options
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $um_channel_options = null {
                        get => $this->um_channel_options;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_options', $value);
                            $this->um_channel_options = $value;
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
    public int|null $um_channel_inactive = 0 {
                        get => $this->um_channel_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_inactive', $value);
                            $this->um_channel_inactive = $value;
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
    public string|null $um_channel_inserted_timestamp = null {
                        get => $this->um_channel_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_inserted_timestamp', $value);
                            $this->um_channel_inserted_timestamp = $value;
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
    public int|null $um_channel_inserted_user_id = NULL {
                        get => $this->um_channel_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_inserted_user_id', $value);
                            $this->um_channel_inserted_user_id = $value;
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
    public string|null $um_channel_updated_timestamp = null {
                        get => $this->um_channel_updated_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_updated_timestamp', $value);
                            $this->um_channel_updated_timestamp = $value;
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
    public int|null $um_channel_updated_user_id = NULL {
                        get => $this->um_channel_updated_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_channel_updated_user_id', $value);
                            $this->um_channel_updated_user_id = $value;
                        }
                    }
}
