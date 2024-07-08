<?php

namespace Numbers\Users\Documents\Base\Helper;
class Preview {

	/**
	 * Preview
	 *
	 * @param object $form
	 * @param array $options
	 * @param mixed $value
	 * @param array $neighbouring_values
	 * @return string
	 */
	public function renderPreview(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values[$options['options']['preview_file_id']])) {
			return '<div>' . \HTML::img(['src' => \Numbers\Users\Documents\Base\Base::generateURL($neighbouring_values[$options['options']['preview_file_id']])]) . '</div>';
		} else {
			return '';
		}
	}

	/**
	 * Render image
	 *
	 * @param int $file_id
	 * @param int $width
	 * @param int $height
	 * @return string
	 */
	public static function renderImage($file_id, $width, $height) {
		return \HTML::img(['src' => \Numbers\Users\Documents\Base\Base::generateURL($file_id), 'class' => 'navbar-menu-item-avatar-img', 'width' => $width, 'height' => $height]);
	}

	/**
	 * Render icon
	 *
	 * @param string $text
	 * @param int $width
	 * @param int $height
	 * @return string
	 */
	public static function renderIcon($text, $width, $height) {
		return \HTML::img(['src' => \Numbers\Users\Documents\Base\Base::generateIconURL($text, $width, $height), 'class' => 'navbar-menu-item-avatar-img', 'width' => $width, 'height' => $height]);
	}

	/**
	 * Render attachment list
	 *
	 * @param object $form
	 * @param array $options
	 * @param mixed $value
	 * @param array $neighbouring_values
	 */
	public function renderAttachmentList(& $form, & $options, & $value, & $neighbouring_values) {
		$result = '';
		$files = [];
		for ($i = 1; $i <= $options['options']['documents_render_links']['max_files']; $i++) {
			if (!empty($neighbouring_values[$options['options']['documents_render_links']['prefix'] . $i])) {
				$files[]= $neighbouring_values[$options['options']['documents_render_links']['prefix'] . $i];
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
				if (!empty($result)) {
					$result.= '<br/>';
				}
				$result.= \HTML::a(['href' => \Numbers\Users\Documents\Base\Base::generateURL($k, false, $v['dt_file_name']), 'target' => '_blank', 'value' => \HTML::icon(['type' => 'fas fa-link']) . ' ' . $v['dt_file_name']]);
			}
		}
		return $result;
	}

	/**
	 * Download one file
	 *
	 * @param int $file_id
	 * @param array $options
	 *	boolean save_in_temp
	 * @return array
	 */
	public static function downloadOneFile(int $file_id, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => [],
			'data' => null,
			'tmp_path' => null,
		];
		$model = new \Numbers\Users\Documents\Base\Base();
		if (!empty($options['save_in_temp'])) {
			$model_files = new \Numbers\Users\Documents\Base\Model\Files();
			$file_data = $model_files->get([
				'where' => [
					'dt_file_id' => $file_id,
				],
				'pk' => null,
				'cache_memory' => true,
			]);
			$result['tmp_path'] = tempnam(sys_get_temp_dir(), 'NAIMG') . '.' . $file_data[0]['dt_file_extension'];
			$result['data'] = $model->download($file_id, ['return' => true, 'include_metadata' => true]);
			file_put_contents($result['tmp_path'], $result['data']);
			\Helper\File::chmod($result['tmp_path'], 0777);
		} else {
			$result['data'] = $model->download($file_id, ['return' => true, 'include_metadata' => true]);
		}
		$result['success'] = true;
		return $result;
	}
}