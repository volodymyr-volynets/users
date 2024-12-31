<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Common\Note;

use Object\Table;

class Organizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Common Notes Organizations';
    public $name = 'on_common_note_organizations';
    public $pk = ['on_comnotorg_tenant_id', 'on_comnotorg_comnote_id', 'on_comnotorg_organization_id'];
    public $tenant = true;
    public $orderby = [];
    public $limit;
    public $column_prefix = 'on_comnotorg_';
    public $columns = [
        'on_comnotorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_comnotorg_comnote_id' => ['name' => 'Note #', 'domain' => 'group_id'],
        'on_comnotorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
    ];
    public $constraints = [
        'on_common_note_organizations_pk' => ['type' => 'pk', 'columns' => ['on_comnotorg_tenant_id', 'on_comnotorg_comnote_id', 'on_comnotorg_organization_id']],
        'on_comnotorg_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_comnotorg_tenant_id', 'on_comnotorg_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ],
        'on_comnotorg_comnote_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_comnotorg_tenant_id', 'on_comnotorg_comnote_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Common\Notes',
            'foreign_columns' => ['on_comnote_tenant_id', 'on_comnote_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
