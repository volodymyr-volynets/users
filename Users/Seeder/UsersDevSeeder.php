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

use Numbers\Backend\Db\Common\Seeder\Base as SeederBase;
use Numbers\Users\Users\Model\Collection\Users as UsersCollection;
use Numbers\Users\Users\Seeder\UsersFakeNames;
use Numbers\Users\Users\Model\Users;

class UsersDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'U/M Users Dev Seeder';

    /**
     * Seed up
     *
     * Throw exceptions if something fails!!!
     */
    public function up()
    {
        // tenant
        $tenant_id = \Tenant::id();
        if (!$tenant_id) {
            throw new \Exception('Tenant?');
        }
        // in a loop
        $collection = new UsersCollection();
        for ($i = 1; $i <= 50; $i++) {
            $um_user_code = $this->names->generateModelCode('U_SDR_', 22, $i);
            $existing = Users::getStatic([
                'where' => [
                    'um_user_tenant_id' => $tenant_id,
                    'um_user_code' => $um_user_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing) {
                continue;
            }
            // generate records
            $role = UsersFakeNames::generate($um_user_code);
            $result = $collection->merge($role);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
