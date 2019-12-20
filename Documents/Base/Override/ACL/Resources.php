<?php

namespace Numbers\Users\Documents\Base\Override\ACL;
class Resources {
	public $data = [
		'generate_photo' => [
			'generate_url' => [
				'method' => '\Numbers\Users\Documents\Base\Base::generateURL'
			],
			'generate_icon' => [
				'method' => '\Numbers\Users\Documents\Base\Base::generateIconURL'
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