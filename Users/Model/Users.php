<?php

namespace Numbers\Users\Users\Model;
class Users extends \Object\Table {
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
		'um_user_type_id' => ['name' => 'Type', 'domain' => 'type_id'],
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
		// inactive & hold
		'um_user_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'um_user_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
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
	 * @param int $user_id
	 * @return string
	 */
	public static function getUsernameWithAvatar(int $user_id) : string {
		if (isset(self::$cached_users_with_avatar[$user_id])) {
			return self::$cached_users_with_avatar[$user_id];
		} else {
			$result = '';
			$user = \Numbers\Users\Users\Model\Users::loadById($user_id);
			if (!empty($user['um_user_photo_file_id'])) {
				$result.= \HTML::img(['src' => \Numbers\Users\Documents\Base\Base::generateURL($user['um_user_photo_file_id'], true, ''), 'class' => 'navbar-menu-item-avatar-img', 'alt' => 'Avatar', 'width' => 25, 'height' => 25]) . ' ';
			}
			$result.= $user['um_user_name'];
			self::$cached_users_with_avatar[$user_id] = $result;
			return $result;
		}
	}

	/**
	 * Get username with avatar
	 *
	 * @param int $user_id
	 * @return string
	 */
	public static function getUsername(int $user_id) : string {
		if (isset(self::$cached_users[$user_id])) {
			return self::$cached_users[$user_id];
		} else {
			$user = \Numbers\Users\Users\Model\Users::loadById($user_id);
			$result = $user['um_user_name'];
			self::$cached_users[$user_id] = $result;
			return $result;
		}
	}
}