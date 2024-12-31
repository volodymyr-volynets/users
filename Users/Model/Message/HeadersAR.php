<?php

namespace Numbers\Users\Users\Model\Message;
class HeadersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Message\Headers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_mesheader_tenant_id','um_mesheader_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_mesheader_tenant_id = NULL {
                        get => $this->um_mesheader_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_tenant_id', $value);
                            $this->um_mesheader_tenant_id = $value;
                        }
                    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id_sequence}}
     *
     * @var int|null Domain: message_id_sequence Type: bigserial
     */
    public int|null $um_mesheader_id = null {
                        get => $this->um_mesheader_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_id', $value);
                            $this->um_mesheader_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Users\Model\Message\HeaderTypes}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_mesheader_type_id = 10 {
                        get => $this->um_mesheader_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_type_id', $value);
                            $this->um_mesheader_type_id = $value;
                        }
                    }

    /**
     * Notification Code
     *
     *
     *
     * {domain{feature_code}}
     *
     * @var string|null Domain: feature_code Type: varchar
     */
    public string|null $um_mesheader_notification_code = null {
                        get => $this->um_mesheader_notification_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_notification_code', $value);
                            $this->um_mesheader_notification_code = $value;
                        }
                    }

    /**
     * Important
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_mesheader_important = 0 {
                        get => $this->um_mesheader_important;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_important', $value);
                            $this->um_mesheader_important = $value;
                        }
                    }

    /**
     * From Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $um_mesheader_from_email = null {
                        get => $this->um_mesheader_from_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_from_email', $value);
                            $this->um_mesheader_from_email = $value;
                        }
                    }

    /**
     * From Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $um_mesheader_from_name = null {
                        get => $this->um_mesheader_from_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_from_name', $value);
                            $this->um_mesheader_from_name = $value;
                        }
                    }

    /**
     * Subject
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_mesheader_subject = null {
                        get => $this->um_mesheader_subject;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_subject', $value);
                            $this->um_mesheader_subject = $value;
                        }
                    }

    /**
     * Body #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $um_mesheader_body_id = NULL {
                        get => $this->um_mesheader_body_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_body_id', $value);
                            $this->um_mesheader_body_id = $value;
                        }
                    }

    /**
     * Keywords
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_mesheader_keywords = null {
                        get => $this->um_mesheader_keywords;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_keywords', $value);
                            $this->um_mesheader_keywords = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_mesheader_chat_group_id = NULL {
                        get => $this->um_mesheader_chat_group_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_chat_group_id', $value);
                            $this->um_mesheader_chat_group_id = $value;
                        }
                    }

    /**
     * Chat User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_mesheader_chat_user_id = NULL {
                        get => $this->um_mesheader_chat_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_chat_user_id', $value);
                            $this->um_mesheader_chat_user_id = $value;
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
    public string|null $um_mesheader_inserted_timestamp = null {
                        get => $this->um_mesheader_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_inserted_timestamp', $value);
                            $this->um_mesheader_inserted_timestamp = $value;
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
    public int|null $um_mesheader_inserted_user_id = NULL {
                        get => $this->um_mesheader_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesheader_inserted_user_id', $value);
                            $this->um_mesheader_inserted_user_id = $value;
                        }
                    }
}
