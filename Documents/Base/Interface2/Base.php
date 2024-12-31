<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Interface2;

interface Base
{
    public function upload(array $file, array $catalog): array;
    public function download(array $file, array $options = []);
    public function delete(array $file): array;
}
