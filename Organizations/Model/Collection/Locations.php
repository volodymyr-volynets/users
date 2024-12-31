<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Collection;

use Object\Collection;

class Locations extends Collection
{
    public $data = [
        'name' => 'Locations',
        'model' => '\Numbers\Users\Organizations\Model\Locations',
        'details' => [
            '\Numbers\Users\Organizations\Model\Location\Type\Map' => [
                'name' => 'Types',
                'pk' => ['on_loctpmap_tenant_id', 'on_loctpmap_location_id', 'on_loctpmap_type_code'],
                'type' => '1M',
                'map' => ['on_location_tenant_id' => 'on_loctpmap_tenant_id', 'on_location_id' => 'on_loctpmap_location_id']
            ],
            '\Numbers\Users\Organizations\Model\Location\IntegrationMappings' => [
                'name' => 'Integration Mappings',
                'pk' => ['on_locintegmap_tenant_id', 'on_locintegmap_location_id', 'on_locintegmap_integtype_code', 'on_locintegmap_code'],
                'type' => '1M',
                'map' => ['on_location_tenant_id' => 'on_locintegmap_tenant_id', 'on_location_id' => 'on_locintegmap_location_id']
            ],
            '\Numbers\Users\Organizations\Model\Locations\0Virtual0\Widgets\Addresses' => [
                'name' => 'Addresses',
                'pk' => ['wg_address_tenant_id', 'wg_address_location_id', 'wg_address_type_code'],
                'type' => '1M',
                'map' => ['on_location_tenant_id' => 'wg_address_tenant_id', 'on_location_id' => 'wg_address_location_id'],
                'addresses' => 1
            ]
        ]
    ];
}
