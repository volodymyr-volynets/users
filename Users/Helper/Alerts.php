<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper;

use Numbers\Users\Users\Model\User\AlertsAR;

class Alerts
{
    /**
     * Create
     *
     * @param array $options
     */
    public static function create($options = []): array
    {
        $alert_ar = new AlertsAR();
        return $alert_ar
            ->fill([
                'um_usralert_tenant_id' => \Tenant::id(),
                'um_usralert_um_user_id' => $options['um_usralert_um_user_id'],
                'um_usralert_um_usralrttype_code' => $options['um_usralert_um_usralrttype_code'],
                'um_usralert_record_id' => $options['um_usralert_record_id'] ?? null,
                'um_usralert_record_code' => $options['um_usralert_record_code'] ?? null,
                'um_usralert_description' => $options['um_usralert_description'] ?? null,
                'um_usralert_loc_json' => $options['um_usralert_loc_json'],
                'um_usralert_url' => $options['um_usralert_url'] ?? null,
                'um_usralert_body' => $options['um_usralert_body'] ?? null,
                'um_usralert_inactive' => $options['um_usralert_inactive'] ?? 0,
            ])
            ->merge();
    }
}
