<?php

namespace Numbers\Users\APIs\Helper;
class SoapServerHendler {

	/**
	 * Magic call method
	 *
	 * @param string $name
	 * @param array $arguments
	 * @return mixed
	 */
	public function __call($name, $arguments) {
		$model_method = explode('_', $name);
		$temp = str_replace('APIs', 'Apis', $model_method[0]);
		$model = split_on_uppercase($temp);
		foreach ($model as $k => $v) {
			if ($v == 'Apis') $model[$k] = 'APIs';
		}
		$model = \Factory::model('\\' . implode('\\', $model));
		return call_user_func_array([& $model, 'action' . ucfirst($model_method[1])], $arguments);
	}
}