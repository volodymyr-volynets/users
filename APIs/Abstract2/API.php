<?php

namespace Numbers\Users\APIs\Abstract2;
abstract class API {

	/**
	 * Constructor
	 *
	 * @param array $input
	 */
	public function __construct(array $input = []) {
		foreach ($this->instructions as $k => $v) {
			foreach ($v as $k2 => $v2) {
				$this->instructions[$k][$k2] = \Object\Data\Common::processDomainsAndTypes($this->instructions[$k][$k2]);
			}
		}
	}
}