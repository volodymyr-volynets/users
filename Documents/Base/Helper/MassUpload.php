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
	 * @param string $catalog_code
	 * @param array $options
	 *	boolen return_files
	 *	string file_upload_field_name
	 * @return array|false
	 */
	public static function uploadFewFilesInForm(& $form, int $max_files = 10, array $files, string $prefix, array $validator_params = [], string $catalog_code = '', array $options = []) {
		if (count($files) > $max_files) {
			$form->error(DANGER, \Numbers\Users\Documents\Base\Helper\Messages::MAX_FILES, $options['file_upload_field_name'] ?? null, ['replace' => ['[number]' => \Format::id($max_files)]]);
			return false;
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
			return false;
		}
		$counter = 1;
		$final_result = [];
		foreach ($files as $k => $v) {
			$v['__image_properties'] = $validator_params;
			$result = $upload_model->upload($v, $catalog);
			if (!$result['success']) {
				$form->error(DANGER, $result['error']);
				return false;
			}
			if ($max_files == 1) {
				if (empty($options['return_files'])) {
					$form->values[$prefix] = $result['file_id'];
				} else {
					$final_result[$prefix] = $result['file_id'];
				}
			} else {
				if (empty($options['return_files'])) {
					$form->values[$prefix . $counter] = $result['file_id'];
				} else {
					$final_result[$prefix . $counter] = $result['file_id'];
				}
			}
			$counter++;
		}
		if ($counter <= $max_files && $max_files > 1) {
			for ($i = $counter - 1; $i <= $max_files; $i++) {
				if (empty($options['return_files'])) {
					$form->values[$prefix . $counter] = null;
				} else {
					$final_result[$prefix . $counter] = null;
				}
			}
		}
		return $final_result;
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
}