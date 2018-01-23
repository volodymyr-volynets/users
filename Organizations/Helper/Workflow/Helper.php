<?php

namespace Numbers\Users\Organizations\Helper\Workflow;
class Helper {

	/**
	 * Cached fields
	 *
	 * @var array
	 */
	public static $cached_fields;

	/**
	 * Start workflow
	 *
	 * @param int $workflow_id
	 * @param string $linked_type
	 * @param int $linked_module_id
	 * @param int $linked_id
	 * @param string $name
	 * @return array
	 */
	public static function start(int $workflow_id, string $linked_type, int $linked_module_id, int $linked_id, string $name) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		$workflow = \Numbers\Users\Organizations\Model\Service\Workflows::getStatic([
			'where' => [
				'on_workflow_id' => $workflow_id
			],
			'pk' => null,
			'single_row' => true
		]);
		$model = new \Numbers\Users\Organizations\Model\Service\Executed\Workflows();
		$model->db_object->begin();
		$data = [
			'on_execwflow_workflow_id' => $workflow_id,
			'on_execwflow_versioned_workflow_id' => $workflow['on_workflow_version_workflow_id'],
			'on_execwflow_workflow_name' => $workflow['on_workflow_name'] . ' - ' . $name,
			'on_execwflow_status_id' => 10,
			'on_execwflow_linked_type_code' => $linked_type,
			'on_execwflow_linked_module_id' => $linked_module_id,
			'on_execwflow_linked_id' => $linked_id,
			'on_execwflow_inactive' => 0
		];
		$flow_result = $model->collection()->merge($data);
		if (!$flow_result['success']) {
			$model->db_object->rollback();
			return $flow_result;
		}
		$execwflow_id = $flow_result['new_serials']['on_execwflow_id'];
		// process first steps
		$next_steps = self::getNextSteps($workflow_id, $execwflow_id);
		if (!empty($next_steps)) {
			foreach ($next_steps as $k => $v) {
				if ($v['on_workstep_subtype_id'] == 999) {
					$auto_result = self::processAutomaticSteps($workflow_id, $execwflow_id, $v);
					if (!$auto_result['success']) {
						$model->db_object->rollback();
						return $auto_result;
					}
				}
			}
		}
		$model->db_object->commit();
		$result['success'] = true;
		return $result;
	}

	public static function getNextSteps(int $workflow_id, int $execwflow_id) {
		// find last step
		$query = \Numbers\Users\Organizations\Model\Service\Executed\Workflow\Steps::queryBuilderStatic()->select();
		$query->where('AND', ['a.on_execwfstep_execwflow_id', '=', $execwflow_id]);
		$query->orderby(['on_execwfstep_id' => SORT_DESC]);
		$query->limit(1);
		$existing_step = $query->query();
		if (empty($existing_step['rows'])) {
			$result = \Numbers\Users\Organizations\Model\Service\Workflow\Steps::getStatic([
				'where' => [
					'on_workstep_workflow_id' => $workflow_id,
					'on_workstep_type_id' => 10,
				],
				'pk' => ['on_workstep_id']
			]);
		} else {
			print_r2($existing_step);
			exit;
			$query = \Numbers\Users\Organizations\Model\Service\Workflow\Steps::queryBuilderStatic()->select();
			$query->where('AND', ['a.on_workstep_workflow_id', '=', $workflow_id]);
			$query->where('AND', function (& $query) use ($workflow_id) {
				$query = \Numbers\Users\Organizations\Model\Service\Workflow\Step\Next::queryBuilderStatic(['alias' => 'exists_a'])->select();
				$query->columns(['exists_a.on_workstpnext_next_step_id']);
				$query->where('AND', ['exists_a.on_workstpnext_workflow_id', '=', $workflow_id]);
				//$query->where('AND', ['exists_a.ct_grpuser_user_id', '=', \User::id(), false]);
			}, 'EXISTS');
		}
		return $result;
	}

	/**
	 * Process automatic step
	 *
	 * @param int $workflow_id
	 * @param int $execwflow_id
	 * @param array $step_data
	 * @return array
	 */
	public static function processAutomaticSteps(int $workflow_id, int $execwflow_id, array $step_data) : array {
		$result = \Numbers\Users\Organizations\Model\Service\Executed\Workflow\Steps::collectionStatic()->merge([
			'on_execwfstep_execwflow_id' => $execwflow_id,
			'on_execwfstep_workflow_id' => $workflow_id,
			'on_execwfstep_step_id' => $step_data['on_workstep_id'],
			'on_execwfstep_name' => $step_data['on_workstep_name'],
			'on_execwfstep_status_id' => 30
		]);
		// insert fields
		self::insertSingleField($execwflow_id, $result['new_serials']['on_execwfstep_id'], 'SYSTEM_BOOK_DATE', \Format::now('timestamp'));
		return $result;
	}

	public static function insertSingleField(int $execwflow_id, int $execwfstep_id, string $field_code, $field_value) : array {
		if (!isset(self::$cached_fields)) {
			self::$cached_fields = \Numbers\Users\Organizations\Model\Service\Workflow\Fields::getStatic([
				'pk' => ['on_workfield_code']
			]);
		}
		// determine storage type
		$type = 'mixed';
		if (in_array(self::$cached_fields[$field_code]['on_workfield_type'], ['date', 'time', 'datetime', 'timestamp'])) {
			$type = 'timestamp';
		} else if (self::$cached_fields[$field_code]['on_workfield_php_type'] == 'integer') {
			$type = 'integer';
		} else if (self::$cached_fields[$field_code]['on_workfield_php_type'] == 'float' || self::$cached_fields[$field_code]['on_workfield_php_type'] == 'bcnumeric') {
			$type = 'numeric';
		} else if (self::$cached_fields[$field_code]['on_workfield_php_type'] == 'string') {
			$type = 'text';
		}
		// merge
		return \Numbers\Users\Organizations\Model\Service\Executed\Workflow\Fields::collectionStatic()->merge([
			'on_execwffield_execwflow_id' => $execwflow_id,
			'on_execwffield_execwfstep_id' => $execwfstep_id,
			'on_execwffield_field_id' => self::$cached_fields[$field_code]['on_workfield_id'],
			'on_execwffield_php_type' => $type,
			'on_execwffield_value_' . $type => $field_value,
		]);
	}

	/**
	 * Preview workflow
	 *
	 * @param int $workflow_id
	 * @return mixed
	 */
	public static function previewWorkflow(int $workflow_id, array $executed_steps) {
		$collection_model = new \Numbers\Users\Organizations\Model\Service\Collection\Workflows();
		$collection_data = $collection_model->get([
			'where' => [
				'on_workflow_id' => $workflow_id
			]
		]);
		$collection_data = current($collection_data['data']);
		$data = [];
		foreach ($collection_data['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas'] as $k => $v) {
			if (!empty($v['on_workcanvas_inactive'])) continue;
			$data[$k] = [
				'order' => $v['on_workcanvas_order'],
				'type' => $v['on_workcanvas_type_id'],
				'name' => $v['on_workcanvas_name'],
				'step' => $v['on_workcanvas_step_id'],
				'x1' => $v['on_workcanvas_x1'],
				'x2' => $v['on_workcanvas_x2'],
				'y1' => $v['on_workcanvas_y1'],
				'y2' => $v['on_workcanvas_y2'],
				// line attributes
				'line_left_type' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Lines']['on_workcanvline_line_left_type_id'] ?? 10,
				'line_right_type' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Lines']['on_workcanvline_line_right_type_id'] ?? 10,
				'line_style' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Lines']['on_workcanvline_line_style_id'] ?? 10,
				'line_color' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Lines']['on_workcanvline_line_color'] ?? '000000',
				// shape attributes
				'shape_border_style' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_shape_border_style_id'] ?? 10,
				'shape_border_color' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_shape_border_color'] ?? '000000',
				'shape_fill_color' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_shape_fill_color'] ?? 'FFFFFF',
				'completed_border_style' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_completed_border_style_id'] ?? 10,
				'completed_border_color' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_completed_border_color'] ?? '000000',
				'completed_fill_color' => $v['\Numbers\Users\Organizations\Model\Service\Workflow\Canvas\Shapes']['on_workcanvshape_completed_fill_color'] ?? 'FFFFFF',
			];
		}
		return \Numbers\Users\Workflow\Helper\CanvasRenderer::render($data, [
			'width' => $collection_data['on_workflow_canvas_width'],
			'height' => $collection_data['on_workflow_canvas_height'],
			'completed_steps' => $executed_steps
		]);
	}
}