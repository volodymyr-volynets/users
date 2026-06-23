<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Class2;

abstract class DashboardAbstract2
{
    /**
     * Dashboard code
     *
     * @var string
     */
    public $dashboard_code = '';

    /**
     * Parameters
     *
     * @var array
     */
    public $parameters = [];

    /**
     * Render
     *
     * @param array $options
     * @return array
     */
    abstract public function render(array $options = []): array;
}
