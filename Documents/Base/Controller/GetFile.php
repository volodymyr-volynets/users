<?php

namespace Numbers\Users\Documents\Base\Controller;
class GetFile extends \Object\Controller {
	public $title = 'Get File';
	public $skip_monitoring = true;
	public function actionIndex() {
		$input = \Request::input();
		if (empty($input['token'])) {
			Throw new \Exception('Invalid token!');
		} else {
			$crypt = new \Crypt();
			$token_data = $crypt->tokenValidate($input['token']);
			if ($token_data === false || ($token_data['token'] != 'file.view' && $token_data['token'] != 'thumbnail.view')) {
				Throw new \Exception('Invalid token!');
			} else {
				$model = new \Numbers\Users\Documents\Base\Base();
				echo $model->download($token_data['id'], ['thumbnail' => $token_data['token'] == 'thumbnail.view']);
			}
		}
	}
	public function actionIcon() {
		$input = \Request::input();
		if (empty($input['token'])) {
			Throw new \Exception('Invalid token!');
		} else {
			$crypt = new \Crypt();
			$token_data = $crypt->tokenValidate($input['token']);
			if ($token_data === false || ($token_data['token'] != 'icon.view')) {
				Throw new \Exception('Invalid token!');
			} else {
				$image = imagecreatetruecolor($input['width'] ?? 25, $input['height'] ?? 25);
				// determine background color
				$color_hex = substr(md5($input['text']), 0, 6);
				$color = hex2rgb($color_hex);
				$fill_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
				imagefilledrectangle($image, 0, 0, $input['width'] ?? 25, $input['height'] ?? 25, $fill_color);
				// text
				$fill_color_rgb = hex2rgb(\Numbers\Frontend\HTML\Renderers\Common\Colors::determineTextColor($color_hex));
				$fill_color = imagecolorallocate($image, $fill_color_rgb[0], $fill_color_rgb[1], $fill_color_rgb[2]);
				$font = __DIR__ . '/../Font/arial.ttf';
				imagettftext($image, $input['height'] - 8, 0, 5, $input['height'] - 4, $fill_color, $font, $input['text'][0]);
				// image
				header ('Content-Type: image/png');
				imagepng($image);
				imagedestroy($image);
				exit;
			}
		}
	}
}