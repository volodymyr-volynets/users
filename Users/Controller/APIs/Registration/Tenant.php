<?php

namespace Numbers\Users\Users\Controller\APIs\Registration;
class Tenant extends \Object\Controller\API {
	public function actionIndex() {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$crypt = new \Crypt();
			$token_result = $crypt->tokenValidate($this->api_input['token'] ?? '', ['skip_time_validation' => true]);
			if ($token_result === false) {
				$result['error'][] = \Object\Content\Messages::TOKEN_EXPIRED;
				break;
			}
			// use new tenant
			$tenant_id = (int) $token_result['id'];
			\Tenant::setOverrideTenantId($tenant_id);
			$tenant_model = new \Numbers\Tenants\Tenants\Model\Tenants();
			$tenant_model->db_object->begin();
			// step 1 see if tenant exists
			$existing_tenant = \Numbers\Tenants\Tenants\Model\Tenants::getStatic([
				'where' => [
					'tm_tenant_code' => strtoupper($token_result['token'])
				],
				'pk' => null,
				'single_row' => true
			]);
			// step 2 create tenant if not exists
			if (empty($existing_tenant)) {
				$tenant_result = $tenant_model->collection()->merge([
					'tm_tenant_id' => $tenant_id,
					'tm_tenant_code' => $this->api_input['registration']['um_regten_tenant_code'],
					'tm_tenant_name' => $this->api_input['registration']['um_regten_tenant_name'],
					'tm_tenant_email' => $this->api_input['registration']['um_regten_tenant_email'],
					'tm_tenant_phone' => $this->api_input['registration']['um_regten_tenant_phone'],
					'tm_tenant_tm_database_code' => $this->api_input['tenant']['tm_tenant_tm_database_codes'],
				]);
				if (!$tenant_result['success']) {
					$result['error'] = $tenant_result['error'];
					$tenant_model->db_object->rollback();
					break;
				}
			}
			// step 3 create organization
			$organization_result = \Numbers\Users\Organizations\Model\Organizations::collectionStatic()->merge([
				'on_organization_code' => $this->api_input['registration']['um_regten_organization_code'],
				'on_organization_name' => $this->api_input['registration']['um_regten_organization_name'],
			]);
			if (!$organization_result['success']) {
				$result['error'] = $organization_result['error'];
				$tenant_model->db_object->rollback();
				break;
			}
			$organization_id = $organization_result['new_serials']['on_organization_id'];
			// step 4 import tenant related settings
			$activation_model = new \Numbers\Users\Users\Data\Activation\Tenant();
			$activation_result = $activation_model->process();
			if (!$activation_result['success']) {
				$result['error'] = $activation_result['error'];
				$tenant_model->db_object->rollback();
				break;
			}
			// step 5 create a user
			$crypt = new \Crypt();
			$user_result = \Numbers\Users\Users\Model\Users::collectionStatic()->merge([
				'um_user_code' => null,
				'um_user_type_id' => 10,
				'um_user_name' => $this->api_input['registration']['um_regten_user_first_name'] . ' ' . $this->api_input['registration']['um_regten_user_last_name'],
				'um_user_first_name' => $this->api_input['registration']['um_regten_user_first_name'],
				'um_user_last_name' => $this->api_input['registration']['um_regten_user_last_name'],
				'um_user_email' => $this->api_input['registration']['um_regten_user_email'],
				'um_user_phone' => $this->api_input['registration']['um_regten_user_phone'] ?? null,
				'um_user_cell' => $this->api_input['registration']['um_regten_user_cell'] ?? null,
				'um_user_login_enabled' => 1,
				'um_user_login_username' => $this->api_input['registration']['um_regten_user_login_username'] ?? null,
				'um_user_login_password' => $crypt->passwordHash($this->api_input['user']['password']),
				'um_user_login_date_password_last_set' => \Format::now('date'),
			]);
			if (!$user_result['success']) {
				$result['error'] = $user_result['error'];
				$tenant_model->db_object->rollback();
				break;
			}
			$user_id = $user_result['new_serials']['um_user_id'];
			// step 6 assign user to organization
			$assignment_result = \Numbers\Users\Users\Model\User\Organizations::collectionStatic()->merge([
				'um_usrorg_user_id' => $user_id,
				'um_usrorg_organization_id' => $organization_id,
				'um_usrorg_primary' => 1
			]);
			if (!$assignment_result['success']) {
				$result['error'] = $assignment_result['error'];
				$tenant_model->db_object->rollback();
				break;
			}
			// step 7 provision role to user
			$assignment_result = \Numbers\Users\Users\Model\User\Roles::collectionStatic()->merge([
				'um_usrrol_user_id' => $user_id,
				'um_usrrol_role_id' => \Numbers\Users\Users\Model\Roles::getByColumnStatic('um_role_code', 'SA', 'um_role_id')
			]);
			if (!$assignment_result['success']) {
				$result['error'] = $assignment_result['error'];
				$tenant_model->db_object->rollback();
				break;
			}
			// step 8 activate modules
			$main_modules = ['SM', 'AN', 'TM', 'ON', 'CM', 'IN', 'UM', 'CY', 'NS', 'DT', 'TS'];
			if (!empty($this->api_input['registration']['um_regten_as_plngrp_modules'])) {
				$extra_modules = explode(',', $this->api_input['registration']['um_regten_as_plngrp_modules']);
				$main_modules = array_unique(array_merge($main_modules, $extra_modules));
			}
			foreach ($main_modules as $v) {
				$module_activation_result = \Numbers\Tenants\Tenants\Model\Activation::activateModule($v, null);
				if (!$module_activation_result['success']) {
					$result['error'] = $module_activation_result['error'];
					$tenant_model->db_object->rollback();
					goto finish;
				}
			}
			$tenant_model->db_object->commit();
			$result['success'] = true;
			// use old tenant
			\Tenant::setOverrideTenantId(null);
		} while(0);
finish:
		$this->api_content_type = 'application/json';
		$this->handleOutput($result);
	}
	public function actionGetStructure() {
		return '';
	}
}