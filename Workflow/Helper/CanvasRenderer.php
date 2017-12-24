<?php

namespace Numbers\Users\Workflow\Helper;
class CanvasRenderer {

	/**
	 * Render
	 *
	 * @param array $data
	 * @param array $options
	 *		int width
	 *		int height
	 * @return string
	 */
	public static function render(array $data, array $options = []) {
		$options['width'] = $options['width'] ?? 1024;
		$options['height'] = $options['height'] ?? 768;
		// sort by order
		array_key_sort($data, ['order' => SORT_ASC]);
		//create image
		$image = imagecreatetruecolor($options['width'], $options['height']);
		// loop through shapes
		foreach ($data as $k => $v) {
			
		}
		// render image
		ob_start();
		imagepng($image);
		$imagedata = ob_get_contents();
		ob_end_clean();
		return '<img src="data:image/png;base64,' . base64_encode($imagedata) . '" alt="" width="' . $options['width'] . '" height="' . $options['height'] . '"/>';
	}
}