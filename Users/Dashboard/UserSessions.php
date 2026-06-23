<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Dashboard;

use Numbers\Users\Dashboards\Class2\DashboardAbstract2;

class UserSessions extends DashboardAbstract2
{
    public $dashboard_code = 'UM::USER_SESSIONS_DASHBOARD';

    public $parameters = [];

    public function render(array $options = []): array
    {
        $db_object = new \Db('default');
        $result = \SQL2::queryStatic(null, '/Numbers/Users/Users/SQL/Dashboards/UserSessions.' . $db_object->backend . '.object.sql', null, [
            'tenant_id' => \Tenant::id(),
            'start_date' => $options['date1'],
            'end_date' => $options['date2'],
        ]);

        $html = \HTML::chartjs([
            'type' => 'line',
            'labels' => array_column($result['rows'], 'date3'),
            'datasets' => [
                [
                    'label' => '# of Sessions',
                    'data' => array_column($result['rows'], 'total_sessions'),
                    'borderWidth' => 1,
                ],
                [
                    'label' => '# of Active Sessions',
                    'data' => array_column($result['rows'], 'active_sessions'),
                    'borderWidth' => 1,
                ],
                [
                    'label' => '# of Unique Users',
                    'data' => array_column($result['rows'], 'distinct_users'),
                    'borderWidth' => 1,
                ],
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true
                    ]
                ]
            ],
            '__size' => [
                'width' => $options['__backend_dashboard']['d9_backdash_x_size'] . '%',
                'height' => $options['__backend_dashboard']['d9_backdash_y_size'] . 'px',
            ]
        ]);

        return [
            'success' => true,
            'error' => [],
            'html' => $html,
        ];
    }
}
