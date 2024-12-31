<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Form\APIResources;

use Object\Form\Parent2;

class Collection extends \Object\Form\Wrapper\Collection
{
    public $collection_link = 'a3_api_resources_collection';
    public const BYPASS = ['sm_resource_module_code', 'sm_resource_version_code', 'sm_resource_id', 'full_text_search'];
    public $data = [
        self::MAIN_SCREEN => [
            'order' => 1000,
            'options' => [
                'segment' => Parent2::SEGMENT_FORM,
            ],
            self::ROWS => [
                self::HEADER_ROW => [
                    'order' => 100,
                    self::FORMS => [
                        'dn_page_repositories' => [
                            'model' => '\Numbers\Users\APIs\Form\APIResources\ResourceModules',
                            'flag_main_form' => true,
                            'bypass_values' => self::BYPASS,
                            'options' => [
                                'percent' => 100
                            ],
                            'order' => 1
                        ]
                    ]
                ],
                self::MAIN_ROW => [
                    'order' => 200,
                    self::FORMS => [
                        'a3_api_resources_resource_tree' => [
                            'model' => '\Numbers\Users\APIs\Form\APIResources\ResourceTree',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'bypass_hidden_from_input' => self::BYPASS,
                                'percent' => 30
                            ],
                            'order' => 1
                        ],
                        'a3_api_resources_resource_view' => [
                            'model' => '\Numbers\Users\APIs\Form\APIResources\ResourceView',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'bypass_hidden_from_input' => self::BYPASS,
                                'percent' => 70
                            ],
                            'order' => 2
                        ]
                    ]
                ],
                /*
                self::SEARCH_ROW => [
                    'order' => 200,
                    self::FORMS => [
                        'dn_page_repository_search' => [
                            'model' => '\Numbers\Documentation\Documentation\Form\Repository\Page\Search',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'bypass_hidden_from_input' => self::BYPASS,
                                'percent' => 100
                            ],
                            'order' => 1
                        ],
                    ]
                ],
                self::WIDGETS_ROW => [
                    'options' => [
                        'type' => 'tabs',
                        'segment' => \Object\Form\Parent2::SEGMENT_ADDITIONAL_INFORMATION,
                        'its_own_segment' => true
                    ],
                    'order' => PHP_INT_MAX - 1000,
                    self::FORMS => [
                        'wg_comments' => [
                            'model' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments',
                            'submodule' => 'Numbers.Users.Widgets.Comments',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Comments',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Documentation\Documentation\Model\Repository\Version\Pages',
                            ],
                            'order' => 1,
                        ],
                        'wg_documents' => [
                            'model' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents',
                            'submodule' => 'Numbers.Users.Widgets.Documents',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Documents',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Documentation\Documentation\Model\Repository\Version\Pages',
                            ],
                            'order' => 2,
                        ],
                        'wg_tags' => [
                            'model' => '\Numbers\Users\Widgets\Tags\Form\List2\Tags',
                            'submodule' => 'Numbers.Users.Widgets.Tags',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Tags',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Documentation\Documentation\Model\Repository\Version\Pages',
                            ],
                            'order' => 3,
                        ],
                    ]
                ]
                */
            ]
        ],
    ];

    public function distribute()
    {
        if (!empty($this->values['full_text_search']) && !empty($this->values['sm_resource_module_code'])) {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::MAIN_ROW]);
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
        } elseif (empty($this->values['sm_resource_module_code'])) {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::MAIN_ROW]);
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::SEARCH_ROW]);
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
        } elseif (empty($this->values['dn_repopage_id'])) {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::MAIN_ROW][self::FORMS]['dn_page_repository_page_view']);
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::SEARCH_ROW]);
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
        } else {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::SEARCH_ROW]);
        }
    }
}
