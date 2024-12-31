<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Report\Security;

use Numbers\Backend\System\Modules\Model\Resources;
use Numbers\Tenants\Tenants\Model\Modules;
use Numbers\Users\Organizations\Model\Departments;
use Numbers\Users\Organizations\Model\Organizations;
use Numbers\Users\Users\Model\Roles;
use Numbers\Users\Users\Model\Team\Map;
use Numbers\Users\Users\Model\Teams;
use Numbers\Users\Users\Model\User\Features;
use Numbers\Users\Users\Model\User\Notifications;
use Numbers\Users\Users\Model\User\Permission\Actions;
use Numbers\Users\Users\Model\User\Permission\Subresources;
use Numbers\Users\Users\Model\User\Permissions;
use Numbers\Users\Users\Model\User\Types;
use Numbers\Users\Users\Model\Users;
use Object\Content\Messages;
use Object\Form\Wrapper\Report;

class UserSetupReport extends Report
{
    public $form_link = 'um_user_setup_report';
    public $module_code = 'UM';
    public $title = 'U/M Security User Setup Report';
    public $options = [
        'segment' => self::SEGMENT_REPORT,
        'actions' => [
            'refresh' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::REPORT_BUTTONS => ['default_row_type' => 'grid', 'order' => 2000, 'class' => 'numbers_form_filter_sort_container'],
    ];
    public $rows = [
        'tabs' => [
            'filter' => ['order' => 100, 'label_name' => 'Filter'],
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'filter' => [
                'filter' => ['container' => 'filter', 'order' => 100]
            ],
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'filter' => [
            'date' => [
                'um_user_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_user_id;>='],
                'um_user_id2' => ['order' => 2, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_user_id;<='],
                'um_user_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_user_inactive;=']
            ]
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::REPORT_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::REPORT_BUTTONS => self::REPORT_BUTTONS_DATA
    ];
    public const REPORT_SORT_OPTIONS = [
        'um_user_id' => ['name' => 'User #'],
        'um_user_name' => ['name' => 'Name'],
    ];
    public $report_default_sort = [
        'um_user_id' => SORT_ASC
    ];
    public function buildReport(& $form)
    {
        // create new report
        $report = new \Object\Form\Builder\Report();
        $report->addReport(DEF, $form);
        // add header
        $report->addHeader(DEF, 'row1', [
            'um_user_id' => ['label_name' => 'User #', 'percent' => 10],
            'um_user_name' => ['label_name' => 'User Name', 'percent' => 40],
            'um_user_code' => ['label_name' => 'Code', 'percent' => 25],
            'um_user_type_id' => ['label_name' => 'Type', 'percent' => 15],
            'um_user_inactive' => ['label_name' => 'Active', 'percent' => 10, 'data_align' => 'center'],
        ]);
        $report->addHeader(
            DEF,
            'separator',
            [
            'blank' => ['label_name' => ' ', 'percent' => 100]
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'organizations',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Organizations:', 'percent' => 15],
            'organization_id' => ['label_name' => 'Organization #', 'percent' => 25],
            'organization_name' => ['label_name' => 'Organization Name', 'percent' => 50],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'permissions',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Permissions:', 'percent' => 15],
            'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
            'resource_name' => ['label_name' => 'Resource Name', 'percent' => 25],
            'action_name' => ['label_name' => 'Action Name', 'percent' => 25],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'subresources',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Subresources:', 'percent' => 15],
            'module_name' => ['label_name' => 'Module Name', 'percent' => 20],
            'resource_name' => ['label_name' => 'Resource Name', 'percent' => 20],
            'subresource_name' => ['label_name' => 'Subresource Name', 'percent' => 20],
            'action_name' => ['label_name' => 'Action Name', 'percent' => 15],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'notifications',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Notifications:', 'percent' => 15],
            'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
            'notification_name' => ['label_name' => 'Notification Name', 'percent' => 50],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'features',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Features:', 'percent' => 15],
            'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
            'notification_name' => ['label_name' => 'Feature Name', 'percent' => 50],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'roles',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Roles:', 'percent' => 15],
            'role_id' => ['label_name' => 'Role #', 'percent' => 10],
            'role_name' => ['label_name' => 'Role Name', 'percent' => 30],
            'granted_on' => ['label_name' => 'Granted On', 'percent' => 10],
            'granted_by' => ['label_name' => 'Granted By', 'percent' => 25],
        ],
            [
            'skip_rendering' => true
        ]
        );
        $report->addHeader(
            DEF,
            'teams',
            [
            'blank' => ['label_name' => '', 'percent' => 10],
            'name' => ['label_name' => 'Teams:', 'percent' => 15],
            'role_id' => ['label_name' => 'Team #', 'percent' => 10],
            'role_name' => ['label_name' => 'Team Name', 'percent' => 30],
            'granted_on' => ['label_name' => 'Granted On', 'percent' => 10],
            'granted_by' => ['label_name' => 'Granted By', 'percent' => 25],
        ],
            [
            'skip_rendering' => true
        ]
        );
        // query the data
        $query = Users::queryBuilderStatic()->select();
        $query->columns([
            'um_user_id' => 'a.um_user_id',
            'um_user_code' => 'a.um_user_code',
            'um_user_type_id' => 'a.um_user_type_id',
            'um_user_name' => 'a.um_user_name',
            'um_user_inactive' => 'a.um_user_inactive',
            'organizations' => 'b.organizations',
            'permissions' => 'd.permissions',
            'notifications' => 'e.notifications',
            'subresources' => 'f.subresources',
            'features' => 'g.features',
            'roles' => 'i.roles',
            'teams' => 'j.teams'
        ]);
        // join organizations
        $query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrorg_user_id',
                'organizations' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrorg_organization_id)", 'delimiter' => ';;'])
            ]);
            // join
            $query->join('INNER', new Organizations(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrorg_organization_id', '=', 'inner_b.on_organization_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrorg_user_id']);
            $query->where('AND', ['inner_a.um_usrorg_inactive', '=', 0]);
            $query->where('AND', ['inner_b.on_organization_inactive', '=', 0]);
        }, 'b', 'ON', [
            ['AND', ['a.um_user_id', '=', 'b.um_usrorg_user_id', true], false]
        ]);
        // join permissions
        $query->join('LEFT', function (& $query) {
            $query = Actions::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrperaction_user_id',
                'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrperaction_module_id, inner_a.um_usrperaction_resource_id, inner_a.um_usrperaction_action_id)", 'delimiter' => ';;'])
            ]);
            $query->join('INNER', new Permissions(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrperaction_user_id', '=', 'inner_b.um_usrperm_user_id', true], false],
                ['AND', ['inner_a.um_usrperaction_module_id', '=', 'inner_b.um_usrperm_module_id', true], false],
                ['AND', ['inner_a.um_usrperaction_resource_id', '=', 'inner_b.um_usrperm_resource_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrperaction_user_id']);
            $query->where('AND', ['inner_a.um_usrperaction_inactive', '=', 0]);
            $query->where('AND', ['inner_b.um_usrperm_inactive', '=', 0]);
        }, 'd', 'ON', [
            ['AND', ['a.um_user_id', '=', 'd.um_usrperaction_user_id', true], false]
        ]);
        // join notifications
        $query->join('LEFT', function (& $query) {
            $query = Notifications::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrnoti_user_id',
                'notifications' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('**', inner_a.um_usrnoti_module_id, inner_a.um_usrnoti_feature_code)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_a.um_usrnoti_user_id']);
            $query->where('AND', ['inner_a.um_usrnoti_inactive', '=', 0]);
        }, 'e', 'ON', [
            ['AND', ['a.um_user_id', '=', 'e.um_usrnoti_user_id', true], false]
        ]);
        // join subresources
        $query->join('LEFT', function (& $query) {
            $query = Subresources::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrsubres_user_id',
                'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrsubres_module_id, inner_a.um_usrsubres_resource_id, inner_a.um_usrsubres_action_id, inner_a.um_usrsubres_rsrsubres_id)", 'delimiter' => ';;'])
            ]);
            $query->join('INNER', new Permissions(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrsubres_user_id', '=', 'inner_b.um_usrperm_user_id', true], false],
                ['AND', ['inner_a.um_usrsubres_module_id', '=', 'inner_b.um_usrperm_module_id', true], false],
                ['AND', ['inner_a.um_usrsubres_resource_id', '=', 'inner_b.um_usrperm_resource_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrsubres_user_id']);
            $query->where('AND', ['inner_a.um_usrsubres_inactive', '=', 0]);
            $query->where('AND', ['inner_b.um_usrperm_inactive', '=', 0]);
        }, 'f', 'ON', [
            ['AND', ['a.um_user_id', '=', 'f.um_usrsubres_user_id', true], false]
        ]);
        // join features
        $query->join('LEFT', function (& $query) {
            $query = Features::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrfeature_user_id',
                'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('**', inner_a.um_usrfeature_module_id, inner_a.um_usrfeature_feature_code)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_a.um_usrfeature_user_id']);
            $query->where('AND', ['inner_a.um_usrfeature_inactive', '=', 0]);
        }, 'g', 'ON', [
            ['AND', ['a.um_user_id', '=', 'g.um_usrfeature_user_id', true], false]
        ]);
        // join roles
        $query->join('LEFT', function (& $query) {
            $query = \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrrol_user_id',
                'roles' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrrol_role_id, inner_a.um_usrrol_inserted_timestamp, COALESCE(inner_a.um_usrrol_inserted_user_id, 0))", 'delimiter' => ';;'])
            ]);
            // join
            $query->join('INNER', new Roles(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrrol_role_id', '=', 'inner_b.um_role_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrrol_user_id']);
            $query->where('AND', ['inner_a.um_usrrol_inactive', '=', 0]);
            $query->where('AND', ['inner_b.um_role_inactive', '=', 0]);
        }, 'i', 'ON', [
            ['AND', ['a.um_user_id', '=', 'i.um_usrrol_user_id', true], false]
        ]);
        // join teams
        $query->join('LEFT', function (& $query) {
            $query = Map::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.um_usrtmmap_user_id',
                'teams' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrtmmap_team_id, inner_a.um_usrtmmap_inserted_timestamp, COALESCE(inner_a.um_usrtmmap_inserted_user_id, 0))", 'delimiter' => ';;'])
            ]);
            // join
            $query->join('INNER', new Teams(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_usrtmmap_team_id', '=', 'inner_b.um_team_id', true], false]
            ]);
            $query->groupby(['inner_a.um_usrtmmap_user_id']);
            $query->where('AND', ['inner_a.um_usrtmmap_inactive', '=', 0]);
            $query->where('AND', ['inner_b.um_team_inactive', '=', 0]);
        }, 'j', 'ON', [
            ['AND', ['a.um_user_id', '=', 'j.um_usrtmmap_user_id', true], false]
        ]);
        $form->processReportQueryFilter($query);
        $form->processReportQueryOrderBy($query);
        $data = $query->query(null, ['cache' => false]);
        // preload models
        $types = Types::optionsStatic(['i18n' => true]);
        $departments = Departments::optionsStatic(['i18n' => true]);
        $organizations = Organizations::optionsStatic(['i18n' => true]);
        $roles = Roles::optionsStatic(['i18n' => true, 'skip_acl' => true]);
        $teams = Teams::optionsStatic(['i18n' => true, 'skip_acl' => true]);
        $users = Users::optionsStatic(['i18n' => true, 'skip_acl' => true]);
        $modules = Modules::optionsStatic(['i18n' => true]);
        $resources = Resources::optionsStatic(['i18n' => true]);
        $actions = \Numbers\Backend\System\Modules\Model\Resource\Actions::optionsStatic(['i18n' => true]);
        $features = \Numbers\Backend\System\Modules\Model\Module\Features::optionsStatic(['i18n' => true]);
        $subresources = \Numbers\Backend\System\Modules\Model\Resource\Subresources::optionsStatic(['i18n' => true]);
        // add data to report
        $counter = 1;
        foreach ($data['rows'] as $k => $v) {
            // replaces
            $v['um_user_id'] = ['value' => \Format::id($v['um_user_id']), 'url' => \Request::buildURL('/Numbers/Users/Users/Controller/Roles/_Edit', ['um_user_id' => $v['um_user_id']])];
            $v['um_user_inactive'] = Messages::active($v['um_user_inactive'], true);
            $v['um_user_type_id'] = $types[$v['um_user_type_id']]['name'];
            // add data
            $even = $counter % 2 ? ODD : EVEN;
            $report->addData(DEF, 'row1', $even, $v);
            // add organizations
            if (!empty($v['organizations'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'organizations', $even, $report->getHeaderForRender(DEF, 'organizations'));
                $temp = explode(';;', $v['organizations']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $report->addData(DEF, 'organizations', $even, [
                        'organization_id' => $v0,
                        'organization_name' => $organizations[(int) $v0]['name']
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // roles
            if (!empty($v['roles'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'roles', $even, $report->getHeaderForRender(DEF, 'roles'));
                $temp = explode(';;', $v['roles']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('::', $v0);
                    $report->addData(DEF, 'roles', $even, [
                        'role_id' => $temp2[0],
                        'role_name' => $roles[(int) $temp2[0]]['name'],
                        'granted_on' => \Format::date($temp2[1]),
                        'granted_by' => !empty($temp2[2]) ? $users[(int) $temp2[2]]['name'] : ' ',
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // teams
            if (!empty($v['teams'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'teams', $even, $report->getHeaderForRender(DEF, 'teams'));
                $temp = explode(';;', $v['teams']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('::', $v0);
                    $report->addData(DEF, 'teams', $even, [
                        'role_id' => $temp2[0],
                        'role_name' => $teams[(int) $temp2[0]]['name'],
                        'granted_on' => \Format::date($temp2[1]),
                        'granted_by' => !empty($temp2[2]) ? $users[(int) $temp2[2]]['name'] : ' ',
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // permissions
            if (!empty($v['permissions'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'permissions', $even, $report->getHeaderForRender(DEF, 'permissions'));
                $temp = explode(';;', $v['permissions']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('::', $v0);
                    $report->addData(DEF, 'permissions', $even, [
                        'module_name' => $modules[(int) $temp2[0]]['name'],
                        'resource_name' => $resources[(int) $temp2[1]]['name'],
                        'action_name' => $actions[(int) $temp2[2]]['name']
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // subresources
            if (!empty($v['subresources'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'subresources', $even, $report->getHeaderForRender(DEF, 'subresources'));
                $temp = explode(';;', $v['subresources']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('::', $v0);
                    $report->addData(DEF, 'subresources', $even, [
                        'module_name' => $modules[(int) $temp2[0]]['name'],
                        'resource_name' => $resources[(int) $temp2[1]]['name'],
                        'subresource_name' => $subresources[(int) $temp2[3]]['name'],
                        'action_name' => $actions[(int) $temp2[2]]['name']
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // notifications
            if (!empty($v['notifications'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'notifications', $even, $report->getHeaderForRender(DEF, 'notifications'));
                $temp = explode(';;', $v['notifications']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('**', $v0);
                    $report->addData(DEF, 'notifications', $even, [
                        'module_name' => $modules[(int) $temp2[0]]['name'],
                        'notification_name' => $features[$temp2[1]]['name']
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            // features
            if (!empty($v['features'])) {
                $report->addData(DEF, 'separator', $even, ['blank' => ' ']);
                $report->addData(DEF, 'features', $even, $report->getHeaderForRender(DEF, 'features'));
                $temp = explode(';;', $v['features']);
                $counter2 = $even + 1;
                foreach ($temp as $v0) {
                    $temp2 = explode('**', $v0);
                    $report->addData(DEF, 'features', $even, [
                        'module_name' => $modules[(int) $temp2[0]]['name'],
                        'notification_name' => $features[$temp2[1]]['name']
                    ], [
                        'cell_even' => $counter2 % 2 ? ODD : EVEN
                    ]);
                    $counter2++;
                }
            }
            $counter++;
        }
        // add number of rows
        $report->addNumberOfRows(DEF, count($data['rows']));
        // free up memory
        unset($data);
        // we must return report object
        return $report;
    }
}
