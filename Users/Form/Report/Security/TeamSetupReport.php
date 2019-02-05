<?php

namespace Numbers\Users\Users\Form\Report\Security;
class TeamSetupReport extends \Object\Form\Wrapper\Report {
	public $form_link = 'um_team_setup_report';
	public $module_code = 'UM';
	public $title = 'U/M Security Team Setup Report';
	public $options = [
		'segment' => self::SEGMENT_REPORT,
		'actions' => [
			'refresh' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		self::REPORT_BUTTONS => ['default_row_type' => 'grid', 'order' => 2000, 'class' => 'numbers_form_filter_sort_container'],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'um_team_id' => [
				'um_team_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Team #', 'domain' => 'team_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_team_id;>='],
				'um_team_id2' => ['order' => 2, 'label_name' => 'Team #', 'domain' => 'team_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_team_id;<='],
				'um_team_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_team_inactive;=']
			],
			'include_users' => [
				'include_users' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Include Users', 'type' => 'boolean']
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::REPORT_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::REPORT_BUTTONS => self::REPORT_BUTTONS_DATA
	];
	const REPORT_SORT_OPTIONS = [
		'um_team_id' => ['name' => 'Role #'],
		'um_team_name' => ['name' => 'Name'],
	];
	public $report_default_sort = [
		'um_team_id' => SORT_ASC
	];
	public function buildReport(& $form) {
		// create new report
		$report = new \Object\Form\Builder\Report();
		$report->addReport(DEF, $form);
		// add header
		$report->addHeader(DEF, 'row1', [
			'um_team_id' => ['label_name' => 'Role #', 'percent' => 10],
			'um_team_name' => ['label_name' => 'Role Name', 'percent' => 50],
			'um_team_global' => ['label_name' => 'Global', 'percent' => 15, 'data_align' => 'center'],
			'um_team_super_admin' => ['label_name' => 'Super Admin', 'percent' => 15, 'data_align' => 'center'],
			'um_team_inactive' => ['label_name' => 'Active', 'percent' => 10, 'data_align' => 'center'],
		]);
		$report->addHeader(DEF, 'row2', [
			'blank' => ['label_name' => ' ', 'percent' => 10],
			'um_team_code' => ['label_name' => 'Role Code', 'percent' => 20],
			'um_team_type_id' => ['label_name' => 'Type', 'percent' => 20],
			'um_team_department_id' => ['label_name' => 'Department', 'percent' => 50]
		]);
		$report->addHeader(DEF, 'separator', [
			'blank' => ['label_name' => ' ', 'percent' => 100]
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'organizations', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Organizations:', 'percent' => 15],
			'organization_id' => ['label_name' => 'Organization #', 'percent' => 25],
			'organization_name' => ['label_name' => 'Organization Name', 'percent' => 50],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'inherits', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Inherited Roles:', 'percent' => 20],
			'team_id' => ['label_name' => 'Role #', 'percent' => 10],
			'role_name' => ['label_name' => 'Role Name', 'percent' => 60],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'permissions', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Permissions:', 'percent' => 15],
			'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
			'resource_name' => ['label_name' => 'Resource Name', 'percent' => 25],
			'action_name' => ['label_name' => 'Action Name', 'percent' => 25],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'subresources', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Subresources:', 'percent' => 15],
			'module_name' => ['label_name' => 'Module Name', 'percent' => 20],
			'resource_name' => ['label_name' => 'Resource Name', 'percent' => 20],
			'subresource_name' => ['label_name' => 'Subresource Name', 'percent' => 20],
			'action_name' => ['label_name' => 'Action Name', 'percent' => 15],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'notifications', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Notifications:', 'percent' => 15],
			'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
			'notification_name' => ['label_name' => 'Notification Name', 'percent' => 50],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'features', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Features:', 'percent' => 15],
			'module_name' => ['label_name' => 'Module Name', 'percent' => 25],
			'notification_name' => ['label_name' => 'Feature Name', 'percent' => 50],
		],
		[
			'skip_rendering' => true
		]);
		$report->addHeader(DEF, 'users', [
			'blank' => ['label_name' => '', 'percent' => 10],
			'name' => ['label_name' => 'Users:', 'percent' => 15],
			'user_id' => ['label_name' => 'User #', 'percent' => 15],
			'user_name' => ['label_name' => 'User Name', 'percent' => 25],
			'granted_on' => ['label_name' => 'Granted On', 'percent' => 10],
			'granted_by' => ['label_name' => 'Granted By', 'percent' => 25],
		],
		[
			'skip_rendering' => true
		]);
		// query the data
		$query = \Numbers\Users\Users\Model\Teams::queryBuilderStatic()->select();
		$query->columns([
			'um_team_id' => 'a.um_team_id',
			'um_team_name' => 'a.um_team_name',
			'um_team_inactive' => 'a.um_team_inactive',
			'organizations' => 'b.organizations',
			'permissions' => 'd.permissions',
			'notifications' => 'e.notifications',
			'subresources' => 'f.subresources',
			'features' => 'g.features'
		]);
		if (!empty($form->values['include_users'])) {
			$query->columns([
				'users' => 'u.users'
			]);
		}
		// join organizations
		$query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_temorg_team_id',
				'organizations' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_temorg_organization_id)", 'delimiter' => ';;'])
			]);
			// join
			$query->join('INNER', new \Numbers\Users\Organizations\Model\Organizations(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_temorg_organization_id', '=', 'inner_b.on_organization_id', true], false]
			]);
			$query->groupby(['inner_a.um_temorg_team_id']);
			$query->where('AND', ['inner_a.um_temorg_inactive', '=', 0]);
			$query->where('AND', ['inner_b.on_organization_inactive', '=', 0]);
		}, 'b', 'ON', [
			['AND', ['a.um_team_id', '=', 'b.um_temorg_team_id', true], false]
		]);
		// join permissions
		$query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Permission\Actions::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_temperaction_team_id',
				'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_temperaction_module_id, inner_a.um_temperaction_resource_id, inner_a.um_temperaction_action_id)", 'delimiter' => ';;'])
			]);
			$query->join('INNER', new \Numbers\Users\Users\Model\Team\Permissions(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_temperaction_team_id', '=', 'inner_b.um_temperm_team_id', true], false],
				['AND', ['inner_a.um_temperaction_module_id', '=', 'inner_b.um_temperm_module_id', true], false],
				['AND', ['inner_a.um_temperaction_resource_id', '=', 'inner_b.um_temperm_resource_id', true], false]
			]);
			$query->groupby(['inner_a.um_temperaction_team_id']);
			$query->where('AND', ['inner_a.um_temperaction_inactive', '=', 0]);
			$query->where('AND', ['inner_b.um_temperm_inactive', '=', 0]);
		}, 'd', 'ON', [
			['AND', ['a.um_team_id', '=', 'd.um_temperaction_team_id', true], false]
		]);
		// join notifications
		$query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Notifications::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_temnoti_team_id',
				'notifications' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('**', inner_a.um_temnoti_module_id, inner_a.um_temnoti_feature_code)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_a.um_temnoti_team_id']);
			$query->where('AND', ['inner_a.um_temnoti_inactive', '=', 0]);
		}, 'e', 'ON', [
			['AND', ['a.um_team_id', '=', 'e.um_temnoti_team_id', true], false]
		]);
		// join features
		$query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Features::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_temfeature_team_id',
				'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('**', inner_a.um_temfeature_module_id, inner_a.um_temfeature_feature_code)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_a.um_temfeature_team_id']);
			$query->where('AND', ['inner_a.um_temfeature_inactive', '=', 0]);
		}, 'g', 'ON', [
			['AND', ['a.um_team_id', '=', 'g.um_temfeature_team_id', true], false]
		]);
		// join subresources
		$query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Permission\Subresources::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.um_temsubres_team_id',
				'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_temsubres_module_id, inner_a.um_temsubres_resource_id, inner_a.um_temsubres_action_id, inner_a.um_temsubres_rsrsubres_id)", 'delimiter' => ';;'])
			]);
			$query->join('INNER', new \Numbers\Users\Users\Model\Team\Permissions(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_temsubres_team_id', '=', 'inner_b.um_temperm_team_id', true], false],
				['AND', ['inner_a.um_temsubres_module_id', '=', 'inner_b.um_temperm_module_id', true], false],
				['AND', ['inner_a.um_temsubres_resource_id', '=', 'inner_b.um_temperm_resource_id', true], false]
			]);
			$query->groupby(['inner_a.um_temsubres_team_id']);
			$query->where('AND', ['inner_a.um_temsubres_inactive', '=', 0]);
			$query->where('AND', ['inner_b.um_temperm_inactive', '=', 0]);
		}, 'f', 'ON', [
			['AND', ['a.um_team_id', '=', 'f.um_temsubres_team_id', true], false]
		]);
		// include users
		if (!empty($form->values['include_users'])) {
			$query->join('LEFT', function (& $query) {
				$query = \Numbers\Users\Users\Model\Team\Map::queryBuilderStatic(['alias' => 'inner_a'])->select();
				$query->columns([
					'inner_a.um_usrtmmap_team_id',
					'users' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_usrtmmap_user_id, inner_a.um_usrtmmap_inserted_timestamp, COALESCE(inner_a.um_usrtmmap_inserted_user_id, 0))", 'delimiter' => ';;'])
				]);
				// join
				$query->join('INNER', new \Numbers\Users\Users\Model\Users(), 'inner_b', 'ON', [
					['AND', ['inner_a.um_usrtmmap_user_id', '=', 'inner_b.um_user_id', true], false]
				]);
				$query->groupby(['inner_a.um_usrtmmap_team_id']);
				$query->where('AND', ['inner_a.um_usrtmmap_inactive', '=', 0]);
				$query->where('AND', ['inner_b.um_user_inactive', '=', 0]);
			}, 'u', 'ON', [
				['AND', ['a.um_team_id', '=', 'u.um_usrtmmap_team_id', true], false]
			]);
		}
		$form->processReportQueryFilter($query);
		$form->processReportQueryOrderBy($query);
		$data = $query->query(null, ['cache' => false]);
		// preload models
		$organizations = \Numbers\Users\Organizations\Model\Organizations::optionsStatic(['i18n' => true]);
		$modules = \Numbers\Tenants\Tenants\Model\Modules::optionsStatic(['i18n' => true]);
		$resources = \Numbers\Backend\System\Modules\Model\Resources::optionsStatic(['i18n' => true]);
		$actions = \Numbers\Backend\System\Modules\Model\Resource\Actions::optionsStatic(['i18n' => true]);
		$features = \Numbers\Backend\System\Modules\Model\Module\Features::optionsStatic(['i18n' => true]);
		$subresources = \Numbers\Backend\System\Modules\Model\Resource\Subresources::optionsStatic(['i18n' => true]);
		$users = \Numbers\Users\Users\Model\Users::optionsStatic(['i18n' => true, 'skip_acl' => true]);
		// add data to report
		$counter = 1;
		foreach ($data['rows'] as $k => $v) {
			// replaces
			$team_id = $v['um_team_id'];
			$v['um_team_id'] = ['value' => \Format::id($v['um_team_id']), 'url' => \Request::buildURL('/Numbers/Users/Users/Controller/Roles/_Edit', ['um_team_id' => $v['um_team_id']])];
			$v['um_team_inactive'] = \Object\Content\Messages::active($v['um_team_inactive'], true);
			// add data
			$even = $counter % 2 ? ODD : EVEN;
			$report->addData(DEF, 'row1', $even, $v);
			$report->addData(DEF, 'row2', $even, $v);
			// add organizations
			if (!empty($v['organizations'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'organizations', $even, $report->getHeaderForRender(DEF, 'organizations'));
				$temp = explode(';;', $v['organizations']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$report->addData(DEF, 'organizations', $even, [
						'organization_id' => $v0,
						'organization_name' => $organizations[(int) $v0]['name']
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			// permissions
			if (!empty($v['permissions'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'permissions', $even, $report->getHeaderForRender(DEF, 'permissions'));
				$temp = explode(';;', $v['permissions']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$temp2 = explode('::', $v0);
					$report->addData(DEF, 'permissions', $even, [
						'module_name' => $modules[(int) $temp2[0]]['name'],
						'resource_name' => $resources[(int) $temp2[1]]['name'],
						'action_name' => $actions[(int) $temp2[2]]['name']
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			// subresources
			if (!empty($v['subresources'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'subresources', $even, $report->getHeaderForRender(DEF, 'subresources'));
				$temp = explode(';;', $v['subresources']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$temp2 = explode('::', $v0);
					$report->addData(DEF, 'subresources', $even, [
						'module_name' => $modules[(int) $temp2[0]]['name'],
						'resource_name' => $resources[(int) $temp2[1]]['name'],
						'subresource_name' => $subresources[(int) $temp2[3]]['name'],
						'action_name' => $actions[(int) $temp2[2]]['name']
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			// notifications
			if (!empty($v['notifications'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'notifications', $even, $report->getHeaderForRender(DEF, 'notifications'));
				$temp = explode(';;', $v['notifications']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$temp2 = explode('**', $v0);
					$report->addData(DEF, 'notifications', $even, [
						'module_name' => $modules[(int) $temp2[0]]['name'],
						'notification_name' => $features[$temp2[1]]['name']
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			// features
			if (!empty($v['features'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'features', $even, $report->getHeaderForRender(DEF, 'features'));
				$temp = explode(';;', $v['features']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$temp2 = explode('**', $v0);
					$report->addData(DEF, 'features', $even, [
						'module_name' => $modules[(int) $temp2[0]]['name'],
						'notification_name' => $features[$temp2[1]]['name']
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			// users
			if (!empty($v['users']) && !empty($form->values['include_users'])) {
				$report->addData(DEF, 'separator', $even, ['blank' => ' ']);
				$report->addData(DEF, 'users', $even, $report->getHeaderForRender(DEF, 'users'));
				$temp = explode(';;', $v['users']);
				$counter2 = $even + 1;
				foreach ($temp as $v0) {
					$temp2 = explode('::', $v0);
					$report->addData(DEF, 'users', $even, [
						'user_id' => $temp2[0],
						'user_name' => $users[(int) $temp2[0]]['name'],
						'granted_on' => \Format::date($temp2[1]),
						'granted_by' => !empty($temp2[2]) ? $users[(int) $temp2[2]]['name'] : ' ',
					], [
						'cell_even' => $counter2 % 2 ? ODD : EVEN
					]);
					$counter2++;
				}
			}
			$counter++;
		}
		// add number of rows
		$report->addNumberOfRows(DEF, count($data['rows']));
		// free up memory
		unset($data);
		// we must return report object
		return $report;
	}
}