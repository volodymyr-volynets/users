<?php

namespace Numbers\Users\Users\Model\Role;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Role\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_roltype_id'];
    /**
     * Type #
     *
     *
     *
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $um_roltype_id = NULL {
                        get => $this->um_roltype_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_roltype_id', $value);
                            $this->um_roltype_id = $value;
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
    public string|null $um_roltype_name = null {
                        get => $this->um_roltype_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_roltype_name', $value);
                            $this->um_roltype_name = $value;
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
    public int|null $um_roltype_inactive = 0 {
                        get => $this->um_roltype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_roltype_inactive', $value);
                            $this->um_roltype_inactive = $value;
                        }
                    }
}
