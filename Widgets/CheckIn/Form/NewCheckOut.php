<?php

namespace Numbers\Users\Widgets\CheckIn\Form;
class NewCheckOut extends \Object\Form\Wrapper\Base {
	public $form_link = 'wg_new_checkout';
	public $module_code = 'UM';
	public $title = 'U/M New Check Out Form';
	public $options = [
		'on_success_refresh_parent' => true
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'wg_checkin_checkin_latitude' => [
				'wg_checkin_checkout_latitude' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Check Out Latitude', 'domain' => 'geo_coordinate', 'null' => true, 'required' => true, 'percent' => 50, 'readonly' => true],
				'wg_checkin_checkout_longitude' => ['order' => 2, 'label_name' => 'Check Out Longitude', 'domain' => 'geo_coordinate', 'null' => true, 'required' => true, 'percent' => 50, 'readonly' => true],
			],
			'map' => [
				'map' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Map', 'percent' => 100, 'method' => 'map', 'class' => 'google_map_element_holder'],
			],
			self::HIDDEN => [
				'wg_checkin_id' => ['label_name' => 'Check In #', 'domain' => 'big_id_sequence', 'null' => true, 'method' => 'hidden'],
				'wg_checkin_checkin_timestamp' => ['label_name' => 'Check In Timestamp', 'type' => 'timestamp', 'null' => true, 'method' => 'hidden'],
			],
		],
		'buttons' => [
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_SAVE_DATA,
			]
		]
	];
	public $collection = [];

	public function overrides(& $form) {
		if (!empty($form->__options['model_table'])) {
			$model = new $form->__options['model_table']();
			$form->collection = [
				'name' => 'Check In / Out',
				'model' => $model->checkins_model
			];
		}
	}

	public function refresh(& $form) {
		\Layout::addJs('/numbers/media_submodules/Numbers_Users_Widgets_CheckIn_Media_JS_CheckIn.js', 46000);
		$js = <<<TTT
			Numbers.Widgets.CheckIn.getLocation(function(position) {
				$('#form_wg_new_checkout_element_wg_checkin_checkout_latitude').val(position.coords.latitude);
				$('#form_wg_new_checkout_element_wg_checkin_checkout_longitude').val(position.coords.longitude);
				setTimeout(function() {
					Numbers.MapInterface.addMarker('form_wg_new_checkout_element_map', position.coords.latitude, position.coords.longitude);
					Numbers.MapInterface.center('form_wg_new_checkout_element_map', position.coords.latitude, position.coords.longitude);
					Numbers.MapInterface.zoom('form_wg_new_checkout_element_map', 15);
				}, 1000);
			});
TTT;
		\Layout::onload($js);
	}

	public function validate(& $form) {
		$model = new $form->options['model_table']();
		foreach ($model->checkins['map'] as $k => $v) {
			if (isset($form->options['input'][$k])) {
				$form->values[$v] = (int) $form->options['input'][$k];
			}
		}
		// checkin timestamp
		$form->values['wg_checkin_checkout_timestamp'] = \Format::now('timestamp');
		$form->values['wg_checkin_duration'] = \Helper\Date::diff($form->values['wg_checkin_checkin_timestamp'], $form->values['wg_checkin_checkout_timestamp'], 'abs seconds', true);
	}
}