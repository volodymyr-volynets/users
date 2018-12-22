<?php

namespace Numbers\Users\Widgets\Comments\Form;
class Templates extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_comment_templates';
	public $module_code = 'UM';
	public $title = 'U/M Comment Templates Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'um_notetemplate_id' => [
				'um_notetemplate_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Template #', 'domain' => 'group_id_sequence', 'percent' => 95, 'navigation' => true],
				'um_notetemplate_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_notetemplate_name' => [
				'um_notetemplate_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'um_notetemplate_organization_id' => [
				'um_notetemplate_organization_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
			],
			'um_notetemplate_template' => [
				'um_notetemplate_template' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Template', 'domain' => 'comment', 'percent' => 100, 'required' => true, 'method' => 'textarea', 'rows' => 10, 'placeholder' => 'Template'],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Templates',
		'model' => '\Numbers\Users\Widgets\Comments\Model\Templates'
	];
}