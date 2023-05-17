<?php

namespace Numbers\Users\Users\Form\Task;
class PostponedNotifications extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_tasks_postponed_notifications';
	public $module_code = 'UM';
	public $title = 'U/M Postponed Notifications Task';
	public $options = [
		'segment' => self::SEGMENT_TASK,
		'actions' => [
			'refresh' => true
		],
		'no_ajax_form_reload' => true,
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'dates' => [
				'start_date' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Start Date', 'type' => 'date', 'null' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'end_date' => ['order' => 2, 'label_name' => 'End Date', 'type' => 'date', 'null' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_DATA,
				self::BUTTON_SUBMIT_POST => ['order' => 150, 'button_group' => 'left', 'value' => 'Create Job', 'type' => 'danger', 'method' => 'button2', 'accesskey' => 'p', 'process_submit' => 'other']
			]
		]
	];

	public function validate(& $form) {
		if ($form->hasErrors()) return;
		// if we are creating a job
		if (!empty($form->values['__submit_post'])) {
			\Numbers\Users\TaskScheduler\Helper\CreateJob::create('UM_NOTIFICATION_POSTPONED', $form);
		}
		$model = new \Numbers\Users\Users\Task\PostponedNotifications($form->values);
		$result = $model->process();
		if ($result['success']) {
			$form->error(SUCCESS, \Object\Content\Messages::OPERATION_EXECUTED);
			if (!empty($result['data']['comments'])) {
				foreach ($result['data']['comments'] as $v) {
					$form->error(SUCCESS, $v, null , ['skip_i18n' => true]);
				}
			}
		} else {
			$form->error(DANGER, $result['error']);
		}
	}
}