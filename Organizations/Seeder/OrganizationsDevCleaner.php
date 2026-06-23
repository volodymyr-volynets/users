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

class OrganizationsDevCleaner extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'O/N Organizations Dev Cleaner';

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
        $result = \SQL2::queryStatic(null, '/Numbers/Users/Organizations/SQL/OrganizationsDeleteByCodePrefix.object.sql', null, [
            'tenant_id' => $tenant_id,
            'code_prefix' => 'ON_SDR_%',
        ]);
        if (!$result['success']) {
            throw new \Exception2($result['error']);
        }
    }
}
