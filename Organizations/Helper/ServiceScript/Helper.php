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
					$inner_counter = 1;
					foreach ($v['answers'] as $k2 => $v2) {
						$form->elements['top']['ss_field_' . $k . '_answer_' . $inner_counter]['ss_field_' . $k . '_answer_' . $inner_counter] = [
							'order' => 1,
							'row_order' => $order + $inner_counter,
							'label_name' => '',
							'type' => 'text',
							'method' => 'radio', // todo fix here!!!       
							'percent' => 100,
							'description' => i18n(null, $k2),
							'group_by_class' => 'ss_field_' . $k . '_answer'
						];
						$inner_counter++;
					}
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