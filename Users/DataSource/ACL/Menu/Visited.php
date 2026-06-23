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

class Visited extends DataSource
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

    public $primary_model = '\Numbers\Users\Users\Model\User\Resource\Visited';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [];

    /**
     * @inheritDoc
     */
    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.um_usrresvisit_id',
            'name' => 'a.um_usrresvisit_name',
            'description' => 'a.um_usrresvisit_description',
            'icon' => 'a.um_usrresvisit_icon',
            'url' => 'a.um_usrresvisit_url',
            'module_code' => 'a.um_usrresvisit_module_code',
            'counter' => 'a.um_usrresvisit_counter',
            'updated' => 'a.um_usrresvisit_updated_timestamp',
        ]);
        // where
        $this->query->where('AND', ['a.um_usrresvisit_tenant_id', '=', \Tenant::id()]);
        $this->query->where('AND', ['a.um_usrresvisit_user_id', '=', \User::id()]);
        $this->query->where('AND', ['a.um_usrresvisit_inactive', '=', 0]);
        // orderby
        $this->query->orderby(['a.um_usrresvisit_updated_timestamp' => SORT_DESC]);
    }

    /**
     * @inheritDoc
     */
    public function process($data, $options = [])
    {
        $locks = [];
        foreach ($data as $k => $v) {
            if (!empty($locks[$v['module_code'] . '::' . $v['name']])) {
                unset($data[$k]);
                continue;
            }
            $name_loc = 'NF.System.' . (new \String2($v['name'])->englishOnly()->toString());
            $title_loc = 'NF.System.' . (new \String2($v['description'])->englishOnly()->toString());
            $data[$k]['name_loc'] = loc($name_loc, $v['name']);
            $data[$k]['title'] = $v['description'];
            $data[$k]['title_loc'] = $v['description'] ? loc($title_loc, $v['description']) : null;
            $data[$k]['module_abbreviation'] = $v['module_code'][0] . '/' . $v['module_code'][1];
            $data[$k]['visit_counter'] = loc('NF.Message.VisitCounter', '{counter} visit(s)', [
                'counter' => $v['counter'],
                '__plural' => $v['counter'],
                'main_locale' => true,
            ]);
            $data[$k]['visit_counter_loc'] = loc('NF.Message.VisitCounter', '{counter} visit(s)', [
                'counter' => $v['counter'],
                '__plural' => $v['counter'],
            ]);
            $data[$k]['updated_ago'] = new \Datetime2($v['updated'])->ago(['main_locale' => true]);
            $data[$k]['updated_ago_loc'] = new \Datetime2($v['updated'])->ago();
            // add $locks
            $locks[$v['module_code'] . '::' . $v['name']] = true;
        }
        return $data;
    }
}
