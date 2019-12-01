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
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
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
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'wg_comment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 10, 'url_edit' => true],
				'wg_comment_important' => ['order' => 2, 'label_name' => 'Important', 'type' => 'boolean', 'percent' => 10],
				'wg_comment_inserted_user_id' => ['order' => 3, 'label_name' => 'User', 'domain' => 'name', 'percent' => 25, 'custom_renderer' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments::renderCommentUser', 'skip_fts' => true],
				'wg_comment_value' => ['order' => 4, 'label_name' => 'Comment', 'domain' => 'name', 'percent' => 65, 'custom_renderer' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments::renderCommentValue'],
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
	public $subforms = [
		'wg_new_comment' => [
			'form' => '\Numbers\Users\Widgets\Comments\Form\NewComment',
			'label_name' => 'Edit/New Comment',
			'actions' => [
				'new' => ['name' => 'New'],
				'edit' => ['name' => 'Edit', 'url_edit' => true],
				'delete' => ['name' => 'Delete', 'url_delete' => true],
			]
		]
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

	public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values) {
		// hide module #
		if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
			$options['options']['row_class'] = 'grid_row_hidden';
			return;
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
		// public
		if (!empty($form->options['acl_subresource_edit']) && \Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'Record_Public')) {
			if (empty(\Application::$controller->canSubresourceMultiple($form->options['acl_subresource_edit'], 'All_Actions'))) {
				$form->query->where('AND', ['a.wg_comment_public', '=', 1]);
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

	public function renderCommentValue(& $form, & $options, & $value, & $neighbouring_values) {
		return nl2br($value);
	}

	public function renderCommentUser(& $form, & $options, & $value, & $neighbouring_values) {
		return \Numbers\Users\Users\Model\Users::getUsernameWithAvatar($neighbouring_values['wg_comment_inserted_user_id']);
	}

	public function renderCommentFiles(& $form, & $options, & $value, & $neighbouring_values) {
		return \Numbers\Users\Widgets\Comments\Helper\Files::generateURLS($neighbouring_values, 'wg_comment_file_', 10);
	}
}