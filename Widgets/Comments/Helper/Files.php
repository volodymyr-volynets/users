<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Comments\Helper;

use Numbers\Users\Documents\Base\Base;

class Files
{
    /**
     * Generate file urls (extended)
     *
     * @param array $data
     * @param string $column_prefix
     * @param int $max_files
     * @return string
     */
    public static function generateURLS(array $data, string $column_prefix, int $max_files): string
    {
        $result = '';
        $files = [];
        for ($i = 1; $i <= $max_files; $i++) {
            if (!empty($data[$column_prefix . $i])) {
                $files[] = $data[$column_prefix . $i];
            } else {
                break;
            }
        }
        if (!empty($files)) {
            $files = \Numbers\Users\Documents\Base\Model\Files::getStatic([
                'where' => [
                    'dt_file_id' => $files
                ],
                'pk' => ['dt_file_id']
            ]);
            foreach ($files as $k => $v) {
                $result .= \HTML::a(['href' => Base::generateURL($k, false, $v['dt_file_name']), 'target' => '_blank', 'value' => \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name']]);
                $result .= '<br/>';
            }
        }
        return $result;
    }

    /**
     * Generate file urls (only links)
     *
     * @param array $data
     * @param string $column_prefix
     * @param int $max_files
     * @return array
     */
    public static function generateOnlyURLS(array $data, string $column_prefix, int $max_files): array
    {
        $result = [];
        $files = [];
        for ($i = 1; $i <= $max_files; $i++) {
            if (!empty($data[$column_prefix . $i])) {
                $files[] = $data[$column_prefix . $i];
            } else {
                break;
            }
        }
        if (!empty($files)) {
            $files = \Numbers\Users\Documents\Base\Model\Files::getStatic([
                'where' => [
                    'dt_file_id' => $files
                ],
                'pk' => ['dt_file_id']
            ]);
            foreach ($files as $k => $v) {
                $result[] = [
                    'name' => $v['dt_file_name'],
                    'href' => Base::generateURL($k, false, $v['dt_file_name']),
                    'extension' => $v['dt_file_extension'],
                ];
            }
        }
        return $result;
    }
}
