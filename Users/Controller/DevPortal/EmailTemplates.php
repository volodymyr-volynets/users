<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\DevPortal;

use Object\Controller;

class EmailTemplates extends Controller
{
    public $title = 'Email Templates';

    public function actionIndex()
    {
        if (!\Application::get('debug.toolbar')) {
            throw new \Exception('You must enabled toolbar to view Dev. Portal.');
        }
        $input = \Request::input();
        if (empty($input['__class'])) {
            throw new \Exception('You must supply __class!');
        }
        $class = $input['__class'];
        unset($input['__class']);
        $form = new $class([
            'input' => $input,
        ]);
        $result = $form->render();
        \Layout::renderAs($result, 'text/html', [
            'extension' => 'email',
        ]);
    }
}
