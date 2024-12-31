<?php

namespace Numbers\Users\Users\Model\Message;
class RecipientsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Message\Recipients::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_mesrecip_tenant_id','um_mesrecip_message_id','um_mesrecip_type_id','um_mesrecip_user_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_mesrecip_tenant_id = NULL {
                        get => $this->um_mesrecip_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_tenant_id', $value);
                            $this->um_mesrecip_tenant_id = $value;
                        }
                    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $um_mesrecip_message_id = NULL {
                        get => $this->um_mesrecip_message_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_message_id', $value);
                            $this->um_mesrecip_message_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Users\Model\Message\RecipientTypes}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_mesrecip_type_id = NULL {
                        get => $this->um_mesrecip_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_type_id', $value);
                            $this->um_mesrecip_type_id = $value;
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
    public int|null $um_mesrecip_user_id = NULL {
                        get => $this->um_mesrecip_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_user_id', $value);
                            $this->um_mesrecip_user_id = $value;
                        }
                    }

    /**
     * User Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $um_mesrecip_user_email = null {
                        get => $this->um_mesrecip_user_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_user_email', $value);
                            $this->um_mesrecip_user_email = $value;
                        }
                    }

    /**
     * User Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $um_mesrecip_user_phone = null {
                        get => $this->um_mesrecip_user_phone;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_user_phone', $value);
                            $this->um_mesrecip_user_phone = $value;
                        }
                    }

    /**
     * Read
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_mesrecip_read = 0 {
                        get => $this->um_mesrecip_read;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_read', $value);
                            $this->um_mesrecip_read = $value;
                        }
                    }

    /**
     * Chat Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_mesrecip_chat_group_id = NULL {
                        get => $this->um_mesrecip_chat_group_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_mesrecip_chat_group_id', $value);
                            $this->um_mesrecip_chat_group_id = $value;
                        }
                    }
}
