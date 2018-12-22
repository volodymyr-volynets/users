<?php

namespace Numbers\Users\Users\Form\Collection\Users;
class Collection extends \Object\Form\Wrapper\Collection {
	public $collection_link = 'um_users_collection';
	const BYPASS = ['um_user_id'];
	public $data = [
		self::MAIN_SCREEN => [
			'order' => 1000,
			self::ROWS => [
				self::MAIN_ROW => [
					'order' => 100,
					self::FORMS => [
						'um_users' => [
							'model' => '\Numbers\Users\Users\Form\Users',
							'bypass_values' => [
								'um_user_id',
							],
							'flag_main_form' => true,
							'options' => [
								'segment' => \Object\Form\Parent2::SEGMENT_FORM,
								'percent' => 100,
							],
							'order' => 1
						]
					]
				],
				self::WIDGETS_ROW => [
					'options' => [
						'type' => 'tabs',
						'segment' => \Object\Form\Parent2::SEGMENT_ADDITIONAL_INFORMATION,
						'its_own_segment' => true
					],
					'order' => PHP_INT_MAX - 1000,
					self::FORMS => [
						'wg_comments' => [
							'model' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments',
							'submodule' => 'Numbers.Users.Widgets.Comments',
							'acl_subresource_hide' => ['UM::USER_COMMENTS'],
							'bypass_input' => self::BYPASS,
							'options' => [
								'label_name' => 'Comments',
								'bypass_hidden_from_input' => self::BYPASS,
								'model_table' => '\Numbers\Users\Users\Model\Users',
								'acl_subresource_edit' => ['UM::USER_COMMENTS'],
							],
							'order' => 1
						],
						'wg_documents' => [
							'model' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents',
							'submodule' => 'Numbers.Users.Widgets.Documents',
							'acl_subresource_hide' => ['UM::USER_DOCUMENTS'],
							'bypass_input' => self::BYPASS,
							'options' => [
								'label_name' => 'Documents',
								'bypass_hidden_from_input' => self::BYPASS,
								'model_table' => '\Numbers\Users\Users\Model\Users',
								'acl_subresource_edit' => ['UM::USER_DOCUMENTS'],
							],
							'order' => 2
						],
					]
				]
			]
		]
	];

	public function distribute() {
		if (empty($this->values['um_user_id'])) {
			unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
		}
	}
}