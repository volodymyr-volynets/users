<?php

namespace Numbers\Users\TaskScheduler\Helper;
class CreateJob {

	/**
	 * Create
	 *
	 * @param string $task_code
	 * @param object $form
	 */
	public static function create(string $task_code, & $form) {
		$params = [
			'ts_job_task_code' => $task_code,
			'ts_job_name' => $form->title,
			'ts_job_module_id' => \Application::$controller->module_id,
			'\Numbers\Users\TaskScheduler\Model\JobParameters' => []
		];
		foreach ($form->values as $k => $v) {
			if ($k[0] == '_') continue;
			$params['\Numbers\Users\TaskScheduler\Model\JobParameters'][] = [
				'ts_jbparam_name' => $k,
				'ts_jbparam_value' => $v
			];
		}
		$url = '/Numbers/Users/TaskScheduler/Controller/Jobs/_Edit?' . http_build_query2($params);
		if (\Application::get('flag.global.__ajax')) {
			\Layout::onLoad("window.location.href = '{$url}';");
		} else {
			\Request::redirect($url);
		}
	}
}
