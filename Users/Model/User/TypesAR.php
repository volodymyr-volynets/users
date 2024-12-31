<?php

namespace Numbers\Users\Users\Model\User;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrtype_id'];
    /**
     * Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_usrtype_id = NULL {
                        get => $this->um_usrtype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtype_id', $value);
                            $this->um_usrtype_id = $value;
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
    public string|null $um_usrtype_name = null {
                        get => $this->um_usrtype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtype_name', $value);
                            $this->um_usrtype_name = $value;
                        }
                    }

    /**
     * API
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $um_usrtype_api = 0 {
                        get => $this->um_usrtype_api;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtype_api', $value);
                            $this->um_usrtype_api = $value;
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
    public int|null $um_usrtype_inactive = 0 {
                        get => $this->um_usrtype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrtype_inactive', $value);
                            $this->um_usrtype_inactive = $value;
                        }
                    }
}
