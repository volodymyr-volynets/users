<?php

namespace Numbers\Users\Widgets\Comments\Helper;
class Files {

	/**
	 * Generate file urls
	 *
	 * @param array $data
	 * @param string $column_prefix
	 * @param int $max_files
	 * @return string
	 */
	public static function generateURLS(array $data, string $column_prefix, int $max_files) : string {
		$result = '';
		$files = [];
		for ($i = 1; $i <= $max_files; $i++) {
			if (!empty($data[$column_prefix . $i])) {
				$files[]= $data[$column_prefix . $i];
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