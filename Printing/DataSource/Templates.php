<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Printing\DataSource;

use Numbers\Users\Printing\Model\Template\Types;
use Object\DataSource;

class Templates extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['p8_template_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'p8_template_name' => 'name',
        'p8_templtype_collection_model' => 'collection_model',
        'p8_template_inactive' => 'inactive'
    ];
    public $options_active = [
        'p8_template_inactive' => 0
    ];
    public $column_prefix = 'p8_template_';

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $primary_model = '\Numbers\Users\Printing\Model\Templates';
    public $parameters = [
        'p8_template_id' => ['name' => 'Template #', 'domain' => 'template_id'],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'a.*',
            'b.*'
        ]);
        // joins
        $this->query->join('INNER', new Types(), 'b', 'ON', [
            ['AND', ['a.p8_template_templtype_id', '=', 'b.p8_templtype_id', true], false]
        ]);
        // where
        if (!empty($parameters['p8_template_id'])) {
            $this->query->where('AND', ['a.p8_template_id', '=', $parameters['p8_template_id']]);
        }
    }

    /**
     * @see $this->options()
     */
    public function optionsGrouppedCollectionTree($options = [])
    {
        if (empty($options['where']['p8_template_id'])) {
            return [];
        }
        $template = self::optionsStatic($options);
        $template = current($template);
        if (empty($template['collection_model'])) {
            return [];
        }
        /* @var $collection \Object\Collection */
        $collection = new $template['collection_model']();
        $result = [];
        $result[$collection->data['model']] = ['name' => i18n(null, $collection->data['name']), 'level' => 0];
        $result = array_merge($result, $this->convertByName($collection->data['details'], 'details', 1));
        return $result;
    }

    /**
     * Convert by name
     *
     * @param array $options
     * @param string $key
     * @return array
     */
    public function convertByName($options, $key, $level): array
    {
        $result = [];
        foreach ($options as $k => $v) {
            $result[$k] = ['name' => i18n(null, $v['name']), 'level' => $level];
            if (!empty($v[$key])) {
                $result = array_merge($result, $this->convertByName($v[$key], $key, $level + 1));
            }
        }
        return $result;
    }
}
