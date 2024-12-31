<?php

namespace Numbers\Users\Monitoring\Model\Usage;
class ActionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Monitoring\Model\Usage\Actions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['sm_monusgact_tenant_id','sm_monusgact_usage_id','sm_monusgact_action_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $sm_monusgact_tenant_id = NULL {
                        get => $this->sm_monusgact_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_tenant_id', $value);
                            $this->sm_monusgact_tenant_id = $value;
                        }
                    }

    /**
     * Usage #
     *
     *
     *
     *
     *
     * @var int|null Type: bigint
     */
    public int|null $sm_monusgact_usage_id = 0 {
                        get => $this->sm_monusgact_usage_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_usage_id', $value);
                            $this->sm_monusgact_usage_id = $value;
                        }
                    }

    /**
     * Action #
     *
     *
     *
     *
     *
     * @var int|null Type: smallint
     */
    public int|null $sm_monusgact_action_id = 0 {
                        get => $this->sm_monusgact_action_id;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_action_id', $value);
                            $this->sm_monusgact_action_id = $value;
                        }
                    }

    /**
     * Usage Code
     *
     *
     *
     *
     *
     * @var string|null Type: varchar
     */
    public string|null $sm_monusgact_usage_code = null {
                        get => $this->sm_monusgact_usage_code;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_usage_code', $value);
                            $this->sm_monusgact_usage_code = $value;
                        }
                    }

    /**
     * Message
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $sm_monusgact_message = null {
                        get => $this->sm_monusgact_message;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_message', $value);
                            $this->sm_monusgact_message = $value;
                        }
                    }

    /**
     * Replace
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $sm_monusgact_replace = null {
                        get => $this->sm_monusgact_replace;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_replace', $value);
                            $this->sm_monusgact_replace = $value;
                        }
                    }

    /**
     * Affected rows
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $sm_monusgact_affected_rows = 0 {
                        get => $this->sm_monusgact_affected_rows;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_affected_rows', $value);
                            $this->sm_monusgact_affected_rows = $value;
                        }
                    }

    /**
     * Error rows
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $sm_monusgact_error_rows = 0 {
                        get => $this->sm_monusgact_error_rows;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_error_rows', $value);
                            $this->sm_monusgact_error_rows = $value;
                        }
                    }

    /**
     * URL
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $sm_monusgact_url = null {
                        get => $this->sm_monusgact_url;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_url', $value);
                            $this->sm_monusgact_url = $value;
                        }
                    }

    /**
     * History
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $sm_monusgact_history = 0 {
                        get => $this->sm_monusgact_history;
                        set {
                            $this->setFullPkAndFilledColumn('sm_monusgact_history', $value);
                            $this->sm_monusgact_history = $value;
                        }
                    }
}
