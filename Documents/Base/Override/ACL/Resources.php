<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Override\ACL;

class Resources
{
    public $data = [
        'generate_photo' => [
            'generate_url' => [
                'method' => '\Numbers\Users\Documents\Base\Base::generateURL'
            ],
            'generate_icon' => [
                'method' => '\Numbers\Users\Documents\Base\Base::generateIconURL'
            ],
            'get_file' => [
                'method' => '\Numbers\Users\Documents\Base\Helper\Preview::downloadOneFile'
            ]
        ],
        'save_documents' => [
            'save_document_mass' => [
                'method' => '\Numbers\Users\Documents\Base\Helper\MassUpload::uploadFewFilesInForm'
            ],
            'generate_document_links' => [
                'method' => '\Numbers\Users\Documents\Base\Helper\Preview::renderAttachmentList'
            ]
        ]
    ];
}
