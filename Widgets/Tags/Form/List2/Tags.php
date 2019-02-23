<?php

namespace Numbers\Users\Widgets\Tags\Form\List2;
class Tags extends \Object\Form\Wrapper\List2 {
	public $form_link = 'wg_tags';
	public $module_code = 'UM';
	public $title = 'U/M Tags List';
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
				'wg_tag_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 10],
				'um_tag_name' => ['order' => 2, 'label_name' => 'Tag', 'domain' => 'name', 'percent' => 45],
				'wg_tag_inserted_timestamp' => ['order' => 3, 'label_name' => 'Datetime', 'type' => 'timestamp', 'percent' => 15, 'format' => '\Format::niceTimestamp'],
				'wg_tag_inserted_user_id' => ['order' => 4, 'label_name' => 'User', 'domain' => 'name', 'percent' => 25, 'custom_renderer' => '\Numbers\Users\Widgets\Tags\Form\List2\Tags::renderTagUser', 'skip_fts' => true],
			]
		]
	];
	public $query_primary_model;
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'wg_tag_id' => SORT_DESC
		]
	];
	const LIST_SORT_OPTIONS = [
		'wg_tag_id' => ['name' => 'Tag #'],
	];
	public $subforms = [
		'wg_new_tag' => [
			'form' => '\Numbers\Users\Widgets\Tags\Form\NewTag',
			'label_name' => 'Add New Tag',
			'actions' => [
				'new' => ['name' => 'New'],
				'delete' => ['name' => 'Delete', 'url_delete' => true],
			]
		]
	];
	public function overrides(& $form) {
		if (!empty($form->__options['model_table'])) {
			$model = new $form->__options['model_table']();
			$form->collection = [
				'name' => 'Tags',
				'model' => $model->tags_model
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
		$form->query = \Factory::model($form->options['model_table'] . '\0Virtual0\Widgets\Tags')->queryBuilder()->select();
		// join to get actual tag
		$form->query->columns([
			'a.*',
			'b.um_tag_name'
		]);
		$form->query->join('LEFT', new \Numbers\Users\Widgets\Tags\Model\Tags(), 'b', 'ON', [
			['AND', ['a.wg_tag_global_tag_id', '=', 'b.um_tag_id', true], false]
		]);
		$form->processReportQueryFilter($form->query);
		// additional filter
		$parent_model = \Factory::model($form->options['model_table']);
		if (!empty($parent_model->tags['map'])) {
			foreach ($parent_model->tags['map'] as $k => $v) {
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

	public function renderTagUser(& $form, & $options, & $value, & $neighbouring_values) {
		return \Numbers\Users\Users\Model\Users::getUsernameWithAvatar($neighbouring_values['wg_tag_inserted_user_id']);
	}
}