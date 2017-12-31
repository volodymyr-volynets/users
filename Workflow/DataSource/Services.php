<?php

namespace Numbers\Users\Workflow\DataSource;
class Services extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['ww_service_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'ww_service_name' => 'name',
		'ww_service_icon' => 'icon_class'
	];
	public $options_active =[
		'ww_service_inactive' => 0
	];
	public $column_prefix = 'ww_service_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Workflow\Model\Services';
	public $parameters = [
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
		'skip_acl' => ['name' => 'Skip ACL', 'type' => 'boolean']
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'a.ww_service_id',
			'a.ww_service_name',
			'a.ww_service_icon',
			'a.ww_service_inactive'
		]);
		// acl for not super admins
		if (!\User::get('super_admin') && empty($parameters['skip_acl'])) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				// allow existing values
				if (!empty($parameters['existing_values'])) {
					$query->where('OR', ['a.ww_service_id', '=', $parameters['existing_values']]);
				}
				// user can see roles he can assign
				$query->where('OR', function (& $query) {
					$organizations = \User::get('organizations');
					if (!empty($organizations)) {
						$query->where('AND', function (& $query) use ($organizations) {
							$query = \Numbers\Users\Workflow\Model\Service\Organizations::queryBuilderStatic(['alias' => 'inner_o'])->select();
							$query->columns(1);
							$query->where('AND', ['inner_o.ww_servorg_service_id', '=', 'a.ww_service_id', true]);
							$query->where('AND', ['inner_o.ww_servorg_organization_id', 'IN', $organizations, false]);
							$query->where('AND', ['inner_o.ww_servorg_inactive', '=', 0]);
						}, true);
					} else {
						$query->where('AND', 'FALSE');
					}
					$query->where('AND', function (& $query) {
						$query->where('OR', ['a.ww_service_all_roles', '=', 1]);
						$roles = \User::get('role_ids');
						if (!empty($roles)) {
							$query->where('OR', function (& $query) use ($roles) {
								$query = \Numbers\Users\Workflow\Model\Service\Roles::queryBuilderStatic(['alias' => 'inner_r'])->select();
								$query->columns(1);
								$query->where('AND', ['inner_r.ww_servrol_service_id', '=', 'a.ww_service_id', true]);
								$query->where('AND', ['inner_r.ww_servrol_role_id', 'IN', $roles, false]);
								$query->where('AND', ['inner_r.ww_servrol_inactive', '=', 0]);
							}, true);
						} else {
							$query->where('AND', 'FALSE');
						}
					});
				});
			});
		}
	}
}