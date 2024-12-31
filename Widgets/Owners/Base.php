<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Owners;

class Base
{
    /**
     * Addresses
     */
    public const OWNERS = '__widget_owners';
    public const OWNERS_DATA = ['order' => PHP_INT_MAX - 2200, 'label_name' => 'Owners', 'widget' => 'owners'];
}
