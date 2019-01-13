<?php

namespace Numbers\Users\Users\Controller\Helper;
class Dashboard extends \Object\Controller\Authorized {
	public function actionIndex() {
		\Layout::addCss('/numbers/media_submodules/Numbers_Users_Users_Media_CSS_Base.css');
		$data = \Object\ACL\Resources::getStatic('menu', 'primary');
		$data = $data[200] ?? [];
		if (!empty($data['Operations'])) {
			$temp = $data['Operations']['options'];
			unset($data['Operations']);
			$data = array_merge_hard($data, $temp);
		}
		// translate
		\I18n::translateArray($data, true);
		// render
		$groupped = [0 => [], 1 => [], 2 => [], 3 => []];
		$index = 0;
		foreach ($data as $k => $v) {
			$name = '<b>' . (!empty($v['icon']) ? (\HTML::icon(['type' => $v['icon']]) . ' ') : null) . $v['name'] . '</b>';
			if (!empty($v['options'])) {
				\I18n::translateArray($v['options'], true);
				$name.= '<div class="numbers_postlogin_dashboard_content_inner">';
					$name.= \HTML::tree(['options' => $v['options'], 'icon_key' => 'icon']);
				$name.= '</div>';
			}
			$groupped[$index][] = $name;
			$index++;
			if ($index % 4 == 0) $index = 0;
		}
		$result = '';
		foreach ($groupped as $v) {
			$result.= '<div class="numbers_postlogin_dashboard_content_div">' . implode('<hr/>', $v) . '</div>';
		}
		return \HTML::segment([
			'type' => 'primary',
			'value' => $result,
			'header' => [
				'icon' => [
					'type' => 'fas fa-sitemap'
				],
				'title' => i18n(null, 'Dashboard')
			]
		]);
	}
}