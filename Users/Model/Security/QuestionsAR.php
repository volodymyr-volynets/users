<?php

namespace Numbers\Users\Users\Model\Security;
class QuestionsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\Security\Questions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_secquestion_id'];
    /**
     * Security Question #
     *
     *
     *
     * {domain{group_id_sequence}}
     *
     * @var int|null Domain: group_id_sequence Type: serial
     */
    public int|null $um_secquestion_id = null {
                        get => $this->um_secquestion_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_secquestion_id', $value);
                            $this->um_secquestion_id = $value;
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
    public string|null $um_secquestion_name = null {
                        get => $this->um_secquestion_name;
                        set {
                            $this->setFullPkAndFilledColumn('um_secquestion_name', $value);
                            $this->um_secquestion_name = $value;
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
    public int|null $um_secquestion_inactive = 0 {
                        get => $this->um_secquestion_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('um_secquestion_inactive', $value);
                            $this->um_secquestion_inactive = $value;
                        }
                    }
}
