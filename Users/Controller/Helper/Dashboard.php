<?php

namespace Numbers\Users\Users\Controller\Helper;
class Dashboard extends \Object\Controller\Authorized {
	public function actionIndex() {
		$dashboards = \Object\ACL\Resources::getStatic('postlogin_dashboard');
		array_key_sort($dashboards, ['order' => SORT_ASC]);
		$grid = [
			'options' => []
		];
		$counter = 1;
		$row_number = 1;
		foreach ($dashboards as $k => $v) {
			$class = $v['model'];
			$model = new $class();
			// continue loop
			if (!$model->acl()) {
				continue;
			}
			if ($counter % 2) {
				$row_number++;
			}
			$percent = 50;
			if (!empty($v['double'])) {
				$row_number++;
				$percent = 100;
			}
			$name = i18n(null, $v['name']);
			if (!empty($v['icon'])) {
				$name = \HTML::icon(['type' => $v['icon']]) . ' ' . $name;
			}
			$grid['options'][$row_number][$counter][$counter] = [
				'value' => '<div class="postlogin_dashboard_holder"><h4>' . $name . '</h4>' . $model->render() . '</div>',
				'options' => [
					'percent' => $percent
				]
			];
			$counter++;
			if (!empty($v['double'])) {
				$counter++;
			}
		}
		echo <<<TTT
			<style>
				.postlogin_dashboard_holder {
					border: 1px solid #DDDDDD;
					background: linear-gradient(#FFFFFF, #DDDDDD);
				}
				.postlogin_dashboard_div {
					text-align: center;
					height: 5em;
					overflow: hidden;
					font-size: 0.6rem;
				}
				.postlogin_dashboard_icon {
					font-size: 2em;
				}
			</style>
TTT;
		echo \HTML::grid($grid);
	}
}