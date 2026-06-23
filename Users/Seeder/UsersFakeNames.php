<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Seeder;

use Numbers\FakeNames\FakeNames\FakerFactory;
use Numbers\Users\Users\Model\Role\Organizations;

class UsersFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        // init crypt
        $crypt_settings = \Application::get('crypt.default');
        $crypt_object = new \Crypt('default', $crypt_settings['submodule'], $crypt_settings);
        // organizations from roles
        $roles = $names->getStoredModelValues('\Numbers\Users\Users\Model\Roles', 'id', 3);
        $temp = Organizations::getStatic([
            'where' => [
                'um_rolorg_tenant_id' => \Tenant::id(),
                'um_rolorg_role_id' => $roles,
            ],
            'pk' => ['um_rolorg_organization_id'],
        ]);
        $organizations = array_unique(array_keys($temp));
        // generate data
        $result = [
            'um_user_tenant_id' => \Tenant::id(),
            //'um_user_id' => ['name' => 'User #', 'domain' => 'user_id_sequence'],
            'um_user_code' => $code,
            'um_user_type_id' => $names->randomFromArray([10, 20, 30, 40, 50]),
            'um_user_name' => $names->full_name,
            'um_user_company' => $names->company_saved,
            // personal information
            'um_user_title' => $names->title,
            'um_user_first_name' => $names->first_name,
            'um_user_last_name' => $names->last_name,
            // contact
            'um_user_email' => $names->email,
            'um_user_email2' => null,
            'um_user_phone' => $names->phone__digits_11__start_1__format_y,
            'um_user_numeric_phone' => $names->phone_numeric__digits_11__start_1__format_y,
            'um_user_phone2' => null,
            'um_user_cell' => $names->cell__digits_11__start_1__format_y,
            'um_user_fax' => $names->fax__digits_11__start_1__format_y,
            'um_user_whatsapp' => $names->whatsapp__digits_11__start_1,
            'um_user_alternative_contact' => null,
            // login
            'um_user_login_enabled' => 1,
            'um_user_login_username' => $names->username,
            'um_user_login_password' => $crypt_object->passwordHash('1234567890'),
            'um_user_login_last_set' => null,
            // photo
            'um_user_photo_file_id' => null,
            'um_user_about_nickname' => null,
            'um_user_about_description' => null,
            // operating country / province / currency code & type
            'um_user_operating_country_code' => $names->country_code,
            'um_user_operating_province_code' => $names->province_code,
            'um_user_operating_currency_code' => null,
            'um_user_operating_currency_type' => null,
            // tracking
            'um_user_channel' => null,
            'um_user_send_emails' => 1,
            'um_user_send_sms' => 1,
            'um_user_send_postal' => 1,
            'um_user_send_whatsapp' => 1,
            'um_user_email_confirmed' => 0,
            'um_user_phone_confirmed' => 0,
            'um_user_whatsapp_confirmed' => 0,
            'um_user_postal_confirmed' => 0,
            // other
            'um_user_ip' => $names->ipv4,
            // inactive & hold
            'um_user_hold' => 0,
            'um_user_inactive' => 0,
            '\Numbers\Users\Users\Model\User\Organizations' => [],
            '\Numbers\Users\Users\Model\User\Roles' => [],
            '\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses' => [
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
        ];
        foreach ($organizations as $k => $v) {
            $result['\Numbers\Users\Users\Model\User\Organizations'][] = [
                'um_usrorg_organization_id' => $v,
                'um_usrorg_primary' => $k == 0 ? 1 : 0,
                'um_usrorg_inactive' => 0
            ];
        }
        foreach ($roles as $v) {
            $result['\Numbers\Users\Users\Model\User\Roles'][] = [
                'um_usrrol_role_id' => $v,
                'um_usrrol_inactive' => 0
            ];
        }
        return $result;
    }
}
