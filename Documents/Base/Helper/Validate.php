<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Helper;

class Validate
{
    /**
     * Image extensions
     */
    public const IMAGE_EXTENSIONS = 'bmp, gif, jpg, jpeg, tif, tiff, png';

    /**
     * Validation extensions
     *
     * @var array
     */
    public static $validation_extensions = [
        'images' => ['bmp', 'gif', 'jpg', 'jpeg', 'tif', 'tiff', 'png'],
        'documents' => ['pdf', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx', 'xml'],
        'audio' => ['mp3', 'wav'],
        'archives' => ['zip', 'gz'],
        'csv' => ['csv'],
        'pdf' => ['pdf'],
        'txt' => ['txt'],
    ];

    /**
     * Validate uploaded file
     *
     * @param array $file
     * @param type $types
     * @param array $options
     * @return array
     */
    public function validateUploadedFile(array $file, array $types = [], array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => []
        ];
        $file_error_types = array(
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
            3 => 'The uploaded file was only partially uploaded.',
            4 => 'No file was uploaded.',
            6 => 'Missing a temporary folder.',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );
        /*
        if (!is_uploaded_file($file['tmp_name'])) {
            if (!\Application::get('flag.global.__ajax')) {
                $result['error'][] = 'Error occured when uploading file!';
                return $result;
            }
        }
        */
        if ($file['size'] == 0) {
            $result['error'][] = 'Error occured when uploading file!';
            return $result;
        }
        if ($file['error']) {
            $result['error'][] = $file_error_types[$file['error']];
            return $result;
        }
        if (!empty($types)) {
            $all_extensions = [];
            foreach ($types as $v) {
                $all_extensions = array_merge($all_extensions, self::$validation_extensions[$v]);
            }
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_extension = trim(strtolower($file_extension));
            if (!in_array($file_extension, $all_extensions)) {
                $result['error'][] = 'You can not upload files with this extension!';
                return $result;
            }
        }
        $result['success'] = true;
        return $result;
    }
}
