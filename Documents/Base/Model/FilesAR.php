<?php

namespace Numbers\Users\Documents\Base\Model;
class FilesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Users\Documents\Base\Model\Files::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['dt_file_tenant_id','dt_file_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $dt_file_tenant_id = NULL {
                        get => $this->dt_file_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_tenant_id', $value);
                            $this->dt_file_tenant_id = $value;
                        }
                    }

    /**
     * File #
     *
     *
     *
     * {domain{file_id_sequence}}
     *
     * @var int|null Domain: file_id_sequence Type: bigserial
     */
    public int|null $dt_file_id = null {
                        get => $this->dt_file_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_id', $value);
                            $this->dt_file_id = $value;
                        }
                    }

    /**
     * Storage #
     *
     *
     * {options_model{Numbers\Users\Documents\Base\Model\Storages}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $dt_file_storage_id = NULL {
                        get => $this->dt_file_storage_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_storage_id', $value);
                            $this->dt_file_storage_id = $value;
                        }
                    }

    /**
     * Amazon Profile #
     *
     *
     *
     * {domain{profile_id}}
     *
     * @var int|null Domain: profile_id Type: integer
     */
    public int|null $dt_file_dt_amzprofile_id = NULL {
                        get => $this->dt_file_dt_amzprofile_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_dt_amzprofile_id', $value);
                            $this->dt_file_dt_amzprofile_id = $value;
                        }
                    }

    /**
     * Catalog Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $dt_file_catalog_code = null {
                        get => $this->dt_file_catalog_code;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_catalog_code', $value);
                            $this->dt_file_catalog_code = $value;
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
    public int|null $dt_file_organization_id = NULL {
                        get => $this->dt_file_organization_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_organization_id', $value);
                            $this->dt_file_organization_id = $value;
                        }
                    }

    /**
     * File Name
     *
     *
     *
     * {domain{file_name}}
     *
     * @var string|null Domain: file_name Type: varchar
     */
    public string|null $dt_file_name = null {
                        get => $this->dt_file_name;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_name', $value);
                            $this->dt_file_name = $value;
                        }
                    }

    /**
     * File Extension
     *
     *
     *
     * {domain{file_extension}}
     *
     * @var string|null Domain: file_extension Type: varchar
     */
    public string|null $dt_file_extension = null {
                        get => $this->dt_file_extension;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_extension', $value);
                            $this->dt_file_extension = $value;
                        }
                    }

    /**
     * File Mime
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $dt_file_mime = null {
                        get => $this->dt_file_mime;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_mime', $value);
                            $this->dt_file_mime = $value;
                        }
                    }

    /**
     * File Size
     *
     *
     *
     * {domain{file_size}}
     *
     * @var int|null Domain: file_size Type: integer
     */
    public int|null $dt_file_size = NULL {
                        get => $this->dt_file_size;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_size', $value);
                            $this->dt_file_size = $value;
                        }
                    }

    /**
     * File Path
     *
     *
     *
     * {domain{file_path}}
     *
     * @var string|null Domain: file_path Type: varchar
     */
    public string|null $dt_file_path = null {
                        get => $this->dt_file_path;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_path', $value);
                            $this->dt_file_path = $value;
                        }
                    }

    /**
     * Thumbnail Path
     *
     *
     *
     * {domain{file_path}}
     *
     * @var string|null Domain: file_path Type: varchar
     */
    public string|null $dt_file_thumbnail_path = null {
                        get => $this->dt_file_thumbnail_path;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_thumbnail_path', $value);
                            $this->dt_file_thumbnail_path = $value;
                        }
                    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $dt_file_language_code = null {
                        get => $this->dt_file_language_code;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_language_code', $value);
                            $this->dt_file_language_code = $value;
                        }
                    }

    /**
     * Readonly
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_file_readonly = 0 {
                        get => $this->dt_file_readonly;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_readonly', $value);
                            $this->dt_file_readonly = $value;
                        }
                    }

    /**
     * Temporary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_file_temporary = 0 {
                        get => $this->dt_file_temporary;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_temporary', $value);
                            $this->dt_file_temporary = $value;
                        }
                    }

    /**
     * URL
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $dt_file_url = null {
                        get => $this->dt_file_url;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_url', $value);
                            $this->dt_file_url = $value;
                        }
                    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $dt_file_inactive = 0 {
                        get => $this->dt_file_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_inactive', $value);
                            $this->dt_file_inactive = $value;
                        }
                    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $dt_file_inserted_timestamp = null {
                        get => $this->dt_file_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_inserted_timestamp', $value);
                            $this->dt_file_inserted_timestamp = $value;
                        }
                    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $dt_file_inserted_user_id = NULL {
                        get => $this->dt_file_inserted_user_id;
                        set {
                            $this->setFullPkAndFilledColumn('dt_file_inserted_user_id', $value);
                            $this->dt_file_inserted_user_id = $value;
                        }
                    }
}
