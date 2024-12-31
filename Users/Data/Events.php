<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

use Object\Import;

class Events extends Import
{
    public $data = [
        'events' => [
            'options' => [
                'pk' => ['sm_event_code'],
                'model' => '\Numbers\Backend\System\Events\Model\Events',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_event_code' => 'UM::USER_LOG_LOGINS',
                    'sm_event_name' => 'U/M User Log Logins (Event)',
                    'sm_event_description' => 'Dispatch this event after user logins.',
                    'sm_event_model' => null,
                    'sm_event_module_code' => 'UM',
                    'sm_event_inactive' => 0,
                ],
            ],
        ],
        'queues' => [
            'options' => [
                'pk' => ['sm_evtqueue_code'],
                'model' => '\Numbers\Backend\System\Events\Model\Queues',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_evtqueue_code' => 'UM::DEFAULT',
                    'sm_evtqueue_name' => 'U/M Default (Queue)',
                    'sm_evtqueue_inactive' => 0,
                ],
            ],
        ],
        'subscribers' => [
            'options' => [
                'pk' => ['sm_evtsubscriber_code'],
                'model' => '\Numbers\Backend\System\Events\Model\Collection\Subscribers',
                'method' => 'save',
            ],
            'data' => [
                [
                    'sm_evtsubscriber_code' => 'UM::USER_LOGIN_SUBSCRIBER',
                    'sm_evtsubscriber_name' => 'U/M User Login (Subscriber)',
                    'sm_evtsubscriber_model' => '\Numbers\Users\Users\Event\UserLoginSubscriber',
                    'sm_evtsubscriber_module_code' => 'UM',
                    'sm_evtsubscriber_inactive' => 0,
                    '\Numbers\Backend\System\Events\Model\Subscriptions' => [
                        [
                            'sm_evtsubscription_sm_event_code' => 'UM::USER_LOG_LOGINS',
                            'sm_evtsubscription_sm_evtqueue_code' => 'UM::DEFAULT',
                            'sm_evtsubscription_type_code' => '*,SM::REQUEST_END',
                            'sm_evtsubscription_cron' => null,
                            'sm_evtsubscription_max_retries' => 3,
                            'sm_evtsubscription_inactive' => 0,
                        ],
                    ]
                ],
            ],
        ]
    ];
}
