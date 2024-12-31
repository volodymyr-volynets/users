<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\ClearModule;

use Numbers\Users\Users\Model\Owner\Users;

class Owners
{
    /**
     * Execute
     *
     * @param int $module_id
     * @param array|string $type_code
     * @return array
     */
    public function execute(int $module_id, $type_code): array
    {
        $query = Users::queryBuilderStatic()->delete();
        $query->where('AND', ['a.um_owneruser_linked_module_id', '=', $module_id]);
        $query->where('AND', ['a.um_owneruser_linked_type_code', '=', $type_code]);
        return $query->query();
    }
}
