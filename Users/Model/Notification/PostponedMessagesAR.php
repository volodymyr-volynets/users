<?php

namespace Numbers\Users\Users\Model\Notification;
class PostponedMessagesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Notification\PostponedMessages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_notpostmess_tenant_id','um_notpostmess_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_notpostmess_tenant_id = NULL {
                        get => $this->um_notpostmess_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_tenant_id', $value);
                            $this->um_notpostmess_tenant_id = $value;
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
    public int|null $um_notpostmess_id = null {
                        get => $this->um_notpostmess_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_id', $value);
                            $this->um_notpostmess_id = $value;
                        }
                    }

    /**
     * Timestamp Inserted
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $um_notpostmess_inserted_timestamp = 'now()' {
                        get => $this->um_notpostmess_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_inserted_timestamp', $value);
                            $this->um_notpostmess_inserted_timestamp = $value;
                        }
                    }

    /**
     * Method
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_notpostmess_method = null {
                        get => $this->um_notpostmess_method;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_method', $value);
                            $this->um_notpostmess_method = $value;
                        }
                    }

    /**
     * Params
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $um_notpostmess_params = null {
                        get => $this->um_notpostmess_params;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_params', $value);
                            $this->um_notpostmess_params = $value;
                        }
                    }

    /**
     * Timestamp Completed
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_notpostmess_completed_timestamp = null {
                        get => $this->um_notpostmess_completed_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_completed_timestamp', $value);
                            $this->um_notpostmess_completed_timestamp = $value;
                        }
                    }

    /**
     * Last Timestamp
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $um_notpostmess_last_timestamp = null {
                        get => $this->um_notpostmess_last_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_last_timestamp', $value);
                            $this->um_notpostmess_last_timestamp = $value;
                        }
                    }

    /**
     * Last Message
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_notpostmess_last_message = null {
                        get => $this->um_notpostmess_last_message;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_last_message', $value);
                            $this->um_notpostmess_last_message = $value;
                        }
                    }

    /**
     * Log Originated #
     *
     *
     *
     * {domain{uuid}}
     *
     * @var string|null Domain: uuid Type: char
     */
    public string|null $um_notpostmess_sm_log_originated_id = null {
                        get => $this->um_notpostmess_sm_log_originated_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notpostmess_sm_log_originated_id', $value);
                            $this->um_notpostmess_sm_log_originated_id = $value;
                        }
                    }
}
