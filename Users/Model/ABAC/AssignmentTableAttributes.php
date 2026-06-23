<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\ABAC;

use Object\Data;

class AssignmentTableAttributes extends Data
{
    public $module_code = 'UM';
    public $title = 'U/M Assignment Table Attributes';
    public $column_key = 'um_abacasstblatr_code';
    public $column_prefix = 'um_abacasstblatr_';
    public $orderby = [
        'um_abacasstblatr_order' => SORT_ASC,
    ];

    public $columns = [
        'um_abacasstblatr_code' => ['name' => 'Type Code', 'domain' => 'code'],
        'um_abacasstblatr_name' => ['name' => 'Name', 'type' => 'text'],
        'um_abacasstblatr_model' => ['name' => 'Model', 'type' => 'code', 'null' => true],
        'um_abacasstblatr_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        '*' => ['um_abacasstblatr_name' => '* (All)', 'um_abacasstblatr_model' => '', 'um_abacasstblatr_order' => 1000],
        'Not_Self' => ['um_abacasstblatr_name' => 'Not Self', 'um_abacasstblatr_model' => '', 'um_abacasstblatr_order' => 2000],
        // from $scoped_attributes tables - U/M
        'UM_Users' => ['um_abacasstblatr_name' => 'U/M Users', 'um_abacasstblatr_model' => '\Numbers\Users\Users\Model\Users', 'um_abacasstblatr_order' => 3000],
        'UM_Roles' => ['um_abacasstblatr_name' => 'U/M Roles', 'um_abacasstblatr_model' => '\Numbers\Users\Users\Model\Roles', 'um_abacasstblatr_order' => 3010],
        'UM_Teams' => ['um_abacasstblatr_name' => 'U/M Teams', 'um_abacasstblatr_model' => 'Numbers\Users\Users\Model\Teams', 'um_abacasstblatr_order' => 3020],
        'UM_Groups' => ['um_abacasstblatr_name' => 'U/M Groups', 'um_abacasstblatr_model' => '\Numbers\Users\Users\Model\User\Groups', 'um_abacasstblatr_order' => 3030],
        // from $scoped_attributes tables - O/N
        'ON_Customers' => ['um_abacasstblatr_name' => 'O/N Customers', 'um_abacasstblatr_model' => '\Numbers\Users\Organizations\Model\Customers', 'um_abacasstblatr_order' => 4000],
        'ON_Locations' => ['um_abacasstblatr_name' => 'O/N Locations', 'um_abacasstblatr_model' => '\Numbers\Users\Organizations\Model\Locations', 'um_abacasstblatr_order' => 4010],
        'ON_Organizations' => ['um_abacasstblatr_name' => 'O/N Organizations', 'um_abacasstblatr_model' => '\Numbers\Users\Organizations\Model\Organizations', 'um_abacasstblatr_order' => 4020],
    ];
}
