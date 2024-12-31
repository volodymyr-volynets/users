<?php

namespace Numbers\Users\Widgets\Ingestions\Model;
class LocksAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Widgets\Ingestions\Model\Locks::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['wg_emailinglock_tenant_id','wg_emailinglock_link','wg_emailinglock_uid','wg_emailinglock_timestamp'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $wg_emailinglock_tenant_id = NULL {
                        get => $this->wg_emailinglock_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('wg_emailinglock_tenant_id', $value);
                            $this->wg_emailinglock_tenant_id = $value;
                        }
                    }

    /**
     * Link
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $wg_emailinglock_link = null {
                        get => $this->wg_emailinglock_link;
                        set {
                            $this->setFullPkAndFilledColumn('wg_emailinglock_link', $value);
                            $this->wg_emailinglock_link = $value;
                        }
                    }

    /**
     * UID
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $wg_emailinglock_uid = NULL {
                        get => $this->wg_emailinglock_uid;
                        set {
                            $this->setFullPkAndFilledColumn('wg_emailinglock_uid', $value);
                            $this->wg_emailinglock_uid = $value;
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
    public string|null $wg_emailinglock_timestamp = 'now()' {
                        get => $this->wg_emailinglock_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('wg_emailinglock_timestamp', $value);
                            $this->wg_emailinglock_timestamp = $value;
                        }
                    }
}
