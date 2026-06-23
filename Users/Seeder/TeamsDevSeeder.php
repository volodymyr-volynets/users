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
use Numbers\Users\Users\Model\Collection\Teams as TeamsCollection;
use Numbers\Users\Users\Seeder\TeamsFakeNames;
use Numbers\Users\Users\Model\Teams;

class TeamsDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'U/M Teams Dev Seeder';

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
        $collection = new TeamsCollection();
        for ($i = 1; $i <= 50; $i++) {
            $um_team_code = $this->names->generateModelCode('T_SDR_', 22, $i);
            $existing = Teams::getStatic([
                'where' => [
                    'um_team_tenant_id' => $tenant_id,
                    'um_team_code' => $um_team_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing) {
                continue;
            }
            // generate records
            $team = TeamsFakeNames::generate($um_team_code);
            $result = $collection->merge($team);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
