<?php

namespace Numbers\Users\Documents\Base\Model;
class FilesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Users\Documents\Base\Model\Files::class;

	/**
	 * Constructing object
	 *
	 * @param array $options
	 *		skip_db_object
	 *		skip_table_object
	 */
	public function __construct($options = []) {
		if (empty($options['skip_table_object'])) {
			$this->object_table_object = new $this->object_table_class($options);
		}
	}
	/**
	 * Tenant #
	 *
	 *
	 *
	 * {domain{tenant_id}}
	 *
	 * @var int Domain: tenant_id Type: integer
	 */
	public ?int $dt_file_tenant_id = NULL;

	/**
	 * File #
	 *
	 *
	 *
	 * {domain{file_id_sequence}}
	 *
	 * @var int Domain: file_id_sequence Type: bigserial
	 */
	public ?int $dt_file_id = null;

	/**
	 * Storage #
	 *
	 *
	 * {options_model{\Numbers\Users\Documents\Base\Model\Storages}}
	 * {domain{type_id}}
	 *
	 * @var int Domain: type_id Type: smallint
	 */
	public ?int $dt_file_storage_id = NULL;

	/**
	 * Catalog Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $dt_file_catalog_code = null;

	/**
	 * Organization #
	 *
	 *
	 *
	 * {domain{organization_id}}
	 *
	 * @var int Domain: organization_id Type: integer
	 */
	public ?int $dt_file_organization_id = NULL;

	/**
	 * File Name
	 *
	 *
	 *
	 * {domain{file_name}}
	 *
	 * @var string Domain: file_name Type: varchar
	 */
	public ?string $dt_file_name = null;

	/**
	 * File Extension
	 *
	 *
	 *
	 * {domain{file_extension}}
	 *
	 * @var string Domain: file_extension Type: varchar
	 */
	public ?string $dt_file_extension = null;

	/**
	 * File Mime
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $dt_file_mime = null;

	/**
	 * File Size
	 *
	 *
	 *
	 * {domain{file_size}}
	 *
	 * @var int Domain: file_size Type: integer
	 */
	public ?int $dt_file_size = NULL;

	/**
	 * File Path
	 *
	 *
	 *
	 * {domain{file_path}}
	 *
	 * @var string Domain: file_path Type: varchar
	 */
	public ?string $dt_file_path = null;

	/**
	 * Thumbnail Path
	 *
	 *
	 *
	 * {domain{file_path}}
	 *
	 * @var string Domain: file_path Type: varchar
	 */
	public ?string $dt_file_thumbnail_path = null;

	/**
	 * Language Code
	 *
	 *
	 *
	 * {domain{language_code}}
	 *
	 * @var string Domain: language_code Type: char
	 */
	public ?string $dt_file_language_code = null;

	/**
	 * Readonly
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_file_readonly = 0;

	/**
	 * Temporary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_file_temporary = 0;

	/**
	 * URL
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $dt_file_url = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $dt_file_inactive = 0;

	/**
	 * Inserted Datetime
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $dt_file_inserted_timestamp = null;

	/**
	 * Inserted User #
	 *
	 *
	 *
	 * {domain{user_id}}
	 *
	 * @var int Domain: user_id Type: bigint
	 */
	public ?int $dt_file_inserted_user_id = NULL;
}