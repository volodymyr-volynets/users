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
}