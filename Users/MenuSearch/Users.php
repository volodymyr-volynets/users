<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\MenuSearch;

use Numbers\Backend\System\Modules\Class2\MenuSearchAbstract2;

class Users extends MenuSearchAbstract2
{
    public $menu_search_code = 'UM::USERS_SEARCH';

    public $sm_model_code = '\Numbers\Users\Users\Model\Users';

    public $search_columns = [
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id_sequence', 'menu_search_default' => true],
        'um_user_code' => ['name' => 'User Number', 'domain' => 'group_code', 'null' => true],
        'um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_user_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
        'um_user_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
        'um_user_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
        'um_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
    ];

    public $list_columns = [
        'um_user_id' => ['name' => 'User #', 'domain' => 'user_id_sequence', 'menu_search_url' => true, 'menu_search_url' => '/Numbers/Users/Users/Controller/Users/_Edit?um_user_id='],
        'um_user_code' => ['name' => 'User Number', 'domain' => 'group_code', 'null' => true],
        'um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_user_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
        'um_user_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
        'um_user_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
        'um_user_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_user_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
    ];

    /**
     * Render
     *
     * @param array $options
     * @return array{error: array, html: int|string, success: bool}
     */
    public function render(array $options = []): array
    {
        $search_values = $this->processSearchText($options['search_text'] ?? '');
        $rows = $this->processQueryBuilder($search_values);
        return [
            'success' => true,
            'error' => [],
            'html' => $this->renderTables($rows),
        ];
    }
}
