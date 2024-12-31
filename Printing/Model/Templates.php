<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Model;

use Object\Table;

class Templates extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'P8';
    public $title = 'P/8 Templates';
    public $schema;
    public $name = 'p8_templates';
    public $pk = ['p8_template_tenant_id', 'p8_template_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'p8_template_';
    public $columns = [
        'p8_template_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'p8_template_id' => ['name' => 'Template #', 'domain' => 'template_id_sequence'],
        'p8_template_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'p8_template_templtype_id' => ['name' => 'Type', 'domain' => 'type_id'],
        'p8_template_name' => ['name' => 'Name', 'domain' => 'name'],
        'p8_template_print_orientation' => ['name' => 'Orientation', 'domain' => 'print_orientation', 'null' => true],
        'p8_template_print_format' => ['name' => 'Format', 'domain' => 'print_format', 'null' => true],
        'p8_template_font_family' => ['name' => 'Font Family', 'domain' => 'font_family', 'null' => true],
        'p8_template_font_size' => ['name' => 'Font Size', 'domain' => 'font_size'],
        // version
        'p8_template_versioned' => ['name' => 'Versioned', 'type' => 'boolean'],
        'p8_template_version_p8_template_id' => ['name' => 'Version Template #', 'domain' => 'template_id', 'null' => true],
        'p8_template_version_code' => ['name' => 'Version Code', 'domain' => 'version_code', 'null' => true],
        'p8_template_version_name' => ['name' => 'Version Name', 'domain' => 'name', 'null' => true],
        'p8_template_version_headers' => ['name' => 'Version Headers', 'type' => 'json', 'null' => true],
        // other fields
        'p8_template_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'p8_templates_pk' => ['type' => 'pk', 'columns' => ['p8_template_tenant_id', 'p8_template_id']],
        'p8_template_code_un' => ['type' => 'unique', 'columns' => ['p8_template_tenant_id', 'p8_template_code']],
        'p8_template_templtype_id_fk' => [
            'type' => 'fk',
            'columns' => ['p8_template_tenant_id', 'p8_template_templtype_id'],
            'foreign_model' => '\Numbers\Users\Printing\Model\Template\Types',
            'foreign_columns' => ['p8_templtype_tenant_id', 'p8_templtype_id']
        ],
        'p8_template_version_p8_template_id_fk' => [
            'type' => 'fk',
            'columns' => ['p8_template_tenant_id', 'p8_template_version_p8_template_id'],
            'foreign_model' => '\Numbers\Users\Printing\Model\Templates',
            'foreign_columns' => ['p8_template_tenant_id', 'p8_template_id']
        ]
    ];
    public $indexes = [
        'p8_templates_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['p8_template_code', 'p8_template_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'p8_template_tenant_id' => 'wg_audit_tenant_id',
            'p8_template_id' => 'wg_audit_template_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'p8_template_name' => 'name',
        'p8_template_version_name' => 'name',
        'p8_template_inactive' => 'inactive'
    ];
    public $options_active = [
        'p8_template_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
