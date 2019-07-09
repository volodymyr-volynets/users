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
	public $subforms = [
		'wg_new_document' => [
			'form' => '\Numbers\Users\Widgets\Documents\Form\NewDocument',
			'label_name' => 'New Document',
			'actions' => [
				'new' => ['name' => 'New'],
				'delete' => ['name' => 'Delete', 'url_delete' => true],
			]
		],
		'wg_approve_document' => [
			'form' => '\Numbers\Users\Widgets\Documents\Form\ApproveDocument',
			'label_name' => 'Approve / Reject Document',
			'actions' => [
				'approve' => ['name' => 'Approve'],
			]
		]
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
		// public
		if (!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_Public')) {
			$form->query->where('AND', ['a.wg_document_public', '=', 1]);
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
				$temp_collection_link = $form->options['collection_link'] ?? '';
				$temp_collection_screen_link = $form->options['collection_screen_link'] ?? '';
				// bypass variables
				$temp_bypass_hidden_input = [];
				if (!empty($form->options['bypass_hidden_from_input'])) {
					foreach ($form->options['bypass_hidden_from_input'] as $v2) {
						$temp_bypass_hidden_input[$v2] = $form->options['input'][$v2] ?? '';
					}
				}
				$temp_bypass_hidden_input['wg_document_id'] = $neighbouring_values['wg_document_id'];
				$temp_bypass_hidden_input = json_encode($temp_bypass_hidden_input);
				$new_link = "Numbers.Form.openSubformWindow('{$temp_collection_link}', '{$temp_collection_screen_link}', '{$this->form_link}', 'wg_approve_document', {$temp_bypass_hidden_input}, {});";
				$toolbar[] = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => $new_link, 'value' => \HTML::icon(['type' => 'far fa-handshake']) . ' ' . i18n(null, 'Approve / Reject')]);
			}
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
				if (!empty($neighbouring_values['wg_document_needs_transfer'])) {
					$result.= \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name'];
				} else {
					$result.= \HTML::a(['href' => \Numbers\Users\Documents\Base\Base::generateURL($k, false, $v['dt_file_name']), 'value' => \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name']]);
				}
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