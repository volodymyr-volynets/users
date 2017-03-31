<?php

namespace Numbers\Users\Users\DataSource\ACL;
class Controllers2 extends \Numbers\Users\Users\DataSource\ACL\Controllers {
	public $pk = ['id'];
	public $alias_model = true;

	/**
	 * @see $this->options();
	 */
	public function optionsGroupped(array $options = []) : array {
		$data = $this->get($options);
		$result = [];
		foreach ($data as $k => $v) {
			if (!empty($v['breadcrumbs'])) {
				// ad parents
				$previous = null;
				$first = null;
				$flag_skip_next = false;
				foreach ($v['breadcrumbs'] as $k2 => $v2) {
					if ($flag_skip_next) {
						$flag_skip_next = false;
						continue;
					}
					if ($v2 == 'Operations') {
						$flag_skip_next = true;
						continue;
					}
					if (!isset($first)) $first = $v2;
					$parent = $previous;
					$previous.= '::' . $v2;
					if (!isset($result[$previous])) {
						$result[$previous] = ['name' => $v2, 'parent' => $parent, 'disabled' => true];
					}
				}
				// add actual item
				$__selected_name = '';
				if (isset($first)) $__selected_name = i18n(null, $first) . ': ';
				$__selected_name.= i18n(null, $v['name']);
				$result[$v['id']] = ['name' => $v['name'], 'icon_class' => \HTML::icon(['type' => $v['icon'], 'class_only' => true]), '__selected_name' => $__selected_name, 'parent' => $previous];
			}
		}
		if (!empty($result)) {
			$converted = \Helper\Tree::convertByParent($result, 'parent');
			$result = [];
			\Helper\Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
		}
		return $result;
	}
}