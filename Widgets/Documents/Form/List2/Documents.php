<?php

namespace Numbers\Users\Widgets\Documents\Form\List2;
class Documents extends \Object\Form\Wrapper\List2 {
	public $form_link = 'wg_documents';
	public $module_code = 'UM';
	public $title = 'U/M Documents List';
	public $options = [
		'segment' => null,
		'actions' => [
			'refresh' => true,
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		'new_file' => [
			'default_row_type' => 'grid',
			'order' => 32200,
			'type' => 'modal',
			'label_name' => 'Add new file'
		],
		'approve_file' => [
			'default_row_type' => 'grid',
			'order' => 32200,
			'type' => 'modal',
			'label_name' => 'Approve / Decline Document Package'
		],
		self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
	];
	public $rows = [
		'tabs' => [
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		'new_file' => [
			'new_file_catalog_code' => [
				'new_file_catalog_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Catalog', 'domain' => 'group_code', 'null' => true, 'percent' => 100, 'required' => 'c', 'method' => 'select', 'options_model' => '\Numbers\Users\Documents\Base\Model\Catalogs::optionsActive']
			],
			'new_fileimportant' => [
				'new_file_important' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Important', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'new_file_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'new_file_upload_1' => ['order' => 3, 'label_name' => 'File(s)', 'type' => 'mixed', 'percent' => 50, 'required' => 'c', 'method' => 'file', 'multiple' => true, 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents']], 'description' => 'Extensions: Images, Audio, Documents'],
			],
			'new_comment_value' => [
				'new_file_comment' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Notes', 'domain' => 'comment', 'null' => true, 'percent' => 100, 'method' => 'textarea']
			],
			'buttons' => [
				self::BUTTON_SUBMIT_OTHER => self::BUTTON_SUBMIT_OTHER_DATA + ['row_order' => 32000],
			]
		],
		'approve_file' => [
			'message' => [
				'message_are_you_sure' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'method' => 'span', 'value' => 'Are you sure?']
			],
			self::HIDDEN => [
				'approve_file_approve_document_id' => ['order' => 1, 'label_name' => 'Document #', 'domain' => 'big_id', 'method' => 'hidden'],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT_APPROVE => self::BUTTON_SUBMIT_APPROVE_DATA + ['row_order' => 32000],
				self::BUTTON_SUBMIT_DECLINE => self::BUTTON_SUBMIT_DECLINE_DATA,
			]
		],
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'wg_document_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 10],
				'wg_document_important' => ['order' => 2, 'label_name' => 'Important', 'type' => 'boolean', 'percent' => 10],
				'wg_document_inserted_user_id' => ['order' => 3, 'label_name' => 'Upload User', 'domain' => 'name', 'percent' => 25, 'custom_renderer' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents::renderDocumentUser', 'skip_fts' => true],
				'wg_document_catalog_code' => ['order' => 4, 'label_name' => 'Catalog', 'domain' => 'group_code', 'null' => true, 'percent' => 55, 'options_model' => '\Numbers\Users\Documents\Base\Model\Catalogs']
			],
			'row2' => [
				'__about2' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 10],
				'wg_document_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'percent' => 10],
				'wg_document_inserted_timestamp' => ['order' => 3, 'label_name' => 'Datetime', 'type' => 'timestamp', 'percent' => 25, 'format' => '\Format::niceTimestamp'],
				'wg_document_file_1' => ['order' => 4, 'label_name' => 'File(s) / Notes', 'domain' => 'name', 'percent' => 65, 'custom_renderer' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents::renderDocumentFiles', 'skip_fts' => true],
			],
			'row3' => [
				'__about3' => ['order' => 1, 'row_order' => 300, 'label_name' => '', 'percent' => 10],
				'wg_document_approval_status_id' => ['order' => 2, 'label_name' => 'Approval', 'domain' => 'type_id', 'percent' => 10, 'options_model' => '\Numbers\Users\Widgets\Documents\Model\Statuses'],
				'wg_document_approved_user_id' => ['order' => 3, 'label_name' => 'Approved User', 'domain' => 'name', 'percent' => 25, 'custom_renderer' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents::renderApprovalUser', 'skip_fts' => true],
				'__actions' => ['order' => 4, 'label_name' => 'Actions', 'percent' => 65, 'custom_renderer' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents::renderActions', 'skip_fts' => true],
			]
		]
	];
	public $query_primary_model;
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 10,
		'default_sort' => [
			'wg_document_id' => SORT_DESC
		]
	];
	const LIST_SORT_OPTIONS = [
		'wg_document_id' => ['name' => 'Document #'],
	];

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
		// user can add new documents if he has subresource permission
		if ((!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_New')) || empty($form->options['acl_subresource_edit'])) {
			$form->options['actions']['new'] = [
				'onclick' => 'Numbers.Modal.show(\'form_wg_documents_modal_new_file_dialog\');',
				'href' => 'javascript:void(0);'
			];
		}
	}

	public function validate(& $form) {
		$model = new $form->options['model_table']();
		// approve document
		if (!empty($form->process_submit[self::BUTTON_SUBMIT_APPROVE]) || !empty($form->process_submit[self::BUTTON_SUBMIT_DECLINE])) {
			if (!empty($form->values['approve_file_approve_document_id'])) {
				$documents_result = \Factory::model($model->documents_model)->merge([
					'wg_document_id' => $form->values['approve_file_approve_document_id'],
					'wg_document_approval_status_id' => !empty($form->process_submit[self::BUTTON_SUBMIT_APPROVE]) ? 30 : 40
				]);
				if (!$documents_result['success']) {
					$form->error(DANGER, $documents_result['error']);
					return;
				} else {
					$form->error(SUCCESS, \Object\Content\Messages::OPERATION_EXECUTED);
					return;
				}
			}
		}
		// if we have new comment
		if (!empty($form->process_submit[self::BUTTON_SUBMIT_OTHER])) {
			if (empty($form->values['new_file_upload_1'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'new_file_upload_1');
			}
			if (empty($form->values['new_file_catalog_code'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'new_file_catalog_code');
			}
			if ($form->hasErrors()) return;
			// continue with logic
			$data = [];
			$model->db_object->begin();
			foreach ($model->documents['map'] as $k => $v) {
				if (isset($form->options['input'][$k])) {
					$data[$v] = (int) $form->options['input'][$k];
				}
			}
			// add file
			if (!empty($form->values['new_file_upload_1'])) {
				if (count($form->values['new_file_upload_1']) > 30) {
					$form->error(DANGER, 'You can upload up to [number] files!', null, ['replace' => ['[number]' => \Format::id(30)]]);
					return;
				}
				$upload_model = new \Numbers\Users\Documents\Base\Base();
				$catalog = $upload_model->fetchPrimaryCatalog(\User::get('organization_id'));
				if (empty($catalog)) {
					$form->error(DANGER, 'You must set primary catalog!');
					$model->db_object->rollback();
					return;
				}
				$counter = 1;
				foreach ($form->values['new_file_upload_1'] as $k => $v) {
					$v['__image_properties'] = $form->fields['wg_document_file_1']['options']['validator_params'] ?? [];
					$result = $upload_model->upload($v, $catalog);
					if (!$result['success']) {
						$form->error(DANGER, $result['error']);
						$model->db_object->rollback();
						return;
					}
					$data['wg_document_file_id_' . $counter] = $result['file_id'];
					$counter++;
				}
			}
			$data['wg_document_catalog_code'] = $form->values['new_file_catalog_code'];
			$data['wg_document_important'] = !empty($form->values['new_file_important']) ? 1 : 0;
			$data['wg_document_public'] = !empty($form->values['new_file_public']) ? 1 : 0;
			$data['wg_document_comment'] = $form->values['new_file_comment'] ?? null;
			$catalog = \Numbers\Users\Documents\Base\Model\Catalogs::getStatic([
				'where' => [
					'dt_catalog_code' => $form->values['new_file_catalog_code'],
				],
				'single_row' => true,
				'pk' => null
			]);
			$data['wg_document_readonly'] = $catalog['dt_catalog_readonly'];
			if (!empty($catalog['dt_catalog_approval'])) {
				$data['wg_document_approval_status_id'] = 20;
			} else {
				$data['wg_document_approval_status_id'] = 10;
			}
			$documents_result = \Factory::model($model->documents_model)->merge($data);
			if (!$documents_result['success']) {
				$form->error(DANGER, $documents_result['error']);
				$model->db_object->rollback();
				return;
			}
			$form->values['new_file_important'] = 0;
			$form->values['new_file_public'] = 0;
			$form->values['new_file_comment'] = '';
			$form->values['new_file_catalog_code'] = null;
			$model->db_object->commit();
			return;
		}
	}

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
		// hide module #
		if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
			$options['options']['row_class'] = 'grid_row_hidden';
		}
	}

	public function listQuery(& $form) {
		$result = [
			'success' => false,
			'error' => [],
			'total' => 0,
			'rows' => []
		];
		$form->query = \Factory::model($form->options['model_table'] . '\0Virtual0\Widgets\Documents')->queryBuilder()->select();
		$form->processReportQueryFilter($form->query);
		// additional filter
		$parent_model = \Factory::model($form->options['model_table']);
		if (!empty($parent_model->documents['map'])) {
			foreach ($parent_model->documents['map'] as $k => $v) {
				if (isset($form->options['input'][$k])) {
					$form->query->where('AND', ['a.' . $v, '=', (int) $form->options['input'][$k]]);
				}
			}
		}
		// query #1 get counter
		$counter_query = clone $form->query;
		$counter_query->columns(['counter' => 'COUNT(*)'], ['empty_existing' => true]);
		$temp = $counter_query->query();
		if (!$temp['success']) {
			array_merge3($result['error'], $temp['error']);
			return $result;
		}
		$result['total'] = $temp['rows'][0]['counter'];
		// query #2 get rows
		$form->processListQueryOrderBy();
		$form->query->offset($form->values['__offset'] ?? 0);
		$form->query->limit($form->values['__limit']);
		$temp = $form->query->query();
		if (!$temp['success']) {
			array_merge3($result['error'], $temp['error']);
			return $result;
		}
		$result['rows'] = & $temp['rows'];
		$result['success'] = true;
		return $result;
	}

	public function renderDocumentUser(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values['wg_document_inserted_user_id'])) {
			return \Numbers\Users\Users\Model\Users::getUsernameWithAvatar($neighbouring_values['wg_document_inserted_user_id']);
		} else {
			return '';
		}
	}

	public function renderApprovalUser(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values['wg_document_approved_user_id'])) {
			return \Numbers\Users\Users\Model\Users::getUsernameWithAvatar($neighbouring_values['wg_document_approved_user_id']);
		} else {
			return '';
		}
	}

	public function renderActions(& $form, & $options, & $value, & $neighbouring_values) {
		$toolbar = [];
		// approve and decline link
		if (($neighbouring_values['wg_document_approval_status_id'] ?? 10) == 20) {
			// if you can approve or decline a document package
			if (!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_Approve')) {
				$new_link = '$(\'#form_wg_documents_element_approve_file_approve_document_id\').val(' . $neighbouring_values['wg_document_id'] . '); Numbers.Modal.show(\'form_wg_documents_modal_approve_file_dialog\');';
				$toolbar[] = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => $new_link, 'value' => \HTML::icon(['type' => 'far fa-handshake']) . ' ' . i18n(null, 'Approve / Reject')]);
			}
			// delete
			// todo
		}
		return implode(' ', $toolbar);
	}

	public function renderDocumentFiles(& $form, & $options, & $value, & $neighbouring_values) {
		$result = '';
		$files = [];
		for ($i = 1; $i <= 30; $i++) {
			if (!empty($neighbouring_values['wg_document_file_id_' . $i])) {
				$files[]= $neighbouring_values['wg_document_file_id_' . $i];
			} else {
				break;
			}
		}
		if (!empty($files)) {
			$files = \Numbers\Users\Documents\Base\Model\Files::getStatic([
				'where' => [
					'dt_file_id' => $files
				],
				'pk' => ['dt_file_id']
			]);
			foreach ($files as $k => $v) {
				$result.= \HTML::a(['href' => \Numbers\Users\Documents\Base\Base::generateURL($k, false, $v['dt_file_name']), 'value' => \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name']]);
				$result.= '<br/>';
			}
		}
		// notes
		if (!empty($neighbouring_values['wg_document_comment'])) {
			$result.= '<hr/>';
			$result.= nl2br($neighbouring_values['wg_document_comment']);
		}
		return $result;
	}
}