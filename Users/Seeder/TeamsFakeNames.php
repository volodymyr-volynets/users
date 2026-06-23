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

class TeamsFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        $result = [
            'um_team_tenant_id' => \Tenant::id(),
            'um_team_code' => $code,
            'um_team_name' => $names->name__suffix_Team,
            'um_team_icon' => null,
            'um_team_weight' => 5,
            'um_team_inactive' => 0,
            '\Numbers\Users\Users\Model\Team\Organizations' => [
                [
                    'um_temorg_organization_id' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organizations', 'id', 1),
                    'um_temorg_inactive' => 0
                ]
            ]
        ];
        return $result;
    }
}
