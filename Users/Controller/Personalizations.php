<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller;

use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Personalizations extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\List2\Personalizations([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }

    #[\View(array('type' => 'react', 'component' => 'PersonalizationResizeImage', 'root' => 'numbers_controller_and_view_personalization_resize_image', 'path' => '/Numbers/Users/Users/View/PersonalizationResizeImage.template.react.tsx'))]
    public function actionEdit()
    {
        $form = new \Numbers\Users\Users\Form\Personalizations([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Users\Users\Form\Personalizations',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
