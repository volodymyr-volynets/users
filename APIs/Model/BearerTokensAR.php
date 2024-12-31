<?php

namespace Numbers\Users\APIs\Model;
class BearerTokensAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\APIs\Model\BearerTokens::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['a3_bearertoken_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $a3_bearertoken_tenant_id = NULL {
                        get => $this->a3_bearertoken_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_tenant_id', $value);
                            $this->a3_bearertoken_tenant_id = $value;
                        }
                    }

    /**
     * Token #
     *
     *
     *
     * {domain{token}}
     *
     * @var string|null Domain: token Type: varchar
     */
    public string|null $a3_bearertoken_id = null {
                        get => $this->a3_bearertoken_id;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_id', $value);
                            $this->a3_bearertoken_id = $value;
                        }
                    }

    /**
     * Datetime Started
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $a3_bearertoken_started = null {
                        get => $this->a3_bearertoken_started;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_started', $value);
                            $this->a3_bearertoken_started = $value;
                        }
                    }

    /**
     * Datetime Expires
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $a3_bearertoken_expires = null {
                        get => $this->a3_bearertoken_expires;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_expires', $value);
                            $this->a3_bearertoken_expires = $value;
                        }
                    }

    /**
     * Session #
     *
     *
     *
     * {domain{session_id}}
     *
     * @var string|null Domain: session_id Type: varchar
     */
    public string|null $a3_bearertoken_session_id = null {
                        get => $this->a3_bearertoken_session_id;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_session_id', $value);
                            $this->a3_bearertoken_session_id = $value;
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
    public int|null $a3_bearertoken_user_id = NULL {
                        get => $this->a3_bearertoken_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_user_id', $value);
                            $this->a3_bearertoken_user_id = $value;
                        }
                    }

    /**
     * User IP
     *
     *
     *
     * {domain{ip}}
     *
     * @var string|null Domain: ip Type: varchar
     */
    public string|null $a3_bearertoken_user_ip = null {
                        get => $this->a3_bearertoken_user_ip;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_user_ip', $value);
                            $this->a3_bearertoken_user_ip = $value;
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
    public int|null $a3_bearertoken_inactive = 0 {
                        get => $this->a3_bearertoken_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('a3_bearertoken_inactive', $value);
                            $this->a3_bearertoken_inactive = $value;
                        }
                    }
}
