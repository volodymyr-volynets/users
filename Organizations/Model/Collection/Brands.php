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

class Brands extends Collection
{
    public $data = [
        'name' => 'Brands',
        'model' => '\Numbers\Users\Organizations\Model\Brands',
        'details' => [
            '\Numbers\Users\Organizations\Model\Brand\Organizations' => [
                'name' => 'Organizations',
                'pk' => ['on_brndorg_tenant_id', 'on_brndorg_brand_id', 'on_brndorg_organization_id'],
                'type' => '1M',
                'map' => ['on_brand_tenant_id' => 'on_brndorg_tenant_id', 'on_brand_id' => 'on_brndorg_brand_id'],
            ],
            '\Numbers\Users\Organizations\Model\Brand\Trademarks' => [
                'name' => 'Trademarks',
                'pk' => ['on_brndtrdmrk_tenant_id', 'on_brndtrdmrk_brand_id', 'on_brndtrdmrk_trademark_id'],
                'type' => '1M',
                'map' => ['on_brand_tenant_id' => 'on_brndtrdmrk_tenant_id', 'on_brand_id' => 'on_brndtrdmrk_brand_id'],
            ]
        ]
    ];
}
