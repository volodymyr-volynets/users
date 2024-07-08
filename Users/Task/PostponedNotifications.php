<?php

namespace Numbers\Users\Users\Task;
class PostponedNotifications extends \Numbers\Users\TaskScheduler\Abstract2\Task {

	public $task_code = 'UM_NOTIFICATION_POSTPONED';

	public function execute(array $parameters, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => [],
			'data' => [
				'comments' => []
			]
		];
		if (empty($parameters['start_date'])) {
			$parameters['start_date'] = \Format::now('date');
		}
		if (empty($parameters['end_date'])) {
			$parameters['end_date'] = \Helper\Date::addInterval($parameters['start_date'], '-3 days', 'Y-m-d');
		}
		// todo.
		$message_result = \Numbers\Users\Users\Model\Notification\PostponedMessages::getStatic([
			'where' => [
				'um_notpostmess_completed_timestamp' => null
			],
			'pk' => null,
		]);
		$counter = 0;
		$same_messages = [];
		foreach ($message_result as $k => $v) {
			$hash = sha1($v['um_notpostmess_method'] . serialize($v['um_notpostmess_params']));
			if (empty($same_messages[$hash])) {
				\Log::setOriginatedId($v['um_notpostmess_sm_log_originated_id']);
				call_user_func_array(explode('::', $v['um_notpostmess_method']), json_decode($v['um_notpostmess_params'], true));
				\Log::setOriginatedId(null);
				$update_result = \Numbers\Users\Users\Model\Notification\PostponedMessages::collectionStatic(['skip_acl' => true])->merge([
					'um_notpostmess_id' => $v['um_notpostmess_id'],
					'um_notpostmess_completed_timestamp' => \Format::now('timestamp'),
				]);
			} else {
				$update_result = \Numbers\Users\Users\Model\Notification\PostponedMessages::collectionStatic(['skip_acl' => true])->merge([
					'um_notpostmess_id' => $v['um_notpostmess_id'],
					'um_notpostmess_completed_timestamp' => \Format::now('timestamp'),
					'um_notpostmess_last_message' => 'Simular message has been sent!'
				]);
			}
			if(!$update_result['success']) {
				$result['error'] = array_merge3($result['error'], $update_result['error']);
				return $result;
			}
			$counter++;
			$same_messages[$hash] = true;
		}
		$result['success'] = true;
		if ($counter > 0) {
			$result['data']['comments'][] = i18n(null, 'Executed [number] postponed messages!', ['replace' => ['[number]' => \Format::id($counter)]]);
		}
		return $result;
	}
}