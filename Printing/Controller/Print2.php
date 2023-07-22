<?php

namespace Numbers\Users\Printing\Controller;
class Print2 extends \Object\Controller\Public2 {
	public function actionIndex() {
		$crypt = new \Crypt();
		$token = $crypt->tokenVerify(\Request::input('token'), ['view.print'], ['skip_time_validation' => true]);
		$this->printTemplate($token['data']['p8_template_id'], $token['data']['in_group_id'], 'text/html', $token['data']['pk']);
	}
	public function actionPDF() {
		$crypt = new \Crypt();
		$token = $crypt->tokenVerify(\Request::input('token'), ['view.print'], ['skip_time_validation' => true]);
		$this->printTemplate($token['data']['p8_template_id'], $token['data']['in_group_id'], 'application/pdf', $token['data']['pk']);
	}

	/**
	 * Print template
	 *
	 * @param int $template_id
	 * @param array $pk
	 * @return void
	 */
	public function printTemplate(int $p8_template_id, int $in_group_id, string $format, array $pk) : void {
		// load template
		$template = \Numbers\Users\Printing\DataSource\Templates::getStatic([
			'where' => [
				'p8_template_id' => $p8_template_id
			],
			'pk' => null,
			'single_row' => true
		]);
		// load data
		if (empty($template['p8_templtype_collection_model'])) {
			Throw new \Exception('Template must have collection model!');
		}
		/* @var $collection \Object\Collection */
		$collection = new $template['p8_templtype_collection_model']();
		$data = $collection->get([
			'where' => $pk
		]);
		// fix data
		$main_key = key($data['data']);
		$main_data = $data['data'][$main_key];
		unset($data['data'][$main_key]);
		foreach ($data['data'] as $k => $v) {
			$main_data = array_merge_hard($main_data, $v);
		}
		// create new report
		$report = new \Object\Form\Builder\Report([
			'pdf' => [
				'skip_header' => true,
				'skip_footer' => true,
				'margin_x' => 10,
				'margin_y' => 15,
				'font_size' => $template['p8_template_font_size'],
				'orientation' => $template['p8_template_print_orientation'],
				'format' => $template['p8_template_print_format'],
				'font' => $template['p8_template_font_family'],
				'font_size' => $template['p8_template_font_size']
			],
			'in_group_id' => $in_group_id
		]);
		$report->addReport(DEF, null, [
			'type' => 'template'
		]);
		// get headers
		$headers_all = json_decode($template['p8_template_version_headers'], true);
		array_key_sort($headers_all, ['p8_header_start_at_page' => SORT_ASC, 'p8_header_start_at_rows' => SORT_ASC]);
		$headers_by_page = [];
		foreach ($headers_all as $k => $v) {
			if (!isset($headers_by_page[$v['p8_header_start_at_page']])) {
				$headers_by_page[$v['p8_header_start_at_page']] = [];
			}
			$headers_by_page[$v['p8_header_start_at_page']][$v['p8_header_id']] = $v;
		}
		$page_number = 1;
		foreach ($headers_by_page as $k_page => $v_headers) {
			$row_number = 1;
			foreach ($v_headers as $k_header => $v_header) {
				// generate fields
				$header_fields = [];
				$skip_empty = [];
				// sort by order
				array_key_sort($v_header['\Numbers\Users\Printing\Model\Header\Fields'], ['p8_hdrfield_order' => SORT_ASC]);
				foreach ($v_header['\Numbers\Users\Printing\Model\Header\Fields'] as $v_temp) {
					$header_fields[$v_temp['p8_hdrfield_hdrrowtype_code']][$v_temp['p8_hdrfield_column_name']] = [
						'label_name' => $v_temp['p8_hdrfield_label_name'],
						'percent' => $v_temp['p8_hdrfield_percent'],
						'value' => $v_temp['p8_hdrfield_value'],
						'__multiple_columns' => str_contains($v_temp['p8_hdrfield_column_name'], '__multiple_') ? $v_temp['\Numbers\Users\Printing\Model\Header\Field\MultipleColumns'] : false,
						'__file_id' => str_contains($v_temp['p8_hdrfield_column_name'], '_file_id') ? true : false,
						'font_family' => $v_header['p8_header_font_family'],
						'font_style' => $v_header['p8_header_font_style'],
						'font_size' => $v_header['p8_header_font_size'],
					];
					// other fields
					if (!empty($v_temp['p8_hdrfield_other_options'])) {
						if (is_json($v_temp['p8_hdrfield_other_options'])) {
							$v_temp['p8_hdrfield_other_options'] = json_decode($v_temp['p8_hdrfield_other_options'], true);
						}
						$temp_extra_options = [];
						foreach ($v_temp['p8_hdrfield_other_options'] as $k => $v) {
							$temp_extra_options[str_replace('-', '_', $k)] = $v;
						}
						$header_fields[$v_temp['p8_hdrfield_hdrrowtype_code']][$v_temp['p8_hdrfield_column_name']] = array_merge_hard($header_fields[$v_temp['p8_hdrfield_hdrrowtype_code']][$v_temp['p8_hdrfield_column_name']], $temp_extra_options);
					}
					// skip empty
					if (!isset($skip_empty[$v_temp['p8_hdrfield_hdrrowtype_code']])) {
						$skip_empty[$v_temp['p8_hdrfield_hdrrowtype_code']] = false;
					}
					if (!empty($v_temp['p8_hdrfield_skip_empty'])) {
						$skip_empty[$v_temp['p8_hdrfield_hdrrowtype_code']] = true;
					}
				}
				$header_options = [
					'skip_rendering' => $v_header['p8_header_skip_rendering'],
					'start_at_page' => $v_header['p8_header_start_at_page'],
					'start_at_rows' => $v_header['p8_header_start_at_rows']
				];
				foreach ($header_fields as $k_row => $v_temp) {
					// add data
					if ($collection->data['model'] === $v_header['p8_header_data_model_code']) {
						$data_add = $main_data;
					} else {
						$data_add = $main_data[$v_header['p8_header_data_model_code']];
					}
					// skip empty
					if (!empty($skip_empty[$k_row])) {
						$found = false;
						foreach ($v_temp as $k0 => $v0) {
							if (!empty($data_add[$k0])) {
								$found = true;
							}
						}
						if (!$found) {
							continue;
						}
					}
					// add header
					$report->addHeader(DEF, 'header_' . $v_header['p8_header_id'] . '_' . $k_row, $v_temp, $header_options);
					unset($header_options['start_at_page'], $header_options['start_at_rows']);
					// if we have value in header
					foreach ($v_temp as $k0 => $v0) {
						if (isset($v0['value']) && $v0['value'] !== '') {
							$data_add[$k0] = $v0['value'];
						}
						// if we have multiple column
						if (!empty($v0['__multiple_columns'])) {
							array_key_sort($v0['__multiple_columns'], ['p8_hdrfldmult_multiple_order' => SORT_ASC]);
							$multiple_temp = [];
							$multiple_separator = ' ';
							foreach ($v0['__multiple_columns'] as $v2) {
								// add data
								if ($collection->data['model'] === $v2['p8_hdrfldmult_multiple_model_code']) {
									$data_add_multiple = $main_data;
								} else {
									$data_add_multiple = $main_data[$v2['p8_hdrfldmult_multiple_model_code']];
								}
								$multiple_temp[] = $data_add_multiple[$v2['p8_hdrfldmult_multiple_column_name']];
								$multiple_temp[] = $v2['p8_hdrfldmult_multiple_separator'] ?? $multiple_separator;
								if (!empty($v2['p8_hdrfldmult_multiple_separator'])) {
									$multiple_separator = $v2['p8_hdrfldmult_multiple_separator'];
								}
							}
							$data_add[$k0] = implode('', $multiple_temp);
							$data_add[$k0] = rtrim($data_add[$k0], $multiple_separator);
						}
						// options model
						if (!empty($v0['options_model'])) {
							$temp_options = \Factory::model('\\' . str_replace('_', '\\', $v0['options_model']), true)->options(['i18n' => true]);
							$data_add[$k0] = $temp_options[$data_add[$k0]]['name'];
						}
					}
					// add data
					$report->addData(DEF, 'header_' . $v_header['p8_header_id'] . '_' . $k_row, null, $data_add);
				}
			}
		}
		//$report->addSeparator(DEF);
		// render report
		$content_types_model = new \Object\Form\Model\Report\Types();
		$content_types = $content_types_model->get();
		if (empty($content_types[$format])) $format = 'text/html';
		$model = new $content_types[$format]['no_report_content_type_model']();
		$report_html = $model->render($report);
		echo $report_html;
	}
}