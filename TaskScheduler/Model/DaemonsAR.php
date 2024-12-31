<?php

namespace Numbers\Users\TaskScheduler\Model;
class DaemonsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\TaskScheduler\Model\Daemons::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['ts_daemon_code'];
    /**
     * Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $ts_daemon_code = null {
                        get => $this->ts_daemon_code;
                        set {
                            $this->setFullPkAndFilledColumn('ts_daemon_code', $value);
                            $this->ts_daemon_code = $value;
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
    public string|null $ts_daemon_name = null {
                        get => $this->ts_daemon_name;
                        set {
                            $this->setFullPkAndFilledColumn('ts_daemon_name', $value);
                            $this->ts_daemon_name = $value;
                        }
                    }

    /**
     * Token
     *
     *
     *
     * {domain{token}}
     *
     * @var string|null Domain: token Type: varchar
     */
    public string|null $ts_daemon_token = null {
                        get => $this->ts_daemon_token;
                        set {
                            $this->setFullPkAndFilledColumn('ts_daemon_token', $value);
                            $this->ts_daemon_token = $value;
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
    public int|null $ts_daemon_inactive = 0 {
                        get => $this->ts_daemon_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('ts_daemon_inactive', $value);
                            $this->ts_daemon_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $ts_daemon_optimistic_lock = 'now()' {
                        get => $this->ts_daemon_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('ts_daemon_optimistic_lock', $value);
                            $this->ts_daemon_optimistic_lock = $value;
                        }
                    }
}
