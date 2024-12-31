<?php

namespace Numbers\Users\Widgets\Comments\Model;
class TemplatesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Widgets\Comments\Model\Templates::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_notetemplate_tenant_id','um_notetemplate_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_notetemplate_tenant_id = NULL {
                        get => $this->um_notetemplate_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_tenant_id', $value);
                            $this->um_notetemplate_tenant_id = $value;
                        }
                    }

    /**
     * Template #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_notetemplate_id = null {
                        get => $this->um_notetemplate_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_id', $value);
                            $this->um_notetemplate_id = $value;
                        }
                    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $um_notetemplate_organization_id = NULL {
                        get => $this->um_notetemplate_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_organization_id', $value);
                            $this->um_notetemplate_organization_id = $value;
                        }
                    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Users\Widgets\Comments\Model\Template\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_notetemplate_type_id = 100 {
                        get => $this->um_notetemplate_type_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_type_id', $value);
                            $this->um_notetemplate_type_id = $value;
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
    public string|null $um_notetemplate_name = null {
                        get => $this->um_notetemplate_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_name', $value);
                            $this->um_notetemplate_name = $value;
                        }
                    }

    /**
     * Template
     *
     *
     *
     * {domain{comment}}
     *
     * @var string|null Domain: comment Type: text
     */
    public string|null $um_notetemplate_template = null {
                        get => $this->um_notetemplate_template;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_template', $value);
                            $this->um_notetemplate_template = $value;
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
    public int|null $um_notetemplate_inactive = 0 {
                        get => $this->um_notetemplate_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_inactive', $value);
                            $this->um_notetemplate_inactive = $value;
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
    public string|null $um_notetemplate_optimistic_lock = 'now()' {
                        get => $this->um_notetemplate_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_notetemplate_optimistic_lock', $value);
                            $this->um_notetemplate_optimistic_lock = $value;
                        }
                    }
}
