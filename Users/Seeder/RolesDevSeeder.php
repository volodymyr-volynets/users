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
use Numbers\Users\Users\Model\Collection\Roles as RolesCollection;
use Numbers\Users\Users\Seeder\RolesFakeNames;
use Numbers\Users\Users\Model\Roles;

class RolesDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'U/M Roles Dev Seeder';

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
        $collection = new RolesCollection();
        for ($i = 1; $i <= 50; $i++) {
            $um_role_code = $this->names->generateModelCode('R_SDR_', 22, $i);
            $existing = Roles::getStatic([
                'where' => [
                    'um_role_tenant_id' => $tenant_id,
                    'um_role_code' => $um_role_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing) {
                continue;
            }
            // generate records
            $role = RolesFakeNames::generate($um_role_code);
            $result = $collection->merge($role);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
