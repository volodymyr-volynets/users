<?php

namespace Numbers\Users\Widgets\Comments\Form\List2;
class Comments extends \Object\Form\Wrapper\List2 {
	public $form_link = 'wg_comments';
	public $module_code = 'UM';
	public $title = 'U/M Comments List';
	public $options = [
		'segment' => null,
		'actions' => [
			'refresh' => true,
			//'new' => ['onclick' => 'Numbers.Modal.show(\'form_wg_comments_modal_new_comment_dialog\');', 'href' => 'javascript:void(0);'],
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		'new_comment' => [
			'default_row_type' => 'grid',
			'order' => 32200,
			'type' => 'modal',
			'label_name' => 'Add new comment'
		],
		self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.wg_comment_value'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		'new_comment' => [
			'new_note_template_id' => [
				'new_note_template_id' => ['order' => 1, 'row_order' => 50, 'label_name' => 'Template', 'domain' => 'group_id', 'null' => true, 'percent' => 100, 'placeholder' => \Object\Content\Messages::PLEASE_CHOOSE, 'method' => 'select', 'options_model' => '\Numbers\Users\Widgets\Comments\Model\Templates::optionsActive', 'options_params' => ['um_notetemplate_type_id' => 100], 'onchange' => 'this.form.submit();'],
			],
			'new_comment_value' => [
				'new_comment_value' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'domain' => 'comment', 'null' => true, 'percent' => 100, 'required' => 'c', 'method' => 'wysiwyg', 'wysiwyg_height' => 250]
			],
			'new_comment_important' => [
				'new_comment_important' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Important', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'new_comment_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'method' => 'checkbox', 'percent' => 25],
				'new_comment_upload_1' => ['order' => 3, 'label_name' => 'File(s)', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'null' => true, 'multiple' => true, 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images', 'audio', 'documents']], 'description' => 'Extensions: Images, Audio, Documents'],
			],
			'buttons' => [
				self::BUTTON_SUBMIT_OTHER => self::BUTTON_SUBMIT_OTHER_DATA + ['row_order' => 32000],
			]
		],
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'wg_comment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 10],
				'wg_comment_important' => ['order' => 2, 'label_name' => 'Important', 'type' => 'boolean', 'percent' => 10],
				'wg_comment_inserted_user_id' => ['order' => 3, 'label_name' => 'User', 'domain' => 'name', 'percent' => 25, 'custom_renderer' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments::renderCommentUser', 'skip_fts' => true],
				'wg_comment_value' => ['order' => 4, 'label_name' => 'Comment', 'domain' => 'name', 'percent' => 65],
			],
			'row2' => [
				'__about' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 10],
				'wg_comment_public' => ['order' => 2, 'label_name' => 'Public', 'type' => 'boolean', 'percent' => 10],
				'wg_comment_inserted_timestamp' => ['order' => 3, 'label_name' => 'Datetime', 'type' => 'timestamp', 'percent' => 25, 'format' => '\Format::niceTimestamp'],
				'wg_comment_file_1' => ['order' => 4, 'label_name' => 'Files', 'domain' => 'name', 'percent' => 65, 'custom_renderer' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments::renderCommentFiles', 'skip_fts' => true],
			]
		]
	];
	public $query_primary_model;
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 10,
		'default_sort' => [
			'wg_comment_id' => SORT_DESC
		]
	];
	const LIST_SORT_OPTIONS = [
		'wg_comment_id' => ['name' => 'Comment #'],
	];

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
		if (isset($_POST['new_comment_value'])) {
			$form->values['new_comment_value'] = \Request::input('new_comment_value', true, false, [
				'skip_xss_on_keys' => ['new_comment_value'],
				'trim_empty_html_input' => true,
				'remove_script_tag' => true
			]);
		}
		// user can add new notes if he has subresource permission
		if ((!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_New')) || empty($form->options['acl_subresource_edit'])) {
			$form->options['actions']['new'] = [
				'onclick' => 'Numbers.Modal.show(\'form_wg_comments_modal_new_comment_dialog\');',
				'href' => 'javascript:void(0);'
			];
		}
		// load template
		if (!empty($form->values['new_note_template_id'])) {
			$template = \Numbers\Users\Widgets\Comments\Model\Templates::getStatic([
				'where' => [
					'um_notetemplate_id' => $form->values['new_note_template_id']
				],
				'pk' => null,
				'single_row' => true
			]);
			$form->values['new_note_template_id'] = null;
			$form->values['new_comment_value'] = nl2br($template['um_notetemplate_template']);
			\Layout::onload('Numbers.Modal.show(\'form_wg_comments_modal_new_comment_dialog\');');
		}
	}

	public function validate(& $form) {
		// if we have new comment
		if (!empty($form->process_submit[self::BUTTON_SUBMIT_OTHER])) {
			if (empty($form->values['new_comment_value'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'new_comment_value');
			} else {
				$data = [];
				$model = new $form->options['model_table']();
				$model->db_object->begin();
				foreach ($model->comments['map'] as $k => $v) {
					if (isset($form->options['input'][$k])) {
						$data[$v] = (int) $form->options['input'][$k];
					}
				}
				// add files
				if (!empty($form->values['new_comment_upload_1'])) {
					if (count($form->values['new_comment_upload_1']) > 10) {
						$form->error(DANGER, 'You can upload up to [number] files!', null, ['replace' => ['[number]' => \Format::id(10)]]);
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
					foreach ($form->values['new_comment_upload_1'] as $k => $v) {
						$v['__image_properties'] = $form->fields['new_comment_upload_1']['options']['validator_params'] ?? [];
						$result = $upload_model->upload($v, $catalog);
						if (!$result['success']) {
							$form->error(DANGER, $result['error']);
							$model->db_object->rollback();
							return;
						}
						$data['wg_comment_file_' . $counter] = $result['file_id'];
						$counter++;
					}
				}
				$data['wg_comment_value'] = $_POST['new_comment_value'] ?? $form->values['new_comment_value'];
				$data['wg_comment_value'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data['wg_comment_value']);
				$data['wg_comment_public'] = $form->values['new_comment_public'];
				$data['wg_comment_important'] = !empty($form->values['new_comment_important']) ? 1 : 0;
				$comments_result = \Factory::model($model->comments_model)->merge($data);
				if (!$comments_result['success']) {
					$form->error(DANGER, $comments_result['error']);
					$model->db_object->rollback();
					return;
				}
				$form->values['new_comment_value'] = '';
				$form->values['new_comment_important'] = 0;
				$form->values['new_comment_public'] = 0;
				$model->db_object->commit();
			}
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
		$form->query = \Factory::model($form->options['model_table'] . '\0Virtual0\Widgets\Comments')->queryBuilder()->select();
		$form->processReportQueryFilter($form->query);
		// additional filter
		$parent_model = \Factory::model($form->options['model_table']);
		if (!empty($parent_model->comments['map'])) {
			foreach ($parent_model->comments['map'] as $k => $v) {
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

	public function renderCommentUser(& $form, & $options, & $value, & $neighbouring_values) {
		return \Numbers\Users\Users\Model\Users::getUsernameWithAvatar($neighbouring_values['wg_comment_inserted_user_id']);
	}

	public function renderCommentFiles(& $form, & $options, & $value, & $neighbouring_values) {
		$result = '';
		$files = [];
		for ($i = 1; $i <= 10; $i++) {
			if (!empty($neighbouring_values['wg_comment_file_' . $i])) {
				$files[]= $neighbouring_values['wg_comment_file_' . $i];
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
		return $result;
	}
}