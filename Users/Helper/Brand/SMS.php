<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Brand;

class SMS
{
    /**
     * Render top brand name
     */
    public function renderTopSMSBrandName(& $form)
    {
        $name = \Application::get('brand.name.welcome');
        if ($name) {
            $name = '[' . $name . ']';
        }
        return $name;
    }
}
