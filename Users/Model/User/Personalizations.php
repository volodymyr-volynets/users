<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\Table;

class Personalizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Personalizations';
    public $name = 'um_user_personalizations';
    public $pk = ['um_usrpersonal_tenant_id', 'um_usrpersonal_user_id', 'um_usrpersonal_module_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrpersonal_';
    public $columns = [
        'um_usrpersonal_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrpersonal_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrpersonal_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_usrpersonal_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrpersonal_is_avatar' => ['name' => 'Is Avatar', 'type' => 'boolean'],
        'um_usrpersonal_photo_file_id' => ['name' => 'Photo File #', 'domain' => 'file_id', 'null' => true],
        'um_usrpersonal_photo_file_url' => ['name' => 'Photo File URL', 'domain' => 'url', 'null' => true],
        'um_usrpersonal_biography_wysiwyg' => ['name' => 'Biography (wysiwyg)', 'domain' => 'content', 'null' => true],
        'um_usrpersonal_um_usrsign_id' => ['name' => 'Signature #', 'domain' => 'signature_id', 'null' => true],
        'um_usrpersonal_um_usrterm_id' => ['name' => 'Term #', 'domain' => 'bigterm_id', 'null' => true],
        'um_usrpersonal_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_personalizations_pk' => ['type' => 'pk', 'columns' => ['um_usrpersonal_tenant_id', 'um_usrpersonal_user_id', 'um_usrpersonal_module_code']],
        'um_usrpersonal_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpersonal_tenant_id', 'um_usrpersonal_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrpersonal_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpersonal_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ],
        'um_usrpersonal_um_usrsign_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpersonal_tenant_id', 'um_usrpersonal_um_usrsign_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Signatures',
            'foreign_columns' => ['um_usrsign_tenant_id', 'um_usrsign_id']
        ],
        'um_usrpersonal_um_usrterm_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrpersonal_tenant_id', 'um_usrpersonal_um_usrterm_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Terms',
            'foreign_columns' => ['um_usrterm_tenant_id', 'um_usrterm_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'um_usrpersonal_name' => 'name',
        'um_usrpersonal_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrpersonal_inactive' => 0,
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
