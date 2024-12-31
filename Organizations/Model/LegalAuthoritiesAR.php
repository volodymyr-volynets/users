<?php

namespace Numbers\Users\Organizations\Model;
class LegalAuthoritiesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\LegalAuthorities::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_authority_tenant_id','on_authority_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_authority_tenant_id = NULL {
                        get => $this->on_authority_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_tenant_id', $value);
                            $this->on_authority_tenant_id = $value;
                        }
                    }

    /**
     * Authority #
     *
     *
     *
     * {domain{authority_id_sequence}}
     *
     * @var int|null Domain: authority_id_sequence Type: serial
     */
    public int|null $on_authority_id = null {
                        get => $this->on_authority_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_id', $value);
                            $this->on_authority_id = $value;
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
    public string|null $on_authority_code = null {
                        get => $this->on_authority_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_code', $value);
                            $this->on_authority_code = $value;
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
    public string|null $on_authority_name = null {
                        get => $this->on_authority_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_name', $value);
                            $this->on_authority_name = $value;
                        }
                    }

    /**
     * Effective From
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_authority_effective_from = null {
                        get => $this->on_authority_effective_from;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_effective_from', $value);
                            $this->on_authority_effective_from = $value;
                        }
                    }

    /**
     * Effective To
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $on_authority_effective_to = null {
                        get => $this->on_authority_effective_to;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_effective_to', $value);
                            $this->on_authority_effective_to = $value;
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
    public int|null $on_authority_inactive = 0 {
                        get => $this->on_authority_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_inactive', $value);
                            $this->on_authority_inactive = $value;
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
    public string|null $on_authority_optimistic_lock = 'now()' {
                        get => $this->on_authority_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_authority_optimistic_lock', $value);
                            $this->on_authority_optimistic_lock = $value;
                        }
                    }
}
