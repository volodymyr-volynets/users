<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\ACL\Menu;

use Object\DataSource;

class Favorites extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\User\Resource\Favorites';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [];

    /**
     * @inheritDoc
     */
    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.um_usrresfavorite_id',
            'name' => 'a.um_usrresfavorite_name',
            'description' => 'a.um_usrresfavorite_description',
            'icon' => 'a.um_usrresfavorite_icon',
            'url' => 'a.um_usrresfavorite_url',
            'resource_id' => 'a.um_usrresfavorite_resource_id',
            'inserted' => 'a.um_usrresfavorite_inserted_timestamp',
        ]);
        // where
        $this->query->where('AND', ['a.um_usrresfavorite_tenant_id', '=', \Tenant::id()]);
        $this->query->where('AND', ['a.um_usrresfavorite_user_id', '=', \User::id()]);
        $this->query->where('AND', ['a.um_usrresfavorite_inactive', '=', 0]);
        // orderby
        $this->query->orderby(['a.um_usrresfavorite_inserted_timestamp' => SORT_DESC]);
    }

    /**
     * @inheritDoc
     */
    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            $data[$k]['inserted_ago'] = new \Datetime2($v['inserted'])->ago(['main_locale' => true]);
            $data[$k]['inserted_ago_loc'] = new \Datetime2($v['inserted'])->ago();
        }
        return $data;
    }
}
