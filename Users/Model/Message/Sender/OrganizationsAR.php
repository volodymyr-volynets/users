<?php

namespace Numbers\Users\Users\Model\Message\Sender;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Message\Sender\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_senderorg_tenant_id','um_senderorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_senderorg_tenant_id = NULL {
                        get => $this->um_senderorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_tenant_id', $value);
                            $this->um_senderorg_tenant_id = $value;
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
    public string|null $um_senderorg_timestamp = 'now()' {
                        get => $this->um_senderorg_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_timestamp', $value);
                            $this->um_senderorg_timestamp = $value;
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
    public int|null $um_senderorg_organization_id = NULL {
                        get => $this->um_senderorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_organization_id', $value);
                            $this->um_senderorg_organization_id = $value;
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
    public string|null $um_senderorg_from_email = null {
                        get => $this->um_senderorg_from_email;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_from_email', $value);
                            $this->um_senderorg_from_email = $value;
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
    public string|null $um_senderorg_from_name = null {
                        get => $this->um_senderorg_from_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_from_name', $value);
                            $this->um_senderorg_from_name = $value;
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
    public int|null $um_senderorg_inactive = 0 {
                        get => $this->um_senderorg_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_senderorg_inactive', $value);
                            $this->um_senderorg_inactive = $value;
                        }
                    }
}
