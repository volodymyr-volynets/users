<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Controller\Account;

use Numbers\Users\Users\Form\Account\Message;
use Numbers\Users\Users\Model\Message\Bodies;
use Numbers\Users\Users\Model\Message\Recipients;
use Object\Controller\Authorized;

class Messages extends Authorized
{
    public function actionIndex()
    {
        $form = new \Numbers\Users\Users\Form\List2\Account\Messages([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $input = \Request::input();
        if (!empty($input['message_id'])) {
            $model = new \Numbers\Users\Users\DataSource\Messages();
            $data = $model->get([
                'where' => [
                    'user_id' => \User::id(),
                    'message_id' => $input['message_id']
                ],
                'pk' => null
            ]);
        }
        // we redirect back if message not found
        if (empty($input['message_id']) || empty($data)) {
            \Request::redirect('/Numbers/Users/Users/Controller/Account/Messages');
        }
        $data = current($data);
        // if unread we must mark it as read
        if (empty($data['read'])) {
            $read_model = new Recipients();
            $read_model->markAsRead($input['message_id'], $data['to_type_id'], \User::id());
        }
        // generate html
        $table = \HTML::table([
            'skip_header' => 1,
            'options' => [
                'from' => [
                    'name' => ['value' => i18n(null, 'From'), 'width' => '1%'],
                    'sep' => ['value' => ' ', 'width' => '1%'],
                    'value' => $data['from_name'] . ' &lt;' . $data['from_email'] . '&gt;'
                ],
                'to' => [
                    'name' => ['value' => i18n(null, 'To'), 'width' => '1%'],
                    'sep' => ['value' => ' ', 'width' => '1%'],
                    'value' => $data['to_name'] . ' &lt;' . ($data['to_email'] ? $data['to_email'] : $data['to_phone']) . '&gt;'
                ],
                'date' => [
                    'name' => ['value' => i18n(null, 'Date'), 'width' => '1%'],
                    'sep' => ['value' => ' ', 'width' => '1%'],
                    'value' => \Format::niceTimestamp($data['timestamp'])
                ],
                'important' => [
                    'name' => ['value' => i18n(null, 'Important'), 'width' => '1%'],
                    'sep' => ['value' => ' ', 'width' => '1%'],
                    'value' => ($data['important'] ? i18n(null, 'Yes') : i18n(null, 'No'))
                ],
                'subject' => [
                    'name' => ['value' => ($data['type'] == 20) ? i18n(null, 'Message') : i18n(null, 'Subject'), 'width' => '1%'],
                    'sep' => ['value' => ' ', 'width' => '1%'],
                    'value' => \HTML::b(['value' => $data['subject']])
                ],
            ],
            'class' => '',
            'cellpadding' => 2
        ]);
        $crypt = new \Crypt();
        if (!empty($data['body_id'])) {
            $iframe = \HTML::iframe([
                'src' => \Request::host() . 'Numbers/Users/Users/Controller/Account/Messages/_ViewBody?token=' . $crypt->tokenCreate($data['body_id'], 'message.body'),
                'width' => '100%',
                'height' => '100%',
                'border' => 0,
                'style' => 'height: 700px;'
            ]);
        } else {
            $iframe = '';
        }
        $grid = [
            'options' => [
                'Links Row' => [
                    'Header' => [
                        'Header' => [
                            'value' => \HTML::a(['href' => '/Numbers/Users/Users/Controller/Account/Messages', 'value' => \HTML::icon(['type' => 'fas fa-arrow-left']) . ' ' . i18n(null, 'Back')]),
                            'options' => [
                                'percent' => 100,
                                'style' => 'text-align: right;'
                            ]
                        ]
                    ]
                ],
                'Separator Row 1' => [
                    'Separator' => [
                        'Separator' => [
                            'value' => '<hr/>',
                            'options' => [
                                'percent' => 100,
                            ]
                        ]
                    ]
                ],
                'Header Row' => [
                    'Header' => [
                        'Header' => [
                            'value' => $table,
                            'options' => [
                                'percent' => 100,
                            ]
                        ]
                    ]
                ],
                'Separator Row 2' => [
                    'Separator' => [
                        'Separator' => [
                            'value' => '<hr/>',
                            'options' => [
                                'percent' => 100,
                            ]
                        ]
                    ]
                ],
                'Body Row' => [
                    'Body' => [
                        'Header' => [
                            'value' => $iframe,
                            'options' => [
                                'percent' => 100,
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $grid = \HTML::grid($grid);
        echo \HTML::segment([
            'type' => 'primary',
            'value' => $grid,
            'header' => [
                'icon' => ['type' => 'fas fa-pen-square'],
                'title' => i18n(null, 'View Message:')
            ]
        ]);
    }
    public function actionNew()
    {
        $form = new Message([
            'input' => \Request::input(null, false)
        ]);
        echo $form->render();
    }
    public function actionJsonMenuName()
    {
        // fetch number of messages
        $query = Recipients::queryBuilderStatic()->select();
        $query->columns(['count' => 'COUNT(*)']);
        $query->where('AND', ['a.um_mesrecip_read', '=', 0]);
        $query->where('AND', ['a.um_mesrecip_user_id', '=', \User::id()]);
        $data = $query->query();
        // generate message
        $label = '<table width="100%"><tr><td width="99%">' . \HTML::icon(['type' => 'far fa-envelope']) . ' ' . i18n(null, 'Messages') . '</td><td width="1%">' . \HTML::label2(['type' => 'primary', 'value' => \Format::id($data['rows'][0]['count'])]) . '</td></tr></table>';
        \Layout::renderAs([
            'success' => true,
            'error' => [],
            'data' => $label,
            'item' => \Request::input('item')
        ], 'application/json');
    }
    public function actionViewBody()
    {
        $input = \Request::input();
        // verify token
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'] ?? '', ['message.body']);
        // fetch body
        $data = Bodies::getStatic([
            'where' => [
                'um_mesbody_id' => $token_data['id']
            ],
            'pk' => null,
            'single_row' => true
        ]);
        if (!empty($data['um_mesbody_bytea'])) {
            \Layout::renderAs($crypt->uncompress($data['um_mesbody_bytea']), 'text/html', ['extension' => 'plain']);
        } else {
            \Layout::renderAs($data['um_mesbody_body'], 'text/html', ['extension' => 'plain']);
        }
    }
}
