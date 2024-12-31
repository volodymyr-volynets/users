<?php

namespace Numbers\Users\Users\Model\User\Security;
class AnswersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Users\Model\User\Security\Answers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['um_usrsecanswer_tenant_id','um_usrsecanswer_user_id','um_usrsecanswer_question_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $um_usrsecanswer_tenant_id = NULL {
                        get => $this->um_usrsecanswer_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrsecanswer_tenant_id', $value);
                            $this->um_usrsecanswer_tenant_id = $value;
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
    public string|null $um_usrsecanswer_timestamp = 'now()' {
                        get => $this->um_usrsecanswer_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrsecanswer_timestamp', $value);
                            $this->um_usrsecanswer_timestamp = $value;
                        }
                    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $um_usrsecanswer_user_id = NULL {
                        get => $this->um_usrsecanswer_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrsecanswer_user_id', $value);
                            $this->um_usrsecanswer_user_id = $value;
                        }
                    }

    /**
     * Question #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $um_usrsecanswer_question_id = NULL {
                        get => $this->um_usrsecanswer_question_id;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrsecanswer_question_id', $value);
                            $this->um_usrsecanswer_question_id = $value;
                        }
                    }

    /**
     * Answer
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $um_usrsecanswer_answer = null {
                        get => $this->um_usrsecanswer_answer;
                        set {
                            $this->setFullPkAndFilledColumn('um_usrsecanswer_answer', $value);
                            $this->um_usrsecanswer_answer = $value;
                        }
                    }
}
