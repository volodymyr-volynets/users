<?php

namespace Numbers\Users\Printing\Form;
class Templates extends \Object\Form\Wrapper\Base {
	public $form_link = 'p8_templates';
	public $module_code = 'P8';
	public $title = 'P/8 Templates Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true,
			'import' => true,
			'activate' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];

	public $rows = [
		'top' => [
			'p8_template_id' => ['order' => 100],
			'p8_template_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
		]
	];
	public $elements = [
		'top' => [
			'p8_template_id' => [
				'p8_template_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Template #', 'domain' => 'template_id_sequence', 'percent' => 50, 'required' => false, 'navigation' => true],
				'p8_template_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 45, 'navigation' => true],
				'p8_template_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'p8_template_name' => [
				'p8_template_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 75, 'required' => true],
				'p8_template_templtype_id' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Printing\Model\Template\Types::optionsActive'],
			],
			self::HIDDEN => [
				'p8_template_versioned' => ['label_name' => 'Versioned', 'type' => 'boolean', 'method' => 'hidden'],
				'p8_template_version_p8_template_id' => ['label_name' => 'Version Template #', 'domain' => 'template_id', 'null' => true, 'method' => 'hidden'],
				'p8_template_version_code' => ['label_name' => 'Version Code', 'domain' => 'version_code', 'null' => true, 'method' => 'hidden'],
				'p8_template_version_name' => ['label_name' => 'Version Name', 'domain' => 'name', 'null' => true, 'method' => 'hidden'],
				'p8_template_version_headers' => ['label_name' => 'Version Headers', 'type' => 'json', 'null' => true, 'method' => 'hidden'],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			]
		],
		'general_container' => [
			'p8_template_print_format' => [
				'p8_template_print_format' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Print Format', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 20, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Formats::options'],
				'p8_template_print_orientation' => ['order' => 2, 'label_name' => 'Print Orientation', 'domain' => 'print_orientation', 'null' => true, 'required' => true, 'percent' => 20, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Orientations::options'],
				'p8_template_font_family' => ['order' => 3, 'label_name' => 'Print Font', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Print2\Fonts::options'],
				'p8_template_font_size' => ['order' => 4, 'label_name' => 'Font Size', 'domain' => 'font_size', 'null' => true, 'required' => true, 'percent' => 20],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Templates',
		'model' => '\Numbers\Users\Printing\Model\Templates',
	];

	public function validate(& $form) {

	}

	public function refresh(& $form) {
		if (!empty($form->values['p8_template_versioned'])) {
			$form->misc_settings['global']['readonly'] = true;
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {

	}

	public function overrideTabs(& $form, & $tab_options, & $tab_name, & $neighbouring_values = []) {

	}
}