<?php

class numbers_users_users_form_registration_tenant_collection extends object_form_wrapper_collection {
	public $collection_link = 'tenant_registration_collection';
	const global_wizard = [
		'model' => 'object_form_wrapper_wizard',
		'options' => [
			'segment' => null,
			'percent' => 100,
			'wizard' => [
				'type' => 'primary',
				'options' => [
					1 => ['name' => 'Fill Out The Form'],
					2 => ['name' => 'Email Confirmation'],
					3 => ['name' => 'Set Password'],
					4 => ['name' => 'Registration Complete']
				]
			]
		],
		'order' => 1
	];
	const global_options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'pencil-square-o'],
				'title' => 'Register New Tenant:'
			]
		]
	];
	public $data = [
		'step1' => [
			'options' => self::global_options,
			'order' => 1000,
			self::rows => [
				self::header_row => [
					'order' => 100,
					self::forms => [
						'tenant_registration_step1' => self::global_wizard
					]
				],
				self::main_row => [
					'order' => 200,
					self::forms => [
						'tenant_registration_step1' => [
							'model' => 'numbers_users_users_form_registration_tenant_step1',
							'options' => [
								'segment' => null,
								'percent' => 100
							],
							'order' => 1
						]
					]
				]
			]
		],
		'step2' => [
			'options' => self::global_options,
			'order' => 2000,
			self::rows => [
				self::header_row => [
					'order' => 100,
					self::forms => [
						'tenant_registration_step2' => self::global_wizard
					]
				],
				self::main_row => [
					'order' => 200,
					self::forms => [
						'tenant_registration_step2' => [
							'model' => 'numbers_users_users_form_registration_tenant_step2',
							'options' => [
								'segment' => null,
								'percent' => 100
							],
							'order' => 1
						]
					]
				]
			]
		],
		'step3' => [
			'options' => self::global_options,
			'order' => 2000,
			self::rows => [
				self::header_row => [
					'order' => 100,
					self::forms => [
						'tenant_registration_step2' => self::global_wizard
					]
				],
				self::main_row => [
					'order' => 200,
					self::forms => [
						'tenant_registration_step3' => [
							'model' => 'numbers_users_users_form_registration_tenant_step3',
							'options' => [
								'segment' => null,
								'percent' => 100,
								'bypass_hidden_from_input' => ['__wizard_step', 'token']
							],
							'order' => 1
						]
					]
				]
			]
		],
		'step4' => [
			'options' => self::global_options,
			'order' => 2000,
			self::rows => [
				self::header_row => [
					'order' => 100,
					self::forms => [
						'tenant_registration_step4' => self::global_wizard
					]
				],
				self::main_row => [
					'order' => 200,
					self::forms => [
						'tenant_registration_step4' => [
							'model' => 'numbers_users_users_form_registration_tenant_step4',
							'options' => [
								'segment' => null,
								'percent' => 100
							],
							'order' => 1
						]
					]
				]
			]
		]
	];

	public function distribute() {
		$this->values['__wizard_step'] = (int) ($this->values['__wizard_step'] ?? 1);
		if (empty($this->values['__wizard_step'])) $this->values['__wizard_step'] = 1;
		$this->values['collection_screen_link'] = 'step' . $this->values['__wizard_step'];
		// make everything look success
		if ($this->values['__wizard_step'] == 4) {
			$this->data['step4'][$this::rows][self::header_row][$this::forms]['tenant_registration_step4']['options']['wizard']['type'] = 'success';
			$this->data['step4']['options']['segment']['type'] = 'success';
		}
	}
}