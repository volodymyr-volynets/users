<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Drivers\LocalFolder;

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
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
        $this->options['dir'] = rtrim($this->options['dir'], '/') . '/';
    }

    /**
     * Upload
     *
     * @param array $file
     * @return array
     */
    public function upload(array $file, array $catalog): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'path' => null,
            'thumbnail_path' => null
        ];
        $dir = '';
        $application_structure = \Application::get('application.structure');
        if (!empty($application_structure['db_multiple'])) {
            $dir .= $application_structure['settings']['db']['default']['dbname'] . '/';
        }
        $dir .= \Tenant::id() . '/' . strtolower($catalog['dt_catalog_code']) . '/';
        // create directory is does not exists
        if (!file_exists($this->options['dir'] . $dir)) {
            if (!File::mkdir($this->options['dir'] . $dir)) {
                $result['error'][] = 'Could not create file directory!';
                return $result;
            }
        }
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
            $thumbnail_destination = $dir . $file['file_id'] . '.thumbnail.png';
            if (!imagepng($new_image, $this->options['dir'] . $thumbnail_destination)) {
                $result['error'][] = 'Could not create thumbnail!';
                return $result;
            }
            imagedestroy($thumbnail_image);
            imagedestroy($new_image);
            $result['thumbnail_path'] = $thumbnail_destination;
        }
        // move uploaded file
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $destination = $dir . $file['file_id'] . '.' . $extension;
        // uploaded file we move
        if (empty($file['flag_system_generated'])) {
            if (!move_uploaded_file($file['tmp_name'], $this->options['dir'] . $destination)) {
                $result['error'][] = 'Could not move uploaded file!';
                return $result;
            }
        } else {
            // system generated file we copy
            if (!rename($file['tmp_name'], $this->options['dir'] . $destination)) {
                $result['error'][] = 'Could not rename uploaded file!';
                return $result;
            }
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
        if (!File::delete($this->options['dir'] . $file['dt_file_path'])) {
            $result['error'][] = 'Could not delete file!';
        } else {
            // delete thubnail
            if (!empty($file['dt_file_thumbnail_path'])) {
                File::delete($this->options['dir'] . $file['dt_file_thumbnail_path']);
            }
            $result['success'] = true;
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
     * @return mixed
     */
    public function download(array $file, array $options = [])
    {
        if (empty($options['thumbnail'])) {
            $body = file_get_contents($this->options['dir'] . $file['dt_file_path']);
            $mime = $file['dt_file_mime'];
        } else {
            $body = file_get_contents($this->options['dir'] . $file['dt_file_thumbnail_path']);
            $mime = 'image/png';
        }
        // return
        if (!empty($options['return'])) {
            return $body;
        }
        \Layout::renderAs($body, $mime);
    }
}
