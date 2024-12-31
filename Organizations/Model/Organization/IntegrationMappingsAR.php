<?php

namespace Numbers\Users\Organizations\Model\Organization;
class IntegrationMappingsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Organization\IntegrationMappings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_orgintegmap_tenant_id','on_orgintegmap_organization_id','on_orgintegmap_integtype_code','on_orgintegmap_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_orgintegmap_tenant_id = NULL {
                        get => $this->on_orgintegmap_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_tenant_id', $value);
                            $this->on_orgintegmap_tenant_id = $value;
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
    public string|null $on_orgintegmap_timestamp = 'now()' {
                        get => $this->on_orgintegmap_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_timestamp', $value);
                            $this->on_orgintegmap_timestamp = $value;
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
    public int|null $on_orgintegmap_organization_id = NULL {
                        get => $this->on_orgintegmap_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_organization_id', $value);
                            $this->on_orgintegmap_organization_id = $value;
                        }
                    }

    /**
     * Integration Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $on_orgintegmap_integtype_code = null {
                        get => $this->on_orgintegmap_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_integtype_code', $value);
                            $this->on_orgintegmap_integtype_code = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $on_orgintegmap_code = null {
                        get => $this->on_orgintegmap_code;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_code', $value);
                            $this->on_orgintegmap_code = $value;
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
    public string|null $on_orgintegmap_name = null {
                        get => $this->on_orgintegmap_name;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_name', $value);
                            $this->on_orgintegmap_name = $value;
                        }
                    }

    /**
     * Default
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $on_orgintegmap_default = 0 {
                        get => $this->on_orgintegmap_default;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_default', $value);
                            $this->on_orgintegmap_default = $value;
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
    public int|null $on_orgintegmap_inactive = 0 {
                        get => $this->on_orgintegmap_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('on_orgintegmap_inactive', $value);
                            $this->on_orgintegmap_inactive = $value;
                        }
                    }
}
