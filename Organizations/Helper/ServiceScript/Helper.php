<?php

namespace Numbers\Users\Organizations\Helper\ServiceScript;
class Helper {

	/**
	 * Cached fields
	 *
	 * @var array
	 */
	public static $cached_fields;

	/**
	 * Cached models
	 *
	 * @var array
	 */
	public static $cached_all_models;

	/**
	 * Start service script
	 *
	 * @param int $service_script_id
	 * @param string $linked_type
	 * @param int $linked_module_id
	 * @param int $linked_id
	 * @param array $answers
	 * @param array $options
	 *		on_execsscript_organization_id
	 *		on_execsscript_location_id
	 *		on_execsscript_region_id
	 * @return array
	 */
	public static function start(int $service_script_id, string $linked_type, int $linked_module_id, int $linked_id, array $answers, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		$service_script = \Numbers\Users\Organizations\Model\Service\ServiceScripts::getStatic([
			'where' => [
				'on_servscript_id' => $service_script_id
			],
			'pk' => null,
			'single_row' => true
		]);
		$model = new \Numbers\Users\Organizations\Model\Service\Executed\ServiceScripts();
		$model->db_object->begin();
		$data = [
			'on_execsscript_service_script_id' => $service_script_id,
			'on_execsscript_service_script_name' => $service_script['on_servscript_name'],
			'on_execsscript_organization_id' => $options['on_execsscript_organization_id'],
			'on_execsscript_location_id' => $options['on_execsscript_location_id'],
			'on_execsscript_region_id' => $options['on_execsscript_region_id'],
			'on_execsscript_channel_code' => $options['on_execsscript_channel_code'],
			'on_execsscript_linked_type_code' => $linked_type,
			'on_execsscript_linked_module_id' => $linked_module_id,
			'on_execsscript_linked_id' => $linked_id, // we do not have fk for this field
			'on_execsscript_values' => $answers,
			'on_execsscript_inactive' => 0
		];
		$flow_result = $model->collection()->merge($data);
		if (!$flow_result['success']) {
			$model->db_object->rollback();
			return $flow_result;
		}
		$model->db_object->commit();
		$result['success'] = true;
		return $result;
	}

	/**
	 * Get questions
	 *
	 * @param int $service_script_id
	 * @param int $region_id
	 * @param string $channel_code
	 * @return array
	 */
	public static function getQuestions(int $service_script_id, int $region_id, string $channel_code) : array {
		$result = [
			'success' => false,
			'error' => [],
			'count' => 0,
			'data' => []
		];
		$result['data'] = \Numbers\Users\Organizations\DataSource\ServiceScript\Questions::getStatic([
			'where' => [
				'service_script_id' => $service_script_id,
				'region_id' => $region_id,
				'channel_code' => $channel_code,
			]
		]);
		if (empty($result['data'])) {
			$result['error'][] = 'No question found';
		} else {
			$resut['count'] = count($result['data']);
			$result['success'] = true;
		}
		return $result;
	}

	/**
	 * Render questions
	 *
	 * @param object $form
	 * @param array $question
	 */
	public static function renderQuestions(& $form, array $questions) {
		self::$cached_all_models = \Numbers\Backend\Db\Common\Model\Models::getStatic([
			'pk' => ['sm_model_id']
		]);
		// add questions one by one
		$counter = 1;
		foreach ($questions as $k => $v) {
			$order = $counter * 10000 + $v['on_servquestion_order'] * 1000;
			// question first
			$form->elements['top']['ss_field_' . $k . '_question']['ss_field_' . $k . '_question'] = [
				'order' => 1,
				'row_order' => $order,
				'type' => 'text',
				'method' => 'div',
				'value' => '<b>' . \Format::id($counter) . '. ' . i18n(null, $v['on_servquestion_name']) . '</b>',
				'percent' => 100,
				'required' => 'c'
			];
			// answers
			switch ($v['on_servquestion_type_code']) {
				case 'information':
					$form->elements['top']['ss_field_' . $k . '_answer_information']['ss_field_' . $k . '_answer_information'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'type' => 'text',
						'method' => 'div',
						'value' => i18n(null, $v['description']),
						'percent' => 100,
					];
					break;
				case 'select':
				case 'multiselect':
					$options_model = null;
					if (!empty($v['on_servquestion_model_id'])) {
						$options_model = self::$cached_all_models[$v['on_servquestion_model_id']]['sm_model_code'];
					}
					$form->elements['top']['ss_field_' . $k . '_answer']['ss_field_' . $k . '_answer'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'label_name' => '',
						'type' => 'text',
						'null' => true,
						'method' => $v['on_servquestion_type_code'],
						'options_model' => $options_model,
						'options' => $v['answers'],
						'multiple_column' => ($v['on_servquestion_type_code'] == 'multiselect' ? 1 : false),
						'searchable' => true,
						'percent' => 100,
						'required' => $v['on_servquestion_required']
					];
					break;
				case 'cal_date':
				case 'cal_time':
				case 'cal_datetime':
					$form->elements['top']['ss_field_' . $k . '_answer']['ss_field_' . $k . '_answer'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'label_name' => '',
						'type' => str_replace('cal_', '', $v['on_servquestion_type_code']),
						'null' => true,
						'method' => 'calendar',
						'calendar_icon' => 'right',
						'percent' => 100,
						'required' => $v['on_servquestion_required']
					];
					break;
				case 'input':
				case 'textarea':
					$form->elements['top']['ss_field_' . $k . '_answer']['ss_field_' . $k . '_answer'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'label_name' => '',
						'type' => 'text',
						'null' => true,
						'method' => $v['on_servquestion_type_code'],
						'percent' => 100,
						'required' => $v['on_servquestion_required']
					];
					break;
				case 'checkbox':
					$inner_counter = 1;
					foreach ($v['answers'] as $k2 => $v2) {
						$form->elements['top']['ss_field_' . $k . '_answer_' . $inner_counter]['ss_field_' . $k . '_answer_' . $inner_counter] = [
							'order' => 1,
							'row_order' => $order + $inner_counter,
							'label_name' => '',
							'type' => 'boolean',
							'percent' => 100,
							'description' => i18n(null, $k2),
						];
						$inner_counter++;
					}
					break;
				case 'radiobox':
					$form->elements['top']['ss_field_' . $k . '_answer']['ss_field_' . $k . '_answer'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'label_name' => '',
						'type' => 'text',
						'method' => 'radio',
						'percent' => 100,
						// radio boxes require options
						'options' => $v['answers']
					];
					break;
				case 'boolean':
					$form->elements['top']['ss_field_' . $k . '_answer']['ss_field_' . $k . '_answer'] = [
						'order' => 1,
						'row_order' => $order + 1,
						'label_name' => '',
						'type' => 'boolean',
						'method' => 'checkbox',
						'percent' => 100,
					];
					break;
				default:
					Throw new \Exception('Question type: ' . $v['on_servquestion_type_code'] . '?');
			}
			$counter++;
		}
	}
}