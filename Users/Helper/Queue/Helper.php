<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Queue;

use Numbers\Users\Organizations\Model\Queue\OwnerTypes;
use Numbers\Users\Users\Model\Owner\Users;

class Helper
{
    /**
     * Start
     *
     * @param string $linked_type
     * @param int $linked_module_id
     * @param int $linked_id
     * @param string $owner_type
     * @param int $user_id
     * @param array $options
     *		string um_owneruser_queue_hash
     *		string|array um_owneruser_queue_selection
     * @return array
     */
    public static function startOwners(string $linked_type, int $linked_module_id, int $linked_id, string $owner_type, int $user_id, array $options = []): array
    {
        $owner_type_data = OwnerTypes::getStatic([
            'where' => [
                'on_ownertype_code' => $owner_type
            ],
            'pk' => null,
            'single_row' => true
        ]);
        $data = [
            'um_owneruser_type_id' => $owner_type_data['on_ownertype_id'],
            'um_owneruser_type_code' => $owner_type,
            'um_owneruser_user_id' => $user_id,
            'um_owneruser_linked_type_code' => $linked_type,
            'um_owneruser_linked_module_id' => $linked_module_id,
            'um_owneruser_linked_id' => $linked_id,
            'um_owneruser_inactive' => 0
        ];
        if (!empty($options['um_owneruser_queue_hash'])) {
            $data['um_owneruser_queue_hash'] = $options['um_owneruser_queue_hash'] . '';
        }
        if (!empty($options['um_owneruser_queue_selection'])) {
            $data['um_owneruser_queue_selection'] = $options['um_owneruser_queue_selection'];
        }
        return Users::collectionStatic()->merge($data);
    }
}
