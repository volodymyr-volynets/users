<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Seeder;

use Numbers\FakeNames\FakeNames\FakerFactory;

class OrganizationsFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        $result = [
            'on_organization_tenant_id' => \Tenant::id(),
            'on_organization_id' => null,
            'on_organization_code' => $code,
            'on_organization_name' => $names->name__suffix_Corporation,
            'on_organization_icon' => null,
            'on_organization_parent_organization_id' => null,
            // contact
            'on_organization_email' => $names->email,
            'on_organization_email2' => null,
            'on_organization_phone' => $names->phone__digits_11__start_1__format_y,
            'on_organization_phone2' => null,
            'on_organization_cell' => $names->cell__digits_11__start_1__format_y,
            'on_organization_fax' => $names->fax__digits_11__start_1__format_y,
            'on_organization_alternative_contact' => null,
            // logo
            'on_organization_logo_file_id' => null,
            'on_organization_about_nickname' => null,
            'on_organization_about_description' => null,
            // operating country / province
            'on_organization_operating_country_code' => $names->country_code,
            'on_organization_operating_province_code' => $names->province_code,
            'on_organization_operating_currency_code' => null,
            'on_organization_operating_currency_type' => null,
            // inactive & hold
            'on_organization_hold' => 0,
            'on_organization_inactive' => 0,
            '\Numbers\Users\Organizations\Model\Organizations\0Virtual0\Widgets\Addresses' => [
                [
                    'wg_address_type_code' => $names->getStoredModelValues('\Numbers\Countries\Countries\Model\Address\Types', 'code', 1),
                    'wg_address_primary' => 1,
                    'wg_address_address1' => $names->address,
                    'wg_address_address2' => $names->address2,
                    'wg_address_city' => $names->city,
                    'wg_address_province_code' => $names->province_code,
                    'wg_address_postal_code' => $names->postal_code,
                    'wg_address_country_code' => $names->country_code,
                    'wg_address_inactive' => 0,
                ]
            ],
            '\Numbers\Users\Organizations\Model\Organization\Type\Map' => [
                [
                    'on_orgtpmap_type_code' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organization\Types', 'code', 1),
                ]
            ]
        ];
        return $result;
    }
}
