<?php

namespace Numbers\Users\Users\Form\Scheduling;
class Availability extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_scheduling_availability';
	public $module_code = 'UM';
	public $title = 'U/M Schedule Availability Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'organization' => [
				'organization_id' => ['order' => 1, 'row_order' => 50, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
			],
			'dates' => [
				'datetime_start' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Datetime Start', 'type' => 'datetime', 'percent' => 50, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'datetime_end' => ['order' => 2, 'label_name' => 'Datetime End', 'type' => 'datetime', 'percent' => 50, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right'],
			],
			'days' => [
				'days' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Days', 'domain' => 'type_id', 'null' => true, 'percent' => 100, 'multiple_column' => 1, 'placeholder' => 'Days', 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Users\Model\Scheduling\Interval\WeekDays', 'options_options' => ['i18n' => 'skip_sorting']],
			],
			'type_id' => [
				'type_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Scheduling\Appointment\SubTypes', 'options_options' => ['i18n' => 'skip_sorting']],
			],
			'duration' => [
				'duration' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Duration', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 40, 'placeholder' => 'Duration (Minutes)', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Scheduling\Appointment\Duration', 'options_options' => ['i18n' => 'skip_sorting']],
				'travel' => ['order' => 2, 'label_name' => 'Travel Time', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 40, 'placeholder' => 'Travel Time (Minutes)', 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Scheduling\Appointment\Duration', 'options_options' => ['i18n' => 'skip_sorting']],
				'holidays' => ['order' => 3, 'label_name' => 'Allow Holidays', 'type' => 'boolean', 'percent' => 20],
			],
			'users' => [
				'user_id' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Users', 'domain' => 'user_id', 'null' => true, 'required' => true, 'percent' => 100, 'multiple_column' => 1, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Users\DataSource\Users', 'options_depends' => ['selected_organizations' => 'organization_id'], 'options_params' => ['include_himself' => true]],
			]
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];

	public function save(& $form) {
		return true;
	}
}