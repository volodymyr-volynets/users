<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Task;

use Numbers\Users\Users\Model\User\PIIs;

class UMUserPIIComputedFields
{
    public $task_code = 'UM::USERS::PIIS::ALL_COMPUTED';

    public function execute(array $parameters, array $options = []): array
    {
        $model = new PIIs();
        $query = PIIs::queryBuilderStatic(['alias' => 'a', 'skip_acl' => true])
            ->update()
            ->set([
                'um_usrpii_age_in_years;=;~~' => "CASE WHEN um_usrpii_date_of_birth IS NOT NULL THEN " . $model->db_object->sqlHelper('age_in_years', ['column' => 'um_usrpii_date_of_birth']) . " ELSE null END",
                'um_usrpii_seniority_in_years;=;~~' => "CASE WHEN um_usrpii_date_of_seniority IS NOT NULL THEN " . $model->db_object->sqlHelper('age_in_years', ['column' => 'um_usrpii_date_of_seniority']) . " ELSE null END",
                'um_usrpii_joining_in_days;=;~~' => "CASE WHEN um_usrpii_datetime_of_joining IS NOT NULL THEN " . $model->db_object->sqlHelper('age_in_days_float', ['column' => 'um_usrpii_datetime_of_joining']) . " ELSE null END",
                'um_usrpii_last_purchase_in_days;=;~~' => "CASE WHEN um_usrpii_datetime_of_last_purchase IS NOT NULL THEN " . $model->db_object->sqlHelper('age_in_days_float', ['column' => 'um_usrpii_datetime_of_last_purchase']) . " ELSE null END",
                'um_usrpii_last_login_in_days;=;~~' => "CASE WHEN um_usrpii_datetime_of_last_login IS NOT NULL THEN " . $model->db_object->sqlHelper('age_in_days_float', ['column' => 'um_usrpii_datetime_of_last_login']) . " ELSE null END",
            ]);
        if (!empty($parameters)) {
            $query = $query->whereMultiple('AND', $parameters);
        }
        $result = $query->query();
        return $result;
    }
}
