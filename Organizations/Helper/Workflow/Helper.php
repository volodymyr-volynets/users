<?php

namespace Numbers\Users\Organizations\Helper\Workflow;
class Helper {

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
		$workflow = \Numbers\Users\Organizations\Model\Service\Workflows::getStatic([
			'where' => [
				'on_workflow_id' => $workflow_id
			],
			'pk' => null,
			'single_row' => true
		]);
		$model = new \Numbers\Users\Organizations\Model\Service\Executed\Workflows();
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
		return $model->collection()->merge($data);
	}
}