<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Form\Grant;

use Numbers\Users\Users\DataSource\Users;
use Numbers\Users\Users\Model\User\Organizations;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class GrantOrganizations extends Base
{
    public $form_link = 'um_grant_organizations';
    public $module_code = 'UM';
    public $title = 'U/M Grant Organizations Form';
    public $options = [
        'segment' => [
            'type' => 'primary',
            'header' => [
                'icon' => ['type' => 'fas fa-pen-square'],
                'title' => 'Grant Organizations:'
            ]
        ],
        'actions' => [
            'refresh' => true,
        ],
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'grant' => ['default_row_type' => 'grid', 'order' => 200],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'um_user_id' => [
                'um_user_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true],
                'um_user_id2' => ['order' => 2, 'label_name' => 'User #', 'domain' => 'user_id', 'percent' => 25, 'null' => true],
                'um_user_type_id1' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
            ],
            'roles_filter' => [
                'um_usrrol_role_id1' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Roles', 'domain' => 'role_id', 'null' => true, 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsGrouped'],
                'um_usrorg_organization_id1' => ['order' => 2, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped'],
            ],
        ],
        'grant' => [
            'um_usrorg_organization_id2' => [
                'um_usrorg_organization_id2' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Grant Organizations', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT => ['value' => 'Grant'] + self::BUTTON_SUBMIT_SAVE_DATA,
            ]
        ]
    ];
    public $collection = [];
    public $notification = [];
    public $job;

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        $users = Users::getStatic([
            'where' => [
                'selected_organizations' => array_keys($form->values['um_usrorg_organization_id1']),
                'selected_roles' => array_keys($form->values['um_usrrol_role_id1']),
                'user_id1' => $form->values['um_user_id1'],
                'user_id2' => $form->values['um_user_id2'],
                'user_type' => array_keys($form->values['um_user_type_id1']),
            ]
        ]);
        if (empty($users)) {
            $form->error(DANGER, Messages::NO_ROWS_FOUND);
            return;
        }
        $new_organizations = array_keys($form->values['um_usrorg_organization_id2']);
        $organization_model = new Organizations();
        $organization_model->db_object->begin();
        $new_insert = [];
        $existing_organizations = Organizations::getStatic([
            'where' => [
                'um_usrorg_user_id' => array_keys($users),
            ],
            'pk' => ['um_usrorg_user_id', 'um_usrorg_organization_id']
        ]);
        foreach ($users as $k => $v) {
            foreach ($new_organizations as $v2) {
                if (empty($existing_organizations[$k][$v2])) {
                    $new_insert[$k . '-' . $v2] = [
                        'um_usrorg_user_id' => $k,
                        'um_usrorg_organization_id' => $v2,
                    ];
                }
            }
        }
        if (!empty($new_insert)) {
            $result = $organization_model->collection()->mergeMultiple($new_insert);
            if (!$result['success']) {
                $form->error(DANGER, $result['error']);
                $organization_model->db_object->rollback();
                return;
            }
        }
        $organization_model->db_object->commit();
        $form->error(SUCCESS, Messages::OPERATION_EXECUTED);
        $form->error(SUCCESS, 'Granted [users].', null, ['replace' => ['[users]' => count($new_insert)]]);
    }
}
