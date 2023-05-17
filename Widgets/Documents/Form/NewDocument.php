<?php

namespace Numbers\Users\Widgets\Documents\Form;
class NewDocument extends \Object\Form\Wrapper\Base {
	public $form_link = 'wg_new_document';
	public $module_code = 'UM';
	public $title = 'U/M New Document Form';
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
			'wg_document_id' => [
				'wg_document_id' => ['order' => 1, 'row_order' => 50, 'label_name' => 'Document #', 'domain' => 'big_id_sequence', 'null' => true, 'readonly' => true],
			],
			'wg_document_catalog_code' => [
				'wg_document_catalog_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Catalog', 'domain' => 'group_code', 'null' => true, 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Documents\Base\Model\Catalogs::optionsActive'],
			],
			'wg_document_comment' => [
				'wg_document_comment' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Comment', 'domain' => 'comment', 'null' => true, 'percent' => 100, 'method' => 'wysiwyg', 'wysiwyg_height' => 250]
			],
			'wg_document_important' => [
				'wg_document_important' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Important', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_document_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'wg_document_file_id_1_new' => ['order' => 3, 'label_name' => 'File(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'required' => 'c', 'multiple' => true, 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents', 'archives']], 'description' => 'Extensions: Images, Audio, Documents, Archive'],
			],
			self::HIDDEN => [
				'wg_document_external_integtype_code' => ['label_name' => 'External Integration Type Code', 'domain' => 'group_code', 'null' => true, 'method' => 'hidden'],
				'wg_document_external_id' => ['label_name' => 'External #', 'domain' => 'big_id', 'default' => null, 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
				self::BUTTON_SUBMIT_DELETE => self::BUTTON_SUBMIT_DELETE_DATA + ['style' => 'display: none;'],
			]
		]
	];
	public $collection = [];
	public $notification_id;

	public function overrides(& $form) {
		if (!empty($form->__options['model_table'])) {
			$model = new $form->__options['model_table']();
			$form->collection = [
				'name' => 'Documents',
				'model' => $model->documents_model
			];
		}
	}

	public function refresh(& $form) {
		// public
		if (!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_Public')) {
			if (empty(\Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'All_Actions'))) {
				$form->element('top', 'wg_document_important', 'wg_document_public', ['readonly' => true]);
				$form->values['wg_document_public'] = 1;
			}
		}
		// plain text
		if (!empty($form->options['plain_text_note'])) {
			$form->element('top', 'wg_document_comment', 'wg_document_comment', ['method' => 'textarea', 'rows' => 10, 'wrap' => 'on']);
		}
		// external API we cannot reupload
		if (!empty($form->values['wg_document_external_integtype_code'])) {
			if (!empty($form->values['wg_document_id'])) {
				$form->element('top', 'wg_document_important', 'wg_document_file_id_1_new', ['method' => 'hidden']);
			}
		}
		// preset default file catalog
		if (empty($form->values['wg_document_catalog_code'])) {
			$default = \Numbers\Users\Documents\Base\Model\Catalogs::getStatic([
				'where' => [
					'dt_catalog_organization_id' => \User::get('organization_id'),
					'dt_catalog_primary' => 1
				],
				'pk' => null,
				'single_row' => true
			]);
			$form->values['wg_document_catalog_code'] = $default['dt_catalog_code'] ?? null;
		}
	}

	public function validate(& $form) {
		if (empty($form->values['wg_document_id'])) {
			if (empty($form->values['wg_document_file_id_1_new'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'wg_document_file_id_1_new');
			}
		}
		if ($form->hasErrors()) return;
		$model = new $form->options['model_table']();
		foreach ($model->documents['map'] as $k => $v) {
			if (isset($form->options['input'][$k])) {
				$form->values[$v] = (int) $form->options['input'][$k];
				if (strpos($v, 'tenant_id') === false) {
					$this->notification_id = $form->values[$v];
				}
			}
		}
		// add files
		if (!empty($form->values['wg_document_file_id_1_new'])) {
			\Numbers\Users\Documents\Base\Helper\MassUpload::uploadFewFilesInForm(
				$form,
				30,
				$form->values['wg_document_file_id_1_new'],
				'wg_document_file_id_',
				$form->fields['wg_document_file_id_1_new']['options']['validator_params'] ?? [],
				$form->values['wg_document_catalog_code']
			);
		}
		// process catalog
		$catalog = \Numbers\Users\Documents\Base\Model\Catalogs::getStatic([
			'where' => [
				'dt_catalog_code' => $form->values['wg_document_catalog_code'],
			],
			'single_row' => true,
			'pk' => null
		]);
		$form->values['wg_document_readonly'] = $catalog['dt_catalog_readonly'];
		if (!empty($catalog['dt_catalog_approval'])) {
			$form->values['wg_document_approval_status_id'] = 20;
		} else {
			$form->values['wg_document_approval_status_id'] = 10;
		}
	}

	public function post(& $form) {
		if ($form->delete) {
			$files = array_key_extract_by_prefix($form->original_values, 'wg_document_file_id_', false, true);
			$files_model = new \Numbers\Users\Documents\Base\Base();
			foreach ($files as $v) {
				$files_result = $files_model->delete($v);
				if (!$files_result['success']) {
					$form->error(DANGER, $files_result['error']);
					return;
				}
			}
		}
		if (!empty($form->options['notification']['new']) && !empty($form->values['wg_document_public'])) {
			$method = \Factory::method($form->options['notification']['new']);
			call_user_func_array($method, [$this->notification_id, \Application::$controller->module_id]);
		}
	}
}