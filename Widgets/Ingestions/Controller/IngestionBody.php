<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Controller;

use Numbers\Users\Widgets\Ingestions\Model\EmailBodies;
use Object\Controller;

class IngestionBody extends Controller
{
    public $title = 'Ingestion Body';
    public $acl = [
        'public' => 1,
        'authorized' => 1
    ];

    public function actionIndex()
    {
        $input = \Request::input();
        // verify token
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'] ?? '', ['ingestion.body']);
        // fetch body
        $data = EmailBodies::getStatic([
            'where' => [
                'wg_emailingbody_id' => $token_data['id']
            ],
            'pk' => null,
            'single_row' => true
        ]);
        // render
        if (!empty($data['wg_emailingbody_text'])) {
            \Layout::renderAs($data['wg_emailingbody_text'], 'text/html', ['extension' => 'plain']);
        } else {
            \Layout::renderAs($crypt->uncompress($data['wg_emailingbody_message']), 'text/html', ['extension' => 'plain']);
        }
    }
}
