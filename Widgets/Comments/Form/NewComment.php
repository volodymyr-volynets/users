<?php

namespace Numbers\Users\Widgets\Comments\Form;
class NewComment extends \Object\Form\Wrapper\Base {
	public $form_link = 'wg_new_comment';
	public $module_code = 'UM';
	public $title = 'U/M New Comment Form';
	public $options = [
		'on_success_refresh_parent' => true
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'wg_comment_id' => [
				'wg_comment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Comment #', 'domain' => 'big_id_sequence', 'null' => true, 'readonly' => true],
			],
			'wg_comment_template_id' => [
				'wg_comment_template_id' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Template', 'domain' => 'group_id', 'null' => true, 'percent' => 100, 'placeholder' => \Object\Content\Messages::PLEASE_CHOOSE, 'method' => 'select', 'options_model' => '\Numbers\Users\Widgets\Comments\Model\Templates::optionsActive', 'options_params' => ['um_notetemplate_type_id' => 100], 'onchange' => 'this.form.submit();'],
			],
			'wg_comment_value' => [
				'wg_comment_value' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Comment', 'domain' => 'comment', 'null' => true, 'percent' => 100, 'required' => true, 'method' => 'wysiwyg', 'wysiwyg_height' => 250]
			],
			'wg_comment_important' => [
				'wg_comment_important' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Important', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_comment_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_comment_file_1_new' => ['order' => 3, 'label_name' => 'File(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'multiple' => true, 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents']], 'description' => 'Extensions: Images, Audio, Documents'],
			],
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
				self::BUTTON_SUBMIT_DELETE => self::BUTTON_SUBMIT_DELETE_DATA,
			]
		]
	];
	public $collection = [];

	public function overrides(& $form) {
		if (!empty($form->__options['model_table'])) {
			$model = new $form->__options['model_table']();
			$form->collection = [
				'name' => 'Comments',
				'model' => $model->comments_model
			];
		}
	}

	public function refresh(& $form) {
		if (isset($_POST['wg_comment_value'])) {
			$form->values['wg_comment_value'] = \Request::input('wg_comment_value', true, false, [
				'skip_xss_on_keys' => ['wg_comment_value'],
				'trim_empty_html_input' => true,
				'remove_script_tag' => true
			]);
		}
		// load template
		if (($form->misc_settings['__form_onchange_field_values_key'][0] ?? '') == 'wg_comment_template_id') {
			$template = \Numbers\Users\Widgets\Comments\Model\Templates::getStatic([
				'where' => [
					'um_notetemplate_id' => $form->values['wg_comment_template_id']
				],
				'pk' => null,
				'single_row' => true
			]);
			$form->values['wg_comment_template_id'] = null;
			$form->values['wg_comment_value'] = nl2br($template['um_notetemplate_template']);
		}
	}

	public function validate(& $form) {
		$model = new $form->options['model_table']();
		foreach ($model->comments['map'] as $k => $v) {
			if (isset($form->options['input'][$k])) {
				$form->values[$v] = (int) $form->options['input'][$k];
			}
		}
		// add files
		if (!empty($form->values['wg_comment_file_1_new'])) {
			\Numbers\Users\Documents\Base\Helper\MassUpload::uploadFewFilesInForm(
				$form,
				10,
				$form->values['wg_comment_file_1_new'],
				'wg_comment_file_',
				$form->fields['wg_comment_file_1_new']['options']['validator_params'] ?? []
			);
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
		if ($options['options']['field_name'] == 'wg_comment_value') {
			if (strpos($value, "\n") !== false) {
				$value = nl2br($value);
			}
		}
	}
}