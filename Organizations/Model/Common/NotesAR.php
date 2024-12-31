<?php

namespace Numbers\Users\Organizations\Model\Common;
class NotesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Common\Notes::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_comnote_tenant_id','on_comnote_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_comnote_tenant_id = NULL {
                        get => $this->on_comnote_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_tenant_id', $value);
                            $this->on_comnote_tenant_id = $value;
                        }
                    }

    /**
     * Note #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $on_comnote_id = null {
                        get => $this->on_comnote_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_id', $value);
                            $this->on_comnote_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Organizations\Model\Common\Note\Types}}
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $on_comnote_type_code = null {
                        get => $this->on_comnote_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_type_code', $value);
                            $this->on_comnote_type_code = $value;
                        }
                    }

    /**
     * Comment
     *
     *
     *
     * {domain{comment}}
     *
     * @var string|null Domain: comment Type: text
     */
    public string|null $on_comnote_comment = null {
                        get => $this->on_comnote_comment;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_comment', $value);
                            $this->on_comnote_comment = $value;
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
    public int|null $on_comnote_inactive = 0 {
                        get => $this->on_comnote_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_inactive', $value);
                            $this->on_comnote_inactive = $value;
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
    public string|null $on_comnote_optimistic_lock = 'now()' {
                        get => $this->on_comnote_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnote_optimistic_lock', $value);
                            $this->on_comnote_optimistic_lock = $value;
                        }
                    }
}
