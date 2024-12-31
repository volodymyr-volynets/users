<?php

namespace Numbers\Users\Users\Model\Message\Sender;
class CommonAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Message\Sender\Common::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_sendercmn_tenant_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_sendercmn_tenant_id = NULL {
                        get => $this->um_sendercmn_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_sendercmn_tenant_id', $value);
                            $this->um_sendercmn_tenant_id = $value;
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
    public string|null $um_sendercmn_from_email = null {
                        get => $this->um_sendercmn_from_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_sendercmn_from_email', $value);
                            $this->um_sendercmn_from_email = $value;
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
    public string|null $um_sendercmn_from_name = null {
                        get => $this->um_sendercmn_from_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_sendercmn_from_name', $value);
                            $this->um_sendercmn_from_name = $value;
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
    public string|null $um_sendercmn_optimistic_lock = 'now()' {
                        get => $this->um_sendercmn_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_sendercmn_optimistic_lock', $value);
                            $this->um_sendercmn_optimistic_lock = $value;
                        }
                    }
}
