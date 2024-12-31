<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\APIs;

use Object\Controller\API;

class Groups extends API
{
    public function actionGet()
    {
        $result = \Numbers\Users\Users\Form\Groups::API()->get($this->api_input, ['simple' => true, 'method' => 'Get']);
        $this->handleOutput($result);
    }
    public function actionSave()
    {
        $result = \Numbers\Users\Users\Form\Groups::API()->save($this->api_input, ['simple' => true]);
        $this->handleOutput($result);
    }
    public function actionDelete()
    {
        $result = \Numbers\Users\Users\Form\Groups::API()->delete($this->api_input, ['simple' => true]);
        $this->handleOutput($result);
    }
    public function actionGetStructure()
    {
        return '';
    }
}
