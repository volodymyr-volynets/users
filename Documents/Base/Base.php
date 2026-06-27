<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base;

use Numbers\Users\Documents\Base\Model\Catalogs;
use Numbers\Users\Documents\Base\Model\Files;
use Numbers\Users\Documents\Base\Model\Storages;
use Numbers\Users\Documents\Drivers\Amazon\Model\Profiles;
use Helper\File;

class Base
{
    /**
     * Fetch primary catalog
     *
     * @param int $organization_id
     * @return array
     */
    public function fetchPrimaryCatalog(int $organization_id): array
    {
        $result = Catalogs::getStatic([
            'where' => [
                'dt_catalog_organization_id' => $organization_id,
                'dt_catalog_primary' => 1
            ],
            'pk' => null,
        ]);
        return $result[0] ?? [];
    }

    /**
     * Fetch primary catalog
     *
     * @param string $dt_catalog_code
     * @return array
     */
    public function fetchCatalogByCode(string $dt_catalog_code): array
    {
        return Catalogs::getSingleStatic([
            'where' => [
                'dt_catalog_tenant_id' => \Tenant::id(),
                'dt_catalog_code' => $dt_catalog_code,
            ]
        ]);
    }

    /**
     * Upload
     *
     * @param array $file
     * @param array $catalog
     * @param array $options
     *      bool encrypt
     *      string encryption_key
     * @return array
     */
    public function upload(array $file, array $catalog, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'file_id' => null,
            'file_name' => null,
            'file_hash' => null,
            'file_url' => '',
        ];
        // get next sequence number
        $file_save_model = new Files();
        $file['file_id'] = $file_save_model->sequence('dt_file_id', 'nextval', \Tenant::id());
        // load storage
        $storages = Storages::getStatic();
        $storage_id = 100;
        if (!empty($catalog['dt_catalog_dt_amzprofile_id'])) {
            $storage_id = 200;
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $profile = Profiles::getSingleStatic([
                'where' => [
                    'dt_amzprofile_id' => $catalog['dt_catalog_dt_amzprofile_id']
                ]
            ]);
            array_key_prefix_and_suffix($profile, 'dt_amzprofile_', '', true);
            $file_upload_model = new $class($profile);
        } else {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $file_upload_model = new $class($storage);
        }
        // if we need to rescale
        if (!empty($file['__image_properties']['image_rescale'])) {
            $newdim = explode('x', $file['__image_properties']['image_rescale']);
            $image = imagecreatefromstring(file_get_contents($file['tmp_name']));
            $newimage = imagecreatetruecolor($newdim[0], $newdim[1]);
            imagecopyresampled($newimage, $image, 0, 0, 0, 0, $newdim[0], $newdim[1], imagesx($image), imagesy($image));
            imagepng($newimage, $file['tmp_name']);
            // now we need to update
            $file['type'] = 'image/png';
            $file['size'] = filesize($file['tmp_name']);
            $file['name'] = pathinfo($file['name'], PATHINFO_FILENAME) . '.png';
        }
        $file_upload_result = $file_upload_model->upload($file, $catalog, $options);
        if (!$file_upload_result['success']) {
            $result['error'] = array_merge($result['error'], $file_upload_result['error']);
            return $result;
        }
        // create database record
        $save = [
            'dt_file_id' => $file['file_id'],
            'dt_file_storage_id' => $storage_id,
            'dt_file_dt_amzprofile_id' => $catalog['dt_catalog_dt_amzprofile_id'] ?? null,
            'dt_file_catalog_code' => $catalog['dt_catalog_code'],
            'dt_file_organization_id' => $catalog['dt_catalog_organization_id'],
            'dt_file_name' => $file['name'],
            'dt_file_extension' => pathinfo($file['name'], PATHINFO_EXTENSION),
            'dt_file_mime' => $file['type'],
            'dt_file_size' => $file['size'],
            'dt_file_path' => $file_upload_result['path'],
            'dt_file_thumbnail_path' => $file_upload_result['thumbnail_path'],
            'dt_file_language_code' => \I18n::$options['language_code'] ?? null,
            'dt_file_readonly' => $catalog['dt_catalog_readonly'],
            'dt_file_temporary' => $catalog['dt_catalog_temporary'],
            'dt_file_hash' => $file_upload_result['hash'] ?? null,
            'dt_file_inactive' => 0
        ];
        $save_result = $file_save_model->collection()->merge($save);
        if (!$save_result['success']) {
            $result['error'] = array_merge($result['error'], $save_result['error']);
            return $result;
        }
        $result['success'] = true;
        $result['file_id'] = $file['file_id'];
        $result['file_name'] = $file['name'];
        $result['file_hash'] = $file_upload_result['hash'] ?? null;
        if (!empty($file_upload_result['hash'])) {
            $result['file_url'] = 'generate url';
        }
        return $result;
    }

    /**
     * Upload (string)
     *
     * @param array $file
     * @param array $catalog
     * @param array $options
     *      bool encrypt
     *      string encryption_key
     * @return array
     */
    public function uploadString(array $file, array $catalog, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'file_id' => null,
            'file_name' => null,
            'file_hash' => null,
            'file_url' => '',
        ];
        // get next sequence number
        $file_save_model = new Files();
        $file['file_id'] = $file_save_model->sequence('dt_file_id', 'nextval', \Tenant::id());
        // load storage
        $storages = Storages::getStatic();
        $storage_id = 100;
        if (!empty($catalog['dt_catalog_dt_amzprofile_id'])) {
            $storage_id = 200;
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $profile = Profiles::getSingleStatic([
                'where' => [
                    'dt_amzprofile_id' => $catalog['dt_catalog_dt_amzprofile_id']
                ]
            ]);
            array_key_prefix_and_suffix($profile, 'dt_amzprofile_', '', true);
            $file_upload_model = new $class($profile);
        } else {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $file_upload_model = new $class($storage);
        }
        // save file to local folder
        $file['tmp_name'] = File::generateTempFileName(pathinfo($file['name'], PATHINFO_EXTENSION), true);
        file_put_contents($file['tmp_name'], $file['file_string']);
        $file['flag_system_generated'] = true;
        // if we need to rescale
        if (!empty($file['__image_properties']['image_rescale'])) {
            $newdim = explode('x', $file['__image_properties']['image_rescale']);
            $image = imagecreatefromstring($file['']);
            $newimage = imagecreatetruecolor($newdim[0], $newdim[1]);
            imagecopyresampled($newimage, $image, 0, 0, 0, 0, $newdim[0], $newdim[1], imagesx($image), imagesy($image));
            imagepng($newimage, $file['tmp_name']);
            // now we need to update
            $file['type'] = 'image/png';
            $file['size'] = filesize($file['tmp_name']);
            $file['name'] = pathinfo($file['name'], PATHINFO_FILENAME) . '.png';
        }
        // upload through driver
        $file_upload_result = $file_upload_model->upload($file, $catalog, $options);
        if (!$file_upload_result['success']) {
            $result['error'] = array_merge($result['error'], $file_upload_result['error']);
            return $result;
        }
        // create database record
        $save = [
            'dt_file_id' => $file['file_id'],
            'dt_file_storage_id' => $storage_id,
            'dt_file_dt_amzprofile_id' => $catalog['dt_catalog_dt_amzprofile_id'] ?? null,
            'dt_file_catalog_code' => $catalog['dt_catalog_code'],
            'dt_file_organization_id' => $catalog['dt_catalog_organization_id'],
            'dt_file_name' => $file['name'],
            'dt_file_extension' => pathinfo($file['name'], PATHINFO_EXTENSION),
            'dt_file_mime' => $file['type'],
            'dt_file_size' => $file['size'],
            'dt_file_path' => $file_upload_result['path'],
            'dt_file_thumbnail_path' => $file_upload_result['thumbnail_path'],
            'dt_file_language_code' => \I18n::$options['language_code'] ?? null,
            'dt_file_readonly' => $catalog['dt_catalog_readonly'],
            'dt_file_temporary' => $catalog['dt_catalog_temporary'],
            'dt_file_hash' => $file_upload_result['hash'] ?? null,
            'dt_file_inactive' => 0
        ];
        $save_result = $file_save_model->collection()->merge($save);
        if (!$save_result['success']) {
            $result['error'] = array_merge($result['error'], $save_result['error']);
            return $result;
        }
        $result['success'] = true;
        $result['file_id'] = $file['file_id'];
        $result['file_name'] = $file['name'];
        $result['file_hash'] = $file_upload_result['hash'] ?? null;
        return $result;
    }

    /**
     * Delete
     *
     * @param int $file_id
     * @param array $options
     *      bool erase
     * @return array
     */
    public function delete(int $file_id, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
        ];
        $model = new Files();
        $file_data = $model->get([
            'where' => [
                'dt_file_id' => $file_id,
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        // delete in driver
        $storages = Storages::getStatic();
        $storage_id = $file_data['dt_file_storage_id'];
        if (!empty($file_data['dt_file_dt_amzprofile_id'])) {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $profile = Profiles::getSingleStatic([
                'where' => [
                    'dt_amzprofile_id' => $file_data['dt_file_dt_amzprofile_id']
                ]
            ]);
            array_key_prefix_and_suffix($profile, 'dt_amzprofile_', '', true);
            $file_upload_model = new $class($profile);
        } else {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $file_upload_model = new $class($storage);
        }
        $file_upload_result = $file_upload_model->delete($file_data);
        if (!$file_upload_result['success']) {
            $result['error'] = array_merge($result['error'], $file_upload_result['error']);
            return $result;
        }
        // delete record
        if (empty($options['erase'])) {
            $delete_result = $model->collection()->merge($file_data, [
                'flag_delete_row' => true
            ]);
        } else {
            // set erased flag
            $file_data['dt_file_erased'] = 1;
            $delete_result = $model->collection()->merge($file_data);
        }
        if (!$delete_result['success']) {
            $result['error'] = array_merge($result['error'], $delete_result['error']);
            return $result;
        }
        $result['success'] = true;
        return $result;
    }

    /**
     * Download
     *
     * @param int $file_id
     * @param array $options
     * @return mixed
     */
    public function download(int $file_id, array $options = [])
    {
        $model = new Files();
        if (!empty($options['file_data'])) {
            $file_data = [
                0 => $options['file_data']
            ];
        } else {
            $file_data = $model->get([
                'where' => [
                    'dt_file_id' => $file_id,
                ],
                'pk' => null,
                'cache_memory' => true,
            ]);
        }
        if (empty($file_data[0])) {
            return '';
        }
        // delete in driver
        $storages = Storages::getStatic();
        $storage = $storages[$file_data[0]['dt_file_storage_id']];
        $storage_id = $file_data[0]['dt_file_storage_id'];
        if (!empty($file_data[0]['dt_file_dt_amzprofile_id'])) {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $profile = Profiles::getSingleStatic([
                'where' => [
                    'dt_amzprofile_id' => $file_data[0]['dt_file_dt_amzprofile_id']
                ]
            ]);
            array_key_prefix_and_suffix($profile, 'dt_amzprofile_', '', true);
            $file_upload_model = new $class($profile);
        } else {
            $storage = $storages[$storage_id];
            $class = $storage['submodule'];
            $file_upload_model = new $class($storage);
        }
        return $file_upload_model->download($file_data[0], $options);
    }

    /**
     * Generate URL
     *
     * @param int $file_id
     * @param bool $thumbnail
     * @param string $name
     * @param array $options
     *      int key_id
     * @return string
     */
    public static function generateURL(int $file_id, bool $thumbnail = false, string $name = '', array $options = []): string
    {
        $crypt = new \Crypt();
        if (!empty($name)) {
            $name = urlencode($name);
        }
        return \Request::buildURL('/Numbers/Users/Documents/Base/Controller/GetFile/_Index/' . $name, [
            'token' => urldecode($crypt->tokenCreate($file_id, $thumbnail ? 'thumbnail.view' : 'file.view', $options))
        ]);
    }

    /**
     * Generate URL View
     *
     * @param int $file_id
     * @param bool $thumbnail
     * @param string $name
     * @param array $options
     *      int key_id
     * @return string
     */
    public static function generateURLView(int $file_id, bool $thumbnail = false, string $name = '', array $options = []): string
    {
        $crypt = new \Crypt();
        if (!empty($name)) {
            $name = urlencode($name);
        }
        return \Request::buildURL('/Numbers/Users/Documents/Base/Controller/GetFile/_View/' . $name, [
            'token' => urldecode($crypt->tokenCreate($file_id, $thumbnail ? 'thumbnail.view' : 'file.view', $options))
        ]);
    }

    /**
     * Generate URL in the cloud
     *
     * @param int $file_id
     * @param bool $thumbnail
     * @param string $name
     * @return string
     */
    public static function generateURLCloud(int $file_id, bool $thumbnail = false, string $name = ''): string
    {
        $model = new Base();
        return $model->download($file_id, ['return_aws_url_only' => true, 'thumbnail' => $thumbnail]);
    }

    /**
     * Generate open access URL
     *
     * @param int $file_id
     * @param bool $thumbnail
     * @return string
     */
    public static function generateOpenAccessURL(int $file_id, bool $thumbnail = false): string
    {
        // todo check if AWS and give direct AWS url
        $file = Files::getSingleStatic([
            'where' => [
                'dt_file_tenant_id' => \Tenant::id(),
                'dt_file_id' => $file_id,
            ]
        ]);
        $hash = $file['dt_file_hash'];
        if ($thumbnail) {
            $hash .= '.thumbnail.png';
        } else {
            $hash .= '.' . $file['dt_file_extension'];
        }
        return \Request::host(). 'Numbers/Users/Documents/Base/Controller/GetFile/_OpenAccess/' . $hash;
    }

    /**
     * Generate Icon URL
     *
     * @param int $file_id
     * @param bool $thumbnail
     * @return string
     */
    public static function generateIconURL(string $text, int $width, int $height): string
    {
        $crypt = new \Crypt();
        return \Request::buildURL('/Numbers/Users/Documents/Base/Controller/GetFile/_Icon', [
            'token' => urldecode($crypt->tokenCreate($text, 'icon.view')),
            'text' => $text,
            'width' => $width,
            'height' => $height
        ]);
    }
}
