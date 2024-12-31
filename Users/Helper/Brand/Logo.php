<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Brand;

class Logo
{
    /**
     * Render top logo
     */
    public function renderTopLogo(& $form)
    {
        $logo = \Application::get('brand.email.logo');
        if (empty($logo)) {
            return '';
        }
        // pack the image by base64 encoding
        if (isset($logo['local_filename'])) {
            $logo['src'] = 'data: ' . mime_content_type($logo['local_filename']) . ';base64,' . base64_encode(file_get_contents($logo['local_filename']));
        }
        // render
        $result = '<table>';
        $result .= '<tr>';
        $result .= '<td>' . \HTML::img($logo) . '</td>';
        $result .= '</tr>';
        $result .= '</table>';
        return $result;
    }
}
