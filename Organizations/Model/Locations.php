<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model;

use Helper\Tree;
use Object\Table;

class Locations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Locations';
    public $schema;
    public $name = 'on_locations';
    public $pk = ['on_location_tenant_id', 'on_location_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_location_';
    public $columns = [
        'on_location_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_location_id' => ['name' => 'Location #', 'domain' => 'location_id_sequence'],
        'on_location_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'on_location_name' => ['name' => 'Name', 'domain' => 'name'],
        'on_location_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        // contact
        'on_location_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'on_location_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
        'on_location_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'on_location_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
        'on_location_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
        'on_location_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
        'on_location_alternative_contact' => ['name' => 'Alternative Contact', 'domain' => 'description', 'null' => true],
        // about
        'on_location_logo_file_id' => ['name' => 'Logo File #', 'domain' => 'file_id', 'null' => true],
        'on_location_about_nickname' => ['name' => 'About Nickname', 'domain' => 'name', 'null' => true],
        'on_location_about_description' => ['name' => 'About Description', 'domain' => 'description', 'null' => true],
        // organization
        'on_location_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'on_location_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id', 'null' => true],
        'on_location_number' => ['name' => 'Location Number', 'domain' => 'location_number', 'null' => true],
        'on_location_brand_id' => ['name' => 'Brand #', 'domain' => 'brand_id', 'null' => true],
        'on_location_district_id' => ['name' => 'District #', 'domain' => 'district_id', 'null' => true],
        'on_location_market_id' => ['name' => 'Market #', 'domain' => 'market_id', 'null' => true],
        'on_location_region_id' => ['name' => 'Region #', 'domain' => 'region_id', 'null' => true],
        'on_location_item_master_id' => ['name' => 'Item Master #', 'domain' => 'item_master_id', 'null' => true],
        'on_location_construction_date' => ['name' => 'Construction Date', 'type' => 'date', 'null' => true],
        // inactive & hold
        'on_location_hold' => ['name' => 'Hold', 'type' => 'boolean'],
        'on_location_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_locations_pk' => ['type' => 'pk', 'columns' => ['on_location_tenant_id', 'on_location_id']],
        'on_location_code_un' => ['type' => 'unique', 'columns' => ['on_location_tenant_id', 'on_location_code']],
        'on_location_number_un' => ['type' => 'unique', 'columns' => ['on_location_tenant_id', 'on_location_customer_id', 'on_location_number']],
        'on_location_item_master_id_un' => ['type' => 'unique', 'columns' => ['on_location_tenant_id', 'on_location_id', 'on_location_item_master_id']],
        'on_location_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ],
        'on_location_brand_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_brand_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Brands',
            'foreign_columns' => ['on_brand_tenant_id', 'on_brand_id']
        ],
        'on_location_district_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_district_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Districts',
            'foreign_columns' => ['on_district_tenant_id', 'on_district_id']
        ],
        'on_location_market_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_market_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Markets',
            'foreign_columns' => ['on_market_tenant_id', 'on_market_id']
        ],
        'on_location_region_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_region_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Regions',
            'foreign_columns' => ['on_region_tenant_id', 'on_region_id']
        ],
        'on_location_item_master_id_fk' => [
            'type' => 'fk',
            'columns' => ['on_location_tenant_id', 'on_location_item_master_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\ItemMasters',
            'foreign_columns' => ['on_itemmaster_tenant_id', 'on_itemmaster_id']
        ]
    ];
    public $indexes = [
        'on_locations_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_location_code', 'on_location_name', 'on_location_number', 'on_location_phone', 'on_location_email']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_location_tenant_id' => 'wg_audit_tenant_id',
            'on_location_id' => 'wg_audit_location_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'on_location_name' => 'name',
        'on_location_icon' => 'icon_class',
        'on_location_logo_file_id' => 'photo_id',
        'on_location_inactive' => 'inactive',
        'on_location_market_id' => 'market_id',
        'on_location_district_id' => 'district_id'
    ];
    public $options_active = [
        'on_location_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $addresses = [
        'map' => [
            'on_location_tenant_id' => 'wg_address_tenant_id',
            'on_location_id' => 'wg_address_location_id'
        ],
        'options' => [
            'show_instructions' => true
        ]
    ];

    public $attributes = [
        'map' => [
            'on_location_tenant_id' => 'wg_attribute_tenant_id',
            'on_location_id' => 'wg_attribute_location_id'
        ]
    ];

    public $comments = [
        'map' => [
            'on_location_tenant_id' => 'wg_comment_tenant_id',
            'on_location_id' => 'wg_comment_location_id'
        ]
    ];

    public $documents = [
        'map' => [
            'on_location_tenant_id' => 'wg_document_tenant_id',
            'on_location_id' => 'wg_document_location_id'
        ]
    ];

    public $tags = [
        'map' => [
            'on_location_tenant_id' => 'wg_tag_tenant_id',
            'on_location_id' => 'wg_tag_location_id'
        ]
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    /**
     * @see $this->options()
     */
    public function optionsGrouppedSearch($options = [])
    {
        $data = $this->options($options);
        $markets = Markets::optionsStatic();
        $districts = Districts::optionsStatic();
        $result = [];
        foreach ($data as $k => $v) {
            $market_parent = 'MA-' . $v['market_id'];
            if (!isset($result[$market_parent])) {
                $result[$market_parent] = $markets[$v['market_id']];
                $result[$market_parent]['disabled'] = true;
            }
            $district_parent = 'MA-' . $v['market_id'] . '-DI-' . $v['district_id'];
            if (!isset($result[$district_parent])) {
                $result[$district_parent] = $districts[$v['district_id']];
                $result[$district_parent]['disabled'] = true;
                $result[$district_parent]['parent'] = $market_parent;
            }
            if (!empty($options['skip_photo_id'])) {
                unset($v['photo_id']);
            }
            $result[$k] = $v;
            $result[$k]['parent'] = $district_parent;
        }
        if (!empty($result)) {
            $converted = Tree::convertByParent($result, 'parent');
            $result = [];
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }
}
