<?php

namespace Numbers\Users\OAuth\Model;
class ProvidersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\OAuth\Model\Providers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['oa_provider_code'];
    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $oa_provider_code = null {
                        get => $this->oa_provider_code;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_code', $value);
                            $this->oa_provider_code = $value;
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
    public string|null $oa_provider_name = null {
                        get => $this->oa_provider_name;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_name', $value);
                            $this->oa_provider_name = $value;
                        }
                    }

    /**
     * Model
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $oa_provider_model = null {
                        get => $this->oa_provider_model;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_model', $value);
                            $this->oa_provider_model = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $oa_provider_icon = null {
                        get => $this->oa_provider_icon;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_icon', $value);
                            $this->oa_provider_icon = $value;
                        }
                    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $oa_provider_order = 1000 {
                        get => $this->oa_provider_order;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_order', $value);
                            $this->oa_provider_order = $value;
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
    public int|null $oa_provider_inactive = 0 {
                        get => $this->oa_provider_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('oa_provider_inactive', $value);
                            $this->oa_provider_inactive = $value;
                        }
                    }
}
