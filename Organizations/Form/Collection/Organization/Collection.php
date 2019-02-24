<?php

namespace Numbers\Users\Organizations\Form\Collection\Organization;
class Collection extends \Object\Form\Wrapper\Collection {
	public $collection_link = 'on_organizations_collection';
	const BYPASS = ['on_organization_id'];
	public $data = [
		self::MAIN_SCREEN => [
			'order' => 1000,
			self::ROWS => [
				self::MAIN_ROW => [
					'order' => 100,
					self::FORMS => [
						'on_organizations' => [
							'model' => '\Numbers\Users\Organizations\Form\Organizations',
							'bypass_values' => [
								'on_organization_id',
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
							'acl_subresource_hide' => ['ON::ORG_COMMENTS'],
							'bypass_input' => self::BYPASS,
							'options' => [
								'label_name' => 'Comments',
								'bypass_hidden_from_input' => self::BYPASS,
								'model_table' => '\Numbers\Users\Organizations\Model\Organizations',
								'acl_subresource_edit' => ['ON::ORG_COMMENTS'],
							],
							'order' => 1
						],
						'wg_documents' => [
							'model' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents',
							'submodule' => 'Numbers.Users.Widgets.Documents',
							'acl_subresource_hide' => ['ON::ORG_DOCUMENTS'],
							'bypass_input' => self::BYPASS,
							'options' => [
								'label_name' => 'Documents',
								'bypass_hidden_from_input' => self::BYPASS,
								'model_table' => '\Numbers\Users\Organizations\Model\Organizations',
								'acl_subresource_edit' => ['ON::ORG_DOCUMENTS'],
							],
							'order' => 2
						],
						'wg_tags' => [
							'model' => '\Numbers\Users\Widgets\Tags\Form\List2\Tags',
							'submodule' => 'Numbers.Users.Widgets.Tags',
							'acl_subresource_hide' => ['ON::ORG_TAGS'],
							'bypass_input' => self::BYPASS,
							'options' => [
								'label_name' => 'Tags',
								'bypass_hidden_from_input' => self::BYPASS,
								'model_table' => '\Numbers\Users\Organizations\Model\Organizations',
								'acl_subresource_edit' => ['ON::ORG_TAGS'],
							],
							'order' => 3
						],
					]
				]
			]
		]
	];

	public function distribute() {
		if (empty($this->values['on_organization_id'])) {
			unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
		}
	}
}