<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Model;

use Object\Data;

class Storages extends Data
{
    public $module_code = 'DT';
    public $title = 'D/T Storages';
    public $column_key = 'id';
    public $column_prefix = '';
    public $orderby;
    public $columns = [
        'id' => ['name' => '#', 'domain' => 'type_id'],
        'name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [];

    /**
     * Get
     *
     * @param array $options
     * @return array
     */
    public function get($options = [])
    {
        $storages = \Application::get('documents.storages');
        if (empty($storages)) {
            return [];
        } else {
            return $storages;
        }
    }
}
