<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Drivers\Amazon;

use Aws\S3\S3Client;
use Helper\File;

class Base implements \Numbers\Users\Documents\Base\Interface2\Base
{
    /**
     * Options
     *
     * @var array
     */
    public $options;

    /**
     * S3 connection
     *
     * @var object
     */
    private $s3;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
        // Instantiate an Amazon S3 client.
        $this->s3 = new S3Client([
            'version' => 'latest',
            'region'  => $options['region'],
            'credentials' => [
                'key'    => $options['aws_access_key_id'],
                'secret' => $options['aws_secret_access_key'],
            ],
        ]);
    }

    /**
     * Upload
     *
     * @param array $file
     * @param array $catalog
     * @param array $options
     *      boolean encrypt
     *      string encryption_key
     * @return array
     */
    public function upload(array $file, array $catalog, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'path' => null,
            'thumbnail_path' => null,
            'hash' => null,
        ];
        $dir = '';
        $application_structure = \Application::get('application.structure');
        if (!empty($application_structure['db_multiple'])) {
            $dir .= $application_structure['settings']['db']['default']['dbname'] . '/';
        }
        $dir .= \Tenant::id() . '/' . strtolower($catalog['dt_catalog_code']) . '/';
        // upload file to S3
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $salt = \Application::get('crypt.default.salt') ?? random_int(1000, 9999);
        $filename = $file['file_id'] . '_' . sha1($dir . $file['file_id'] . '.' . $extension . '_' . $salt);
        $result['hash'] = $filename;
        $destination = $dir . $filename . '.' . $extension;
        // encrypt
        if (!empty($options['encrypt'])) {
            $crypt = new \Crypt();
            $crypt_destination_filename = File::generateTempName();
            $crypt->encryptFile($file['tmp_name'], $crypt_destination_filename, $options['encryption_key'] ?? null);
            $file['tmp_name'] = $crypt_destination_filename;
        }
        // save to bucket
        try {
            $s3_result = $this->s3->putObject([
                'Bucket' => $this->options['bucket'],
                'Key' => $destination,
                'Body' => file_get_contents($file['tmp_name']),
            ]);
            // create thumbnail
            if (!empty($file['__image_properties']['thumbnail_size'])) {
                $thumbnail_image = imagecreatefromstring(file_get_contents($file['tmp_name']));
                imagealphablending($thumbnail_image, false);
                imagesavealpha($thumbnail_image, true);
                $thumbnail_dimansions = explode('x', $file['__image_properties']['thumbnail_size']);
                $new_image = imagecreatetruecolor($thumbnail_dimansions[0], $thumbnail_dimansions[1]);
                imagealphablending($new_image, false);
                imagesavealpha($new_image, true);
                $transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
                imagefilledrectangle($new_image, 0, 0, (int) $thumbnail_dimansions[0], (int) $thumbnail_dimansions[1], $transparent);
                imagecopyresampled($new_image, $thumbnail_image, 0, 0, 0, 0, (int) $thumbnail_dimansions[0], (int) $thumbnail_dimansions[1], imagesx($thumbnail_image), imagesy($thumbnail_image));
                // render image into buffer
                ob_start();
                imagepng($new_image);
                $image_data = ob_get_contents();
                ob_end_clean();
                // upload
                $thumbnail_destination = $dir . $filename . '.thumbnail.png';
                $s3_result = $this->s3->putObject([
                    'Bucket' => $this->options['bucket'],
                    'Key' => $thumbnail_destination,
                    'Body' => $image_data,
                ]);
                $result['thumbnail_path'] = $thumbnail_destination;
            }
        } catch (\Exception $e) {
            $result['error'][] = $e->getMessage();
            return $result;
        }
        $result['success'] = true;
        $result['path'] = $destination;
        return $result;
    }

    /**
     * Delete
     *
     * @param array $file
     * @return array
     */
    public function delete(array $file): array
    {
        $result = [
            'success' => false,
            'error' => [],
        ];
        try {
            // delete main file first
            $this->s3->deleteObject([
                'Bucket' => $this->options['bucket'],
                'Key'    => $file['dt_file_path']
            ]);
            // delete thubnail
            if (!empty($file['dt_file_thumbnail_path'])) {
                $this->s3->deleteObject([
                    'Bucket' => $this->options['bucket'],
                    'Key'    => $file['dt_file_thumbnail_path']
                ]);
            }
            $result['success'] = true;
        } catch (\Exception $e) {
            $result['error'][] = $e->getMessage();
        }
        return $result;
    }

    /**
     * Download
     *
     * @param array $file
     * @param array $options
     *	boolean return
     *	boolean thumbnail
     *. boolean return_aws_url_only
     * @return mixed
     */
    public function download(array $file, array $options = [])
    {
        try {
            if (empty($options['thumbnail'])) {
                $path = $file['dt_file_path'];
            } else {
                $path = $file['dt_file_thumbnail_path'];
            }
            // if we a looking for url only
            if (!empty($options['return_aws_url_only'])) {
                return $this->s3->getObjectUrl($this->options['bucket'], $path);
            }
            $result = $this->s3->getObject([
                'Bucket' => $this->options['bucket'],
                'Key'    => $path
            ]);
            // if we need to decrypt
            if (!empty($options['key_id'])) {
                $crypt_source_filename = File::generateTempName();
                file_put_contents($crypt_source_filename, $result['Body']);
                $crypt_destination_filename = File::generateTempName();
                $crypt = new \Crypt();
                $encryption_key = \Session::get('numbers.c0.encryption.' . $options['key_id'] . '.encrypted');
                if (!isset($encryption_key)) {
                    throw new \Exception('Wrong key_id.');
                }
                $encryption_key = $crypt->decrypt(base64_decode($encryption_key));
                $crypt->decryptFile($crypt_source_filename, $crypt_destination_filename, $encryption_key);
                $result['Body'] = file_get_contents($crypt_destination_filename);
                File::delete($crypt_source_filename);
                File::delete($crypt_destination_filename);
            }
            // return
            if (!empty($options['return'])) {
                return $result['Body'];
            }
            // saved_content_type
            if (!empty($options['saved_content_type'])) {
                \Layout::renderAs($result['Body'], $file['dt_file_mime']);
            } else {
                \Layout::renderAs($result['Body'], $result['ContentType']);
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}
