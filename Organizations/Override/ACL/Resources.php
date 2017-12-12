<?php

namespace Numbers\Users\Organizations\Override\ACL;
class Resources {
	public $data = [
		'layout' => [
			'logo' => [
				'method' => '\Numbers\Users\Organizations\Helper\Logo::getURL'
			]
		]
	];
}