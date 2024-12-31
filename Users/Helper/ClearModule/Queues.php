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

class Queues
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
        $query = \Numbers\Users\Users\Model\Queues::queryBuilderStatic()->delete();
        if (!is_array($type_code)) {
            $type_code = [$type_code];
        }
        foreach ($type_code as $v) {
            $query->where('OR', ['a.um_queue_hash', 'LIKE', $v . '%']);
        }
        return $query->query();
    }
}
