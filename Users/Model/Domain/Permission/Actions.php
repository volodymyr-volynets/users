<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Domain\Permission;

use Object\Table;

class Actions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Domain Permission Actions';
    public $name = 'um_domain_permission_actions';
    public $pk = ['um_domperaction_tenant_id', 'um_domperaction_um_domain_id', 'um_domperaction_module_id', 'um_domperaction_resource_id', 'um_domperaction_method_code', 'um_domperaction_action_id'];
    public $tenant = true;
    public $orderby = [
        'um_domperaction_action_id' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_domperaction_';
    public $columns = [
        'um_domperaction_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_domperaction_um_domain_id' => ['name' => 'Domain #', 'domain' => 'domain_id'],
        'um_domperaction_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'um_domperaction_resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id'],
        'um_domperaction_method_code' => ['name' => 'Method Code', 'domain' => 'code'],
        'um_domperaction_action_id' => ['name' => 'Action #', 'domain' => 'action_id'],
        'um_domperaction_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_domain_permission_actions_pk' => ['type' => 'pk', 'columns' => ['um_domperaction_tenant_id', 'um_domperaction_um_domain_id', 'um_domperaction_module_id', 'um_domperaction_resource_id', 'um_domperaction_method_code', 'um_domperaction_action_id']],
        'um_domperaction_resource_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_domperaction_tenant_id', 'um_domperaction_um_domain_id', 'um_domperaction_module_id', 'um_domperaction_resource_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Domain\Permissions',
            'foreign_columns' => ['um_domperm_tenant_id', 'um_domperm_um_domain_id', 'um_domperm_module_id', 'um_domperm_resource_id']
        ],
        'um_domperaction_action_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_domperaction_resource_id', 'um_domperaction_method_code', 'um_domperaction_action_id'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Resource\Map',
            'foreign_columns' => ['sm_rsrcmp_resource_id', 'sm_rsrcmp_method_code', 'sm_rsrcmp_action_id']
        ],
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
