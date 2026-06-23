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

use Numbers\Backend\Db\Common\Seeder\Base as SeederBase;
use Numbers\Users\Organizations\Model\Collection\OrganizationFakeNames;
use Numbers\Users\Organizations\Model\Organizations;

class OrganizationsDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'O/N Organizations Dev Seeder';

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
        $collection = new OrganizationFakeNames();
        for ($i = 1; $i <= 50; $i++) {
            $on_organization_code = $this->names->generateModelCode('ON_SDR_', 22, $i);
            $existing_user = Organizations::getStatic([
                'where' => [
                    'on_organization_tenant_id' => $tenant_id,
                    'on_organization_code' => $on_organization_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing_user) {
                continue;
            }
            // generate records
            $organization = OrganizationsFakeNames::generate($on_organization_code);
            $result = $collection->merge($organization);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
