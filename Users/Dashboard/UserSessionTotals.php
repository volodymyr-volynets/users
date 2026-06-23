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

class UserSessionTotals extends DashboardAbstract2
{
    public $dashboard_code = 'UM::USER_SESSION_TOTALS';

    public $parameters = [];

    public function render(array $options = []): array
    {
        $db_object = new \Db('default');
        $result = \SQL2::queryStatic(null, '/Numbers/Users/Users/SQL/Dashboards/UserSessionTotals.' . $db_object->backend . '.object.sql', null, [
            'tenant_id' => \Tenant::id(),
            'start_date' => $options['date1'],
            'end_date' => $options['date2'],
        ]);

        $chart = \HTML::chartjs([
            'type' => 'bar',
            'labels' => ['Total Sessions'],
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
                ],
                'responsive' => true,
                'maintainAspectRatio' => false,
                'plugins' => [
                    'legend' => [
                        'display' => false
                    ]
                ]
            ],
            '__size' => [
                'width' => '100%',
                'height' => $options['__backend_dashboard']['d9_backdash_y_size'] . 'px',
            ]
        ]);

        $index = 1;
        $row = $result['rows'][0];

        $table = '<div style="height: ' . $options['__backend_dashboard']['d9_backdash_y_size'] . 'px; overflow-y: scroll;">';
        $table .= '<table width="100%" class="table table-striped nf_table_no_td_padding">';
        $table .= '<tr><td width="65%">Total Sessions</td><td width="35%" align="right">' . $row['total_sessions'] . '</td></tr>';
        $table .= '<tr><td width="65%">Active Sessions</td><td width="35%" align="right">' . $row['active_sessions'] . '</td></tr>';
        $table .= '<tr><td width="65%">Unique Users</td><td width="35%" align="right">' . $row['distinct_users'] . '</td></tr>';
        $table .= '</table>';
        $table .= '</div>';

        $html = '<table width="100%" height="' . $options['__backend_dashboard']['d9_backdash_y_size'] . '">';
        $html .= '<tr>';
        $html .= '<td valign="top" width="50%">' . $table . '</td>';
        $html .= '<td valign="top" width="50%">' . $chart . '</td>';
        $html .= '</tr>';
        $html .= '</table>';

        return [
            'success' => true,
            'error' => [],
            'html' => $html,
        ];
    }
}
