<?php

namespace Numbers\Users\Users\Model\User;
class GroupsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrgrp_tenant_id','um_usrgrp_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrgrp_tenant_id = NULL {
                        get => $this->um_usrgrp_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_tenant_id', $value);
                            $this->um_usrgrp_tenant_id = $value;
                        }
                    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_usrgrp_id = null {
                        get => $this->um_usrgrp_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_id', $value);
                            $this->um_usrgrp_id = $value;
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
    public string|null $um_usrgrp_code = null {
                        get => $this->um_usrgrp_code;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_code', $value);
                            $this->um_usrgrp_code = $value;
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
    public string|null $um_usrgrp_name = null {
                        get => $this->um_usrgrp_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_name', $value);
                            $this->um_usrgrp_name = $value;
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
    public int|null $um_usrgrp_organization_id = NULL {
                        get => $this->um_usrgrp_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_organization_id', $value);
                            $this->um_usrgrp_organization_id = $value;
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
    public int|null $um_usrgrp_inactive = 0 {
                        get => $this->um_usrgrp_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_inactive', $value);
                            $this->um_usrgrp_inactive = $value;
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
    public string|null $um_usrgrp_optimistic_lock = 'now()' {
                        get => $this->um_usrgrp_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrgrp_optimistic_lock', $value);
                            $this->um_usrgrp_optimistic_lock = $value;
                        }
                    }
}
