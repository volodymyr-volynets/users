<?php

namespace Numbers\Users\Documents\Drivers\LocalFolder;
class Base implements \Numbers\Users\Documents\Base\Interface2\Base {

	/**
	 * Options
	 *
	 * @var array
	 */
	public $options;

	/**
	 * Constructor
	 *
	 * @param array $options
	 */
	public function __construct(array $options) {
		$this->options = $options;
	}

	/**
	 * Upload
	 *
	 * @param array $file
	 * @return array
	 */
	public function upload(array $file, array $catalog) : array {
		$result = [
			'success' => false,
			'error' => [],
			'path' => null
		];
		$application_structure = \Application::get('application.structure');
		$dir = rtrim($this->options['dir'], '/') . '/';
		if (!empty($application_structure['db_multiple'])) {
			$dir.= $application_structure['settings']['db']['default']['dbname'] . '/';
		}
		$dir.= \Tenant::id() . '/' . strtolower($catalog['dt_catalog_code']) . '/';
		// create directory is does not exists
		if (!file_exists($dir)) {
			if (!\Helper\File::mkdir($dir)) {
				$result['error'][] = 'Could not create file directory!';
				return $result;
			}
		}
		// move uploaded file
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		$destination = $dir . $file['file_id'] . '.' . $extension;
		if (!move_uploaded_file($file['tmp_name'], $destination)) {
			$result['error'][] = 'Could not move uploaded file!';
			return $result;
		}
		$result['success'] = true;
		$result['path'] = $destination;
		return $result;
	}

	/**
	 * Delete
	 *
	 * @param array $file
	 * @return array
	 */
	public function delete(array $file) : array {
		$result = [
			'success' => false,
			'error' => [],
		];
		if (!\Helper\File::delete($file['dt_file_path'])) {
			$result['error'][] = 'Could not delete file!';
		} else {
			$result['success'] = true;
		}
		return $result;
	}

	/**
	 * Download
	 *
	 * @param array $file
	 * @param array $options
	 * @return mixed
	 */
	public function download(array $file, array $options = []) {
		\Layout::renderAs(file_get_contents($file['dt_file_path']), $file['dt_file_mime']);
	}
}