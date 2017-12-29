<?php

namespace Numbers\Users\Workflow\Controller\Account;
class Workflows extends \Object\Controller\Authorized {
	public function actionIndex() {
		$input = \Request::input();
		$input['ww_execwflow_user_id'] = \User::id();
		$form = new \Numbers\Users\Workflow\Form\List2\Account\Workflows([
			'input' => $input
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Workflow\Form\Account\ContinueWorkflow([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionNew() {
		$form = new \Numbers\Users\Workflow\Form\Account\StartWorkflow([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionJsonMenuName() {
		// fetch number of messages
		/*
		$query = \Numbers\Users\Users\Model\Message\Recipients::queryBuilderStatic()->select();
		$query->columns(['count' => 'COUNT(*)']);
		$query->where('AND', ['a.um_mesrecip_read', '=', 0]);
		$query->where('AND', ['a.um_mesrecip_user_id', '=', \User::id()]);
		$data = $query->query();
		*/
		// generate message
		$label = i18n(null, 'Workflows') . ' ' . \HTML::label2(['type' => 'primary', 'value' => \Format::id(0)]);
		\Layout::renderAs([
			'success' => true,
			'error' => [],
			'data' => $label,
			'item' => \Request::input('item')
		], 'application/json');
	}
}