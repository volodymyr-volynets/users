<?php

namespace Numbers\Users\Documents\Drivers\Amazon;
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
			'path' => null,
			'thumbnail_path' => null
		];
		// todo
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
		// todo
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
		// todo
	}
}