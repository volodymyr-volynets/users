<?php

namespace Numbers\Users\Test\Data;
class Import extends \Object\Import {
	public $data = [
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'UM',
					'sm_feature_code' => 'UM::TEST',
					'sm_feature_type' => 40,
					'sm_feature_name' => 'U/M Test User Activated',
					'sm_feature_icon' => 'far fa-eye-slash',
					'sm_feature_activation_model' => null,
					'sm_feature_activated_by_default' => 1,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'UM',
							'sm_mdldep_child_feature_code' => 'UM::USERS'
						]
					]
				],
			]
		]
	];
}