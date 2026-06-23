<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form;

use Object\Form\Wrapper\Base;
use Numbers\Users\Users\DataSource\DirectoryListing\DirectoryListing;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class DirectoryListings extends Base
{
    public $form_link = 'um_directory_listings';
    public $module_code = 'UM';
    public $title = 'U/M Directory Listings Form';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
        ],
        'skip_web_sockets' => true,
        //'no_ajax_form_reload' => true,
    ];
    public $containers = [
        'panels' => ['default_row_type' => 'grid', 'order' => 50, 'type' => 'panels'],
        'tree_container' => ['default_row_type' => 'grid', 'order' => 100],
        'details_container' => ['default_row_type' => 'grid', 'order' => 200],
    ];
    public $rows = [
        'panels' => [
            'tree' => ['order' => 100, 'label_name' => 'Tree View', 'loc' => 'NF.Form.TreeView', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'primary', 'percent' => 35],
            'details' => ['order' => 200, 'label_name' => 'Details', 'loc' => 'NF.Form.Details', 'panel_icon' => ['type' => 'fa-solid fa-sign-in-alt'], 'panel_type' => 'primary', 'percent' => 65],
        ]
    ];
    public $elements = [
        'panels' => [
            'tree' => [
                'tree' => ['container' => 'tree_container', 'order' => 100],
            ],
            'details' => [
                'details' => ['container' => 'details_container', 'order' => 100],
            ],
        ],
        'tree_container' => [
            'search' => [
                'search' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'placeholder' => 'Type here...', 'onkeyup' => "numbers_tree_search_for_text('numbers_tree_option_table_name_column_grouped', this);"]
            ],
            'tree' => [
                'tree' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'custom_renderer' => 'self::renderTreeListing']
            ],
            self::HIDDEN => [
                'cursor_id' => ['order' => 1, 'label_name' => 'Cursor #', 'type' => 'text', 'method' => 'hidden']
            ]
        ],
        'details_container' => [
            /*
            'header' => [
                'header' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'custom_renderer' => 'self::renderDetailsListing']
            ],
            */
            'details' => [
                'details' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'percent' => 100, 'custom_renderer' => 'self::renderDetailsListing']
            ]
        ]
    ];
    public $collection = [];
    public $notification = [];

    public $subforms = [
        'um_users' => [
            'form' => '\Numbers\Users\Users\Form\Users',
            'label_name' => 'Edit User',
            'icon' => 'fa-solid fa-users',
            'actions' => [
                'new' => ['name' => 'New User', 'icon' => 'fa-solid fa-users'],
                'edit' => ['name' => 'Edit User', 'url_edit' => true, 'icon' => 'fa-solid fa-users'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_roles' => [
            'form' => '\Numbers\Users\Users\Form\Roles',
            'label_name' => 'Edit Role',
            'icon' => 'fa-regular fa-user-circle',
            'actions' => [
                'new' => ['name' => 'New Role', 'icon' => 'fa-regular fa-user-circle'],
                'edit' => ['name' => 'Edit Role', 'url_edit' => true, 'icon' => 'fa-regular fa-user-circle'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_teams' => [
            'form' => '\Numbers\Users\Users\Form\Teams',
            'label_name' => 'Edit Team',
            'icon' => 'fa-solid fa-sitemap',
            'actions' => [
                'new' => ['name' => 'New Team', 'icon' => 'fa-solid fa-sitemap'],
                'edit' => ['name' => 'Edit Team', 'url_edit' => true, 'icon' => 'fa-solid fa-sitemap'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_domains' => [
            'form' => '\Numbers\Users\Users\Form\Domains',
            'label_name' => 'Edit Domain',
            'icon' => 'fa-solid fa-user-lock',
            'actions' => [
                'new' => ['name' => 'New Domain', 'icon' => 'fa-solid fa-user-lock'],
                'edit' => ['name' => 'Edit Domain', 'url_edit' => true, 'icon' => 'fa-solid fa-user-lock'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_realms' => [
            'form' => '\Numbers\Users\Users\Form\Realms',
            'label_name' => 'Edit Realm',
            'icon' => 'fa-solid fa-user-circle',
            'actions' => [
                'new' => ['name' => 'New Realm', 'icon' => 'fa-solid fa-user-circle'],
                'edit' => ['name' => 'Edit Realm', 'url_edit' => true, 'icon' => 'fa-solid fa-user-circle'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_groups' => [
            'form' => '\Numbers\Users\Users\Form\Groups',
            'label_name' => 'Edit Group',
            'icon' => 'fa-regular fa-object-group',
            'actions' => [
                'new' => ['name' => 'New Group', 'icon' => 'fa-regular fa-object-group'],
                'edit' => ['name' => 'Edit Group', 'url_edit' => true, 'icon' => 'fa-regular fa-object-group'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'um_classifications' => [
            'form' => '\Numbers\Users\Users\Form\Classifications',
            'label_name' => 'Edit Classification',
            'icon' => 'fa-brands fa-diaspora',
            'actions' => [
                'new' => ['name' => 'New Classification', 'icon' => 'fa-brands fa-diaspora'],
                'edit' => ['name' => 'Edit Classification', 'url_edit' => true, 'icon' => 'fa-brands fa-diaspora'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ],
        'on_organizations' => [
            'form' => '\Numbers\Users\Organizations\Form\Organizations',
            'label_name' => 'Edit Organization',
            'icon' => 'fa-regular fa-building',
            'actions' => [
                'new' => ['name' => 'New Organization', 'icon' => 'fa-regular fa-building'],
                'edit' => ['name' => 'Edit Organization', 'url_edit' => true, 'icon' => 'fa-regular fa-building'],
                'button' => [
                    'options' => [
                        '__subform_stripped_version' => 1
                    ]
                ]
            ],
        ]
    ];

    public function validate(& $form)
    {
        // nothing
    }

    public function renderTreeListing(& $form, & $options, & $value, & $neighbouring_values)
    {
        $data = (new DirectoryListing())->optionsGroupedConverted();
        return \HTML::tree([
            'id' => 'numbers_tree_id_directory_listing_tree_table',
            'form_id' => 'form_um_directory_listings_form',
            'options' => $data,
            'icon_key' => 'icon',
            'loc_prefix' => 'NF.System.',
            'collapse' => true,
            'id_column' => 'id',
            // cursor
            'cursor' => true,
            'cursor_id' => $form->values['cursor_id'] ?? null,
            'cursor_onclick' => "$('#form_um_directory_listings_element_cursor_id').val(id_column_id); $('#form_um_directory_listings_element_cursor_id').submit();",
            // search
            'search' => $form->values['search'] ?? null,
            'search_id' => 'form_um_directory_listings_element_search',
        ]);
    }

    public function renderDetailsListing(& $form, & $options, & $value, & $neighbouring_values)
    {
        $cursor = explode('-', $form->values['cursor_id'] ?? '');
        $cursor_original = explode('-', $form->values['cursor_id'] ?? '');
        $result = '';
        $data = [];
        $mapping = [
            'dir_type-1000' => 'dir_type',
            'dir_type-1100' => 'user_type',
            'dir_type-1200' => 'user_organization',
            'dir_type-1300' => 'user_role',
            'dir_type-1400' => 'user_team',
            'dir_type-1500' => 'user_realm',
            'dir_type-1600' => 'user_domain',
            'dir_type-1700' => 'user_group',
            'dir_type-1800' => 'user_classification',
            'user_type' => 'users_by_type',
            'user_organization' => 'user_organization_users',
            'users_by_type' => 'users_by_type2',
            'user_organization_users' => 'user_organization_users2',
            'user_role' => 'user_role_users',
            'user_role_users' => 'user_role_users2',
            'user_team' => 'user_team_users',
            'user_team_users' => 'user_team_users2',
            'user_realm' => 'user_realm_users',
            'user_realm_users' => 'user_realm_users2',
            'user_domain' => 'user_domain_users',
            'user_domain_users' => 'user_domain_users2',
            'user_group' => 'user_group_users',
            'user_group_users' => 'user_group_users2',
            'user_classification' => 'user_classification_users',
            'user_classification_users' => 'user_classification_users2',
        ];
        $types = [
            'dir_type-1000' => 'General',
            'dir_type-1100' => 'User Types',
            'dir_type-1200' => 'User Organizations',
            'dir_type-1300' => 'User Roles',
            'dir_type-1400' => 'User Teams',
            'dir_type-1500' => 'User Realms',
            'dir_type-1600' => 'User Domains',
            'dir_type-1700' => 'User Groups',
            'dir_type-1800' => 'User Classifications',
            'user_type' => 'Type',
            'user_organization' => 'Organization',
            'users_by_type' => 'User',
            'user_organization_users' => 'User',
            'user_role' => 'Role',
            'user_role_users' => 'User',
            'user_team' => 'Team',
            'user_team_users' => 'User',
            'user_realm' => 'Realm',
            'user_realm_users' => 'User',
            'user_domain' => 'Domain',
            'user_domain_users' => 'User',
            'user_group' => 'Group',
            'user_group_users' => 'User',
            'user_classification' => 'Classification',
            'user_classification_users' => 'User',
        ];
        $cursor[0] = $mapping[$cursor[0] . '-' . ($cursor[1] ?? '')] ?? $mapping[$cursor[0]] ?? $cursor[0];
        $cursor[1] = $cursor[1] ?? null;
        $cursor[1] = $only_parent = strpos($cursor[0], '-') !== false ? explode('-', $cursor[0])[1] : $cursor[1];
        // main switch
        switch ($cursor[0]) {
            case 'dir_type':
                $data = DirectoryListing::getStatic([
                    'where' => [
                        'only_type' => 'dir_type',
                        'only_parent' => $only_parent,
                    ]
                ]);
                break;
                // top level items
            case 'user_type':
            case 'user_organization':
            case 'user_role':
            case 'user_team':
            case 'user_realm':
            case 'user_domain':
            case 'user_group':
            case 'user_classification':
                $data = DirectoryListing::getStatic([
                    'where' => [
                        'only_type' => $cursor[0],
                    ],
                ]);
                break;
                // drill downs
            case 'users_by_type':
            case 'user_organization_users':
            case 'user_role_users':
            case 'user_team_users':
            case 'user_realm_users':
            case 'user_domain_users':
            case 'user_group_users':
            case 'user_classification_users':
                $data = DirectoryListing::getStatic([
                    'where' => [
                        'only_type' => $cursor[0],
                        'only_parent' => $cursor[1],
                    ],
                ]);
                break;
            case 'users_by_type2':
            case 'user_organization_users2':
            case 'user_role_users2':
            case 'user_team_users2':
            case 'user_realm_users2':
            case 'user_domain_users2':
            case 'user_group_users2':
            case 'user_classification_users2':
                $data = DirectoryListing::getStatic([
                    'where' => [
                        'only_type' => 'users_by_type2',
                        'only_parent' => (int) $cursor_original[1],
                    ],
                ]);
                break;
            default:
                $result .= loc('NF.Form.NoAdditionalInformationDot', 'No additional information.');
        }
        // render table
        if (count($data) > 0) {
            $result .= '<table class="table table-striped" width="100%">';
            $result .= '<tr>';
            $result .= '<th width="1%">&nbsp;</th>';
            $result .= '<th width="10%">' . loc('NF.Form.Type', 'Type') . '</th>';
            $result .= '<th width="10%">' . loc('NF.Form.ID', 'ID') . '</th>';
            $result .= '<th width="78%">' . loc('NF.Form.Name', 'Name') . '</th>';
            $result .= '<th width="10%">' . loc('NF.Form.Open', 'Open') . '</th>';
            $result .= '<th width="1%">' . loc('NF.Form.Active', 'Active') . '</th>';
            $result .= '</tr>';
            $index = 1;
            foreach ($data as $k => $v) {
                $result .= '<tr>';
                $result .= '<td width="1%">' . $index . '.' . '</td>';
                $result .= '<td width="10%">' . $types[$v['type']] . '</td>';
                $result .= '<td width="10%">';
                if ($v['edit_url']) {
                    $result .= \HTML::a(['value' => '#' . $v['reference'], 'href' => $v['edit_url'], 'target' => '_blank']);
                } else {
                    $result .= $v['reference'] ? ('#' . $v['reference']) : '&nbsp;';
                }
                $result .= '</td>';
                $icon = '';
                if ($v['icon']) {
                    $icon = \HTML::icon(['type' => $v['icon']]) . ' ';
                } elseif ($v['avatar']) {
                    $temp = explode('_', $v['avatar']);
                    $icon = Colors::renderAvatar($v['name'], $temp[1], $temp[2] == 'small') . ' ';
                }
                $result .= '<td width="88%">' . $icon . $v['name'] . '</td>';
                $result .= '<td width="10%">';
                $onclick = '';
                if (in_array($v['type'], ['users_by_type', 'user_organization_users', 'user_role_users', 'user_team_users', 'user_domain_users', 'user_realm_users', 'user_group_users', 'user_classification_users'])) {
                    $onclick = $form->generateSubformLink('um_users', $this->subforms['um_users'], ['um_user_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_role'])) {
                    $onclick = $form->generateSubformLink('um_roles', $this->subforms['um_roles'], ['um_role_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_organization'])) {
                    $onclick = $form->generateSubformLink('on_organizations', $this->subforms['on_organizations'], ['on_organization_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_team'])) {
                    $onclick = $form->generateSubformLink('um_teams', $this->subforms['um_teams'], ['um_team_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_domain'])) {
                    $onclick = $form->generateSubformLink('um_domains', $this->subforms['um_domains'], ['um_domain_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_realm'])) {
                    $onclick = $form->generateSubformLink('um_realms', $this->subforms['um_realms'], ['um_realm_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_group'])) {
                    $onclick = $form->generateSubformLink('um_groups', $this->subforms['um_groups'], ['um_usrgrp_id' => $v['reference']], ['link_only' => true]);
                } elseif (in_array($v['type'], ['user_classification'])) {
                    $onclick = $form->generateSubformLink('um_classifications', $this->subforms['um_classifications'], ['um_classification_id' => $v['reference']], ['link_only' => true]);
                }
                if ($onclick) {
                    $result .= \HTML::a(['value' => loc('NF.Form.Inline', 'Inline'), 'href' => 'javascript:void(0);', 'onclick' => $onclick]);
                } else {
                    $result .= '&nbsp;';
                }
                $result .= '</td>';
                $result .= '<td width="1%">' . ($v['inactive'] ? loc('NF.Form.No', 'No') : loc('NF.Form.Yes', 'Yes')) . '</td>';

                $result .= '</tr>';
                $index++;
            }
            $result .= '</table>';
        }
        // nothing
        //$result .= print_r2($data, '', true);
        return $result;
    }
}
