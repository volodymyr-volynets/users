<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\User;

use Object\Content\Messages;

class Types
{
    /**
     * Validate names based on type
     *
     * @param object $form
     * @param string $column_prefix
     * @return string
     */
    public static function validateType(& $form, string $column_prefix): string
    {
        // personal type
        if ($form->values[$column_prefix . 'type_id'] == 10) {
            if (empty($form->values[$column_prefix . 'first_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, $column_prefix . 'first_name');
            }
            if (empty($form->values[$column_prefix . 'last_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, $column_prefix . 'last_name');
            }
            $name = concat_ws(' ', $form->values[$column_prefix . 'title'], $form->values[$column_prefix . 'first_name'], $form->values[$column_prefix . 'last_name']);
        } elseif ($form->values[$column_prefix . 'type_id'] == 20) { // business
            if (empty($form->values[$column_prefix . 'company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, $column_prefix . 'company');
            }
            $name = $form->values[$column_prefix . 'company'];
        }
        return $name;
    }
}
