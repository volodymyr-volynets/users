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
				'wg_comment_template_id' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Template', 'domain' => 'group_id', 'null' => true, 'percent' => 50, 'placeholder' => \Object\Content\Messages::PLEASE_CHOOSE, 'method' => 'select', 'options_model' => '\Numbers\Users\Widgets\Comments\Model\Templates::optionsActive', 'options_params' => ['um_notetemplate_type_id' => 100], 'onchange' => 'this.form.submit();'],
				'wg_comment_followup_datetime' => ['order' => 2, 'label_name' => 'Follow Up Datetime', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'wg_comment_action_required' => ['order' => 3, 'label_name' => 'Action Required', 'type' => 'boolean', 'percent' => 25],
			],
			'wg_comment_value' => [
				'wg_comment_value' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Comment', 'domain' => 'comment', 'null' => true, 'percent' => 100, 'required' => true, 'method' => 'wysiwyg', 'wysiwyg_height' => 250]
			],
			'wg_comment_important' => [
				'wg_comment_important' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Important', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_comment_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_comment_file_1_new' => ['order' => 3, 'label_name' => 'File(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'multiple' => true, 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents', 'archives']], 'description' => 'Extensions: Images, Audio, Documents, Archives'],
			],
			self::HIDDEN => [
				'wg_comment_external_integtype_code' => ['label_name' => 'External Integration Type Code', 'domain' => 'group_code', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
				self::BUTTON_SUBMIT_DELETE => self::BUTTON_SUBMIT_DELETE_DATA,
			]
		]
	];
	public $collection = [];
	public $notification_id;

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
			if (!empty($form->options['plain_text_note'])) {
				$form->values['wg_comment_value'] = str_replace("\n", '', $template['um_notetemplate_template']);
			} else {
				$form->values['wg_comment_value'] = nl2br($template['um_notetemplate_template']);
			}
		}
		// public
		if (!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_Public')) {
			if (empty(\Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'All_Actions'))) {
				$form->element('top', 'wg_comment_important', 'wg_comment_public', ['readonly' => true]);
				$form->values['wg_comment_public'] = 1;
			}
		}
		// plain text
		if (!empty($form->options['plain_text_note'])) {
			$form->element('top', 'wg_comment_value', 'wg_comment_value', ['method' => 'textarea', 'rows' => 10, 'wrap' => 'on']);
		}
		$allow_editing_api_comments = \Application::get('app.submodule.Numbers.Users.Widgets.Comments.allow_editing_api_comments');
		if (empty($allow_editing_api_comments) && !empty($form->values['wg_comment_external_integtype_code'])) {
			$form->error(DANGER, 'This comment was added via API, you cannot edit it!');
			$form->misc_settings['global']['readonly'] = true;
			$form->element('buttons', self::BUTTONS, self::BUTTON_SUBMIT_SAVE, ['method' => 'hidden']);
			$form->element('buttons', self::BUTTONS, self::BUTTON_SUBMIT_DELETE, ['method' => 'hidden']);
		}
	}

	public function validate(& $form) {
		$model = new $form->options['model_table']();
		foreach ($model->comments['map'] as $k => $v) {
			if (isset($form->options['input'][$k])) {
				$form->values[$v] = (int) $form->options['input'][$k];
				if (strpos($v, 'tenant_id') === false) {
					$this->notification_id = $form->values[$v];
				}
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

	public function post(& $form) {
		if (!empty($form->options['notification']['new']) && !empty($form->values['wg_comment_public'])) {
			$method = \Factory::method($form->options['notification']['new']);
			call_user_func_array($method, [$this->notification_id, \Application::$controller->module_id]);
		}
	}
}