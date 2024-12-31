<?php

namespace Numbers\Users\Organizations\Model\Common\Note;
class OrganizationsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Organizations\Model\Common\Note\Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['on_comnotorg_tenant_id','on_comnotorg_comnote_id','on_comnotorg_organization_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $on_comnotorg_tenant_id = NULL {
                        get => $this->on_comnotorg_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotorg_tenant_id', $value);
                            $this->on_comnotorg_tenant_id = $value;
                        }
                    }

    /**
     * Note #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $on_comnotorg_comnote_id = NULL {
                        get => $this->on_comnotorg_comnote_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotorg_comnote_id', $value);
                            $this->on_comnotorg_comnote_id = $value;
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
    public int|null $on_comnotorg_organization_id = NULL {
                        get => $this->on_comnotorg_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('on_comnotorg_organization_id', $value);
                            $this->on_comnotorg_organization_id = $value;
                        }
                    }
}
