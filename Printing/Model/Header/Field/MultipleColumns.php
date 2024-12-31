<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\Model\Header\Field;

use Object\Table;

class MultipleColumns extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'P8';
    public $title = 'P/8 Header Field Multiple Columns';
    public $schema;
    public $name = 'p8_header_field_multiples';
    public $pk = ['p8_hdrfldmult_tenant_id', 'p8_hdrfldmult_header_id', 'p8_hdrfldmult_model_code', 'p8_hdrfldmult_column_name', 'p8_hdrfldmult_hdrrowtype_code', 'p8_hdrfldmult_multiple_model_code', 'p8_hdrfldmult_multiple_column_name'];
    public $tenant = true;
    public $orderby = [
        'p8_hdrfldmult_multiple_order' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'p8_hdrfldmult_';
    public $columns = [
        'p8_hdrfldmult_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'p8_hdrfldmult_header_id' => ['name' => 'Header #', 'domain' => 'header_id'],
        'p8_hdrfldmult_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        'p8_hdrfldmult_column_name' => ['name' => 'Column', 'domain' => 'column_name'],
        'p8_hdrfldmult_hdrrowtype_code' => ['name' => 'Row Type', 'domain' => 'type_code', 'options_model' => '\Numbers\Users\Printing\Model\Header\RowTypes'],
        'p8_hdrfldmult_multiple_order' => ['name' => 'Order', 'domain' => 'order'],
        'p8_hdrfldmult_multiple_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        'p8_hdrfldmult_multiple_column_name' => ['name' => 'Column', 'domain' => 'column_name'],
        'p8_hdrfldmult_multiple_separator' => ['name' => 'Separator', 'domain' => 'name', 'null' => true],
        'p8_hdrfldmult_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'p8_header_field_multiples_pk' => ['type' => 'pk', 'columns' => ['p8_hdrfldmult_tenant_id', 'p8_hdrfldmult_header_id', 'p8_hdrfldmult_model_code', 'p8_hdrfldmult_column_name', 'p8_hdrfldmult_hdrrowtype_code', 'p8_hdrfldmult_multiple_model_code', 'p8_hdrfldmult_multiple_column_name']],
        'p8_hdrfldmult_hdrrowtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['p8_hdrfldmult_tenant_id', 'p8_hdrfldmult_header_id', 'p8_hdrfldmult_model_code', 'p8_hdrfldmult_column_name', 'p8_hdrfldmult_hdrrowtype_code'],
            'foreign_model' => '\Numbers\Users\Printing\Model\Header\Fields',
            'foreign_columns' => ['p8_hdrfield_tenant_id', 'p8_hdrfield_header_id', 'p8_hdrfield_model_code', 'p8_hdrfield_column_name', 'p8_hdrfield_hdrrowtype_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
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
