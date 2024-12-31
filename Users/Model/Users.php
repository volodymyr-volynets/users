<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Numbers\Users\Documents\Base\Base;
use Numbers\Users\Users\Model\User\Types;
use Object\Content\Messages;
use Object\Query\Builder;
use Object\Table;

class Users extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Users';
    public $schema;
    public $name = 'um_users';
    public $pk = ['um_user_tenant_id', 'um_user_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_user_';
    public $columns = [
        'um_user_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id_sequence'],
        'um_user_code' => ['name' => 'User Number', 'domain' => 'group_code', 'null' => true],
        'um_user_type_id' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => Types::class],
        'um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_user_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
        // personal information
        'um_user_title' => ['name' => 'Title', 'domain' => 'personal_title', 'null' => true],
        'um_user_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
        'um_user_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
        // contact
        'um_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_user_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
        'um_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'um_user_numeric_phone' => ['name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
        'um_user_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
        'um_user_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
        'um_user_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
        'um_user_alternative_contact' => ['name' => 'Alternative Contact', 'domain' => 'description', 'null' => true],
        // login
        'um_user_login_enabled' => ['name' => 'Login Enabled', 'type' => 'boolean'],
        'um_user_login_username' => ['name' => 'Username', 'domain' => 'login', 'null' => true],
        'um_user_login_password' => ['name' => 'Password', 'domain' => 'password', 'null' => true],
        'um_user_login_last_set' => ['name' => 'Last Set', 'type' => 'date', 'null' => true],
        // photo
        'um_user_photo_file_id' => ['name' => 'Photo File #', 'domain' => 'file_id', 'null' => true],
        'um_user_about_nickname' => ['name' => 'About Nickname', 'domain' => 'name', 'null' => true],
        'um_user_about_description' => ['name' => 'About Description', 'domain' => 'description', 'null' => true],
        // operating country / province / currency code & type
        'um_user_operating_country_code' => ['name' => 'Operating Country Code', 'domain' => 'country_code', 'null' => true],
        'um_user_operating_province_code' => ['name' => 'Operating Province Code', 'domain' => 'province_code', 'null' => true],
        'um_user_operating_currency_code' => ['name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true],
        'um_user_operating_currency_type' => ['name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true],
        // tracking
        'um_user_channel' => ['name' => 'Channel', 'domain' => 'name', 'null' => true],
        'um_user_send_emails' => ['name' => 'Send Emails', 'type' => 'boolean', 'default' => 1],
        'um_user_send_sms' => ['name' => 'Send SMS', 'type' => 'boolean'],
        'um_user_send_postal' => ['name' => 'Send Postal Mail', 'type' => 'boolean'],
        'um_user_email_confirmed' => ['name' => 'Email Confirmed', 'type' => 'boolean'],
        'um_user_phone_confirmed' => ['name' => 'Phone Confirmed', 'type' => 'boolean'],
        // inactive & hold
        'um_user_hold' => ['name' => 'Hold', 'type' => 'boolean'],
        'um_user_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $column_settings = [
        'um_user_login_password' => [PASSWORDABLE],
        'um_user_name_assembled' => [GENERABLE, 'concat' => [' ', 'um_user_title', 'um_user_first_name', 'um_user_last_name'], READ_ONLY],
        'um_user_login_username' => [READ_IF_SET],
        'um_user_email' => [GENERABLE, 'method' => 'generatableUmUserEmail'],
        'um_user_hold' => [CASTABLE, 'php_type' => 'bool'],
        'um_user_inactive' => [CASTABLE, 'php_type' => 'bool'],
        'um_user_login_enabled' => [CASTABLE, 'php_type' => 'bool'],
        'um_user_login_last_set' => [FORMATABLE, 'format' => 'date', 'options' => ['format' => 'm/d/Y']],
        'um_user_phone' => [FORMATABLE, 'format' => '\Object\Validator\Phone::format'],
    ];
    public $constraints = [
        'um_users_pk' => ['type' => 'pk', 'columns' => ['um_user_tenant_id', 'um_user_id']],
        'um_user_code_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_code']],
        'um_user_email_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_email']],
        'um_user_numeric_phone_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_numeric_phone']],
        'um_user_login_username_un' => ['type' => 'unique', 'columns' => ['um_user_tenant_id', 'um_user_login_username']],
        'um_user_type_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_user_type_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Types',
            'foreign_columns' => ['um_usrtype_id']
        ],
        'um_user_title_fk' => [
            'type' => 'fk',
            'columns' => ['um_user_tenant_id', 'um_user_title'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Titles',
            'foreign_columns' => ['um_usrtitle_tenant_id', 'um_usrtitle_name']
        ],
    ];
    public $indexes = [
        'um_users_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_user_code', 'um_user_name', 'um_user_phone', 'um_user_email', 'um_user_company', 'um_user_login_username']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_user_tenant_id' => 'wg_audit_tenant_id',
            'um_user_id' => 'wg_audit_user_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'um_user_name' => 'name',
        'um_user_company' => 'name',
        'um_user_photo_file_id' => 'photo_id',
        'um_user_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_user_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Users\Users\Model\Users::optionsActive';
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $addresses = [
        'map' => [
            'um_user_tenant_id' => 'wg_address_tenant_id',
            'um_user_id' => 'wg_address_user_id'
        ]
    ];

    public $attributes = [
        'map' => [
            'um_user_tenant_id' => 'wg_attribute_tenant_id',
            'um_user_id' => 'wg_attribute_user_id'
        ]
    ];

    public $comments = [
        'map' => [
            'um_user_tenant_id' => 'wg_comment_tenant_id',
            'um_user_id' => 'wg_comment_user_id'
        ]
    ];

    public $documents = [
        'map' => [
            'um_user_tenant_id' => 'wg_document_tenant_id',
            'um_user_id' => 'wg_document_user_id'
        ]
    ];

    public $tags = [
        'map' => [
            'um_user_tenant_id' => 'wg_tag_tenant_id',
            'um_user_id' => 'wg_tag_user_id'
        ]
    ];

    public $unique = [
        'um_user_numeric_phone' => 'um_user_numeric_phone_un',
        'um_user_email' => 'um_user_email_un'
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    public $triggers = [];

    /**
     * Cached users with avatar
     *
     * @var array
     */
    public static $cached_users_with_avatar = [];
    public static $cached_users = [];

    /**
     * Get username with avatar
     *
     * @param int|null $user_id
     * @return string
     */
    public static function getUsernameWithAvatar($user_id): string
    {
        if (empty($user_id)) {
            return '';
        }
        if (isset(self::$cached_users_with_avatar[$user_id])) {
            return self::$cached_users_with_avatar[$user_id];
        } else {
            $result = '';
            $user = Users::loadByIdStatic($user_id);
            if (empty($user)) {
                return 'Unkown (Not Found)';
            }
            if (!empty($user['um_user_photo_file_id'])) {
                $result .= \HTML::img(['src' => Base::generateURL($user['um_user_photo_file_id'], true, ''), 'class' => 'navbar-menu-item-avatar-img', 'alt' => 'Avatar', 'width' => 25, 'height' => 25]) . ' ';
            }
            $result .= $user['um_user_name'];
            if ($user['um_user_inactive'] == 1) {
                $result .= ' ' . Messages::INFO_INACTIVE;
            }
            self::$cached_users_with_avatar[$user_id] = $result;
            return $result;
        }
    }

    /**
     * Get username
     *
     * @param int $user_id
     * @param array $options
     *		boolean include_id
     * @return string
     */
    public static function getUsername(?int $user_id, array $options = []): string
    {
        if ($user_id === null) {
            return 'Anonymous';
        }
        if (isset(self::$cached_users[$user_id])) {
            return self::$cached_users[$user_id];
        } else {
            $user = Users::loadByIdStatic($user_id);
            if (empty($user)) {
                return 'Unkown (Not Found)';
            }
            $result = $user[$options['column'] ?? 'um_user_name'];
            if (empty($result)) {
                $result = $user['um_user_name'];
            }
            if ($user['um_user_inactive'] == 1) {
                $result .= ' ' . Messages::INFO_INACTIVE;
            }
            // if we need to include id
            if (!empty($options['include_id'])) {
                $result .= ' (' . $user_id . ')';
            }
            self::$cached_users[$user_id] = $result;
            return $result;
        }
    }

    /**
     * Roles relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationUsersRoles(array & $data, array $options)
    {
        Roles::queryAssemblerStatic($data, $options)
            ->pivot([new User\Roles(), 'pivotUsersRolesMap'], 'PivotUsersRolesMap', null, $options, [
                'um_usrrol_user_id' => array_column_unique($data, 'um_user_id'),
            ])
            ->query()
            ->pk(['um_usrrol_user_id', 'um_usrrol_role_id'])
            ->assign();
        //->assign(function($v, $k) use ($data, $options) {
        //	$data[$k][$options['relation_key']] = $v;
        //});
    }

    /**
     * Teams relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationTeams(array & $data, array & $options)
    {

    }

    /**
     * Groups relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationGroups(array & $data, array & $options)
    {

    }

    /**
     * Organizations relation
     *
     * @param array $data
     * @param array $options
     */
    public function relationOrganizations(array & $data, array & $options)
    {

    }

    /**
     * Scope active
     *
     * @param Builder & $query
     * @param array $options
     */
    public function scopeActiveGlobal(Builder & $query, array $options = [])
    {
        $query->where('AND', ['um_user_inactive', '=', 0]);
    }

    /**
     * Scope inactive
     *
     * @param Builder & $query
     * @param array $options
     */
    public function scopeInactive(Builder & $query, array $options = [])
    {
        $query->where('AND', ['um_user_inactive', '=', 1]);
    }

    /**
     * @param UsersAR $object
     */
    public function generatableUmUserEmail(UsersAR & $object)
    {
        if (str_starts_with($object->um_user_email ?? '', 'duplicate_')) {
            $temp = explode('_', $object->um_user_email);
            unset($temp[0], $temp[1]);
            $object->um_user_email = implode('_', $temp);
        }
    }
}
