<?php

namespace Numbers\Users\Documents\Base\Helper;
class MassUpload {

	/**
	 * Upload few files in form
	 *
	 * @param object $form
	 * @param int $max_files
	 * @param array $files
	 * @param string $prefix
	 * @param array $validator_params
	 */
	public static function uploadFewFilesInForm(& $form, int $max_files = 10, array $files, string $prefix, array $validator_params = [], string $catalog_code = '') {
		if (count($files) > $max_files) {
			$form->error(DANGER, \Numbers\Users\Documents\Base\Helper\Messages::MAX_FILES, null, ['replace' => ['[number]' => \Format::id($max_files)]]);
			return;
		}
		$upload_model = new \Numbers\Users\Documents\Base\Base();
		if (!empty($catalog_code)) {
			$catalog = \Numbers\Users\Documents\Base\Model\Catalogs::getStatic([
				'where' => [
					'dt_catalog_code' => $catalog_code,
				],
				'pk' => null,
				'single_row' => true
			]);
		} else {
			$catalog = $upload_model->fetchPrimaryCatalog(\User::get('organization_id'));
		}
		if (empty($catalog)) {
			$form->error(DANGER, \Numbers\Users\Documents\Base\Helper\Messages::NO_PRIMARY_CATALOG);
			return;
		}
		$counter = 1;
		foreach ($files as $k => $v) {
			$v['__image_properties'] = $validator_params;
			$result = $upload_model->upload($v, $catalog);
			if (!$result['success']) {
				$form->error(DANGER, $result['error']);
				return;
			}
			$form->values[$prefix . $counter] = $result['file_id'];
			$counter++;
		}
		if ($counter <= $max_files) {
			for ($i = $counter - 1; $i <= $max_files; $i++) {
				$form->values[$prefix . $counter] = null;
			}
		}
	}

	/**
	 * Upload one file
	 *
	 * @param object $form
	 * @param array $file
	 * @param string $field
	 * @param array $validator_params
	 */
	public static function uploadOneInForm(& $form, $file, string $field, array $validator_params = []) {
		$upload_model = new \Numbers\Users\Documents\Base\Base();
		$catalog = $upload_model->fetchPrimaryCatalog(\User::get('organization_id'));
		if (empty($catalog)) {
			$form->error(DANGER, \Numbers\Users\Documents\Base\Helper\Messages::NO_PRIMARY_CATALOG);
			return;
		}
		$file['__image_properties'] = $validator_params;
		$result = $upload_model->upload($file, $catalog);
		if (!$result['success']) {
			$form->error(DANGER, $result['error']);
			return;
		}
		$form->values[$field] = $result['file_id'];
	}

	/**
	 * Upload external urls
	 *
	 * @param string $class
	 * @param array $where
	 * @param string $catalog_code
	 * @param array $urls
	 * @return array
	 */
	public static function uploadExternalURLs(string $class, array $where, string $catalog_code, array $urls) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		// get next sequence number
		$file_save_model = new \Numbers\Users\Documents\Base\Model\Files();
		$file_save_model->db_object->begin();
		// fetch catalog
		$catalog = \Numbers\Users\Documents\Base\Model\Catalogs::getStatic([
			'where' => [
				'dt_catalog_code' => $catalog_code,
			],
			'pk' => null,
			'single_row' => true,
		]);
		// create database record
		$counter = 1;
		$ids = $where;
		$ids['wg_document_catalog_code'] = $catalog_code;
		foreach ($urls as $k => $v) {
			$id = $file_save_model->sequence('dt_file_id', 'nextval', \Tenant::id());
			$save = [
				'dt_file_id' => $id,
				'dt_file_storage_id' => $catalog['dt_catalog_storage_id'],
				'dt_file_catalog_code' => $catalog['dt_catalog_code'],
				'dt_file_organization_id' => $catalog['dt_catalog_organization_id'],
				'dt_file_name' => $k,
				'dt_file_extension' => pathinfo($k, PATHINFO_EXTENSION),
				'dt_file_mime' => null,
				'dt_file_size' => 0,
				'dt_file_path' => '',
				'dt_file_thumbnail_path' => '',
				'dt_file_language_code' => \I18n::$options['language_code'] ?? null,
				'dt_file_readonly' => $catalog['dt_catalog_readonly'],
				'dt_file_temporary' => $catalog['dt_catalog_temporary'],
				'dt_file_url' => $v,
				'dt_file_inactive' => 0
			];
			$save_result = $file_save_model->collection()->merge($save);
			if (!$save_result['success']) {
				$result['error'] = array_merge($result['error'], $save_result['error']);
				$file_save_model->db_object->rollback();
				return $result;
			}
			$ids['wg_document_file_id_' . $counter] = $id;
			$counter++;
		}
		// update model
		$documents_model = \Factory::model($class);
		$documents_result = $documents_model->collection()->merge($ids);
		if (!$documents_result['success']) {
			$result['error'] = array_merge($result['error'], $documents_result['error']);
			$file_save_model->db_object->rollback();
			return $result;
		}
		$file_save_model->db_object->commit();
		$result['success'] = true;
		return $result;
	}
}