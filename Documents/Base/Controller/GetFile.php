<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Controller;

use Numbers\Frontend\HTML\Renderers\Common\Colors;
use Numbers\Users\Documents\Base\Base;
use Object\Controller;

class GetFile extends Controller
{
    public $title = 'Get File';
    public $skip_monitoring = true;
    public function actionIndex()
    {
        $input = \Request::input();
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'], ['file.view', 'thumbnail.view']);
        // proceed with logic
        $model = new Base();
        echo $model->download($token_data['id'], ['thumbnail' => $token_data['token'] == 'thumbnail.view']);
    }
    public function actionIcon()
    {
        $input = \Request::input();
        $crypt = new \Crypt();
        $token_data = $crypt->tokenVerify($input['token'], ['icon.view']);
        // proceed with logic
        $image = imagecreatetruecolor($input['width'] ?? 25, $input['height'] ?? 25);
        // determine background color
        $color_hex = Colors::colorFromString($input['text']);
        $color = hex2rgb($color_hex);
        $fill_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
        imagefilledrectangle($image, 0, 0, $input['width'] ?? 25, $input['height'] ?? 25, $fill_color);
        // text
        if (function_exists('imagettftext')) {
            $fill_color_rgb = hex2rgb(Colors::determineTextColor($color_hex));
            $fill_color = imagecolorallocate($image, $fill_color_rgb[0], $fill_color_rgb[1], $fill_color_rgb[2]);
            $font = __DIR__ . '/../Font/arial.ttf';
            imagettftext($image, $input['height'] - 8, 0, 5, $input['height'] - 4, $fill_color, $font, $input['text'][0]);
        }
        // image
        header('Content-Type: image/png');
        imagepng($image);
        imagedestroy($image);
        exit;
    }
}
