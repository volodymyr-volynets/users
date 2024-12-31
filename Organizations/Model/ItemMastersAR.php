<?php

namespace Numbers\Users\Organizations\Model;
class ItemMastersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\ItemMasters::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_itemmaster_tenant_id','on_itemmaster_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_itemmaster_tenant_id = NULL {
                        get => $this->on_itemmaster_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_tenant_id', $value);
                            $this->on_itemmaster_tenant_id = $value;
                        }
                    }

    /**
     * Item Master #
     *
     *
     *
     * {domain{item_master_id_sequence}}
     *
     * @var int|null Domain: item_master_id_sequence Type: serial
     */
    public int|null $on_itemmaster_id = null {
                        get => $this->on_itemmaster_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_id', $value);
                            $this->on_itemmaster_id = $value;
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
    public string|null $on_itemmaster_code = null {
                        get => $this->on_itemmaster_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_code', $value);
                            $this->on_itemmaster_code = $value;
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
    public string|null $on_itemmaster_name = null {
                        get => $this->on_itemmaster_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_name', $value);
                            $this->on_itemmaster_name = $value;
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
    public int|null $on_itemmaster_inactive = 0 {
                        get => $this->on_itemmaster_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_inactive', $value);
                            $this->on_itemmaster_inactive = $value;
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
    public string|null $on_itemmaster_optimistic_lock = 'now()' {
                        get => $this->on_itemmaster_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_itemmaster_optimistic_lock', $value);
                            $this->on_itemmaster_optimistic_lock = $value;
                        }
                    }
}
