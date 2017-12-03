<?php

namespace Numbers\Users\Documents\Base\Interface2;
interface Base {
	public function upload(array $options) : array;
	public function download(array $options);
}