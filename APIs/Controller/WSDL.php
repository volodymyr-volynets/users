<?php

namespace Numbers\Users\APIs\Controller;
class WSDL extends \Object\Controller {
	public function actionIndex() {
		$input = \Request::input();
		if (array_key_exists('wsdl', $input)) {
			$endpoint = \Application::get('mvc.full_with_host');
			$wsdl = \Numbers\Users\APIs\Helper\WSDL::generate($endpoint);
			\Layout::renderAs($wsdl, 'application/xml');
		} else {
			$soap_server = new \SoapServer(\Application::get('mvc.full_with_host') . '?wsdl');
			$soap_server->setClass('\Numbers\Users\APIs\Helper\SoapServerHendler');
			$soap_server->handle();
			exit;
		}
	}
	public function actionTest() {
		$aHTTP['http']['header'] =  "User-Agent: PHP-SOAP/5.5.11\r\n";
		$aHTTP['http']['header'].= "username: C1040001760102\r\n"."password: bcv2020\r\n";
		$context = stream_context_create($aHTTP);
		$client=new \SoapClient("http://test.test.numbers.local/Numbers/Users/APIs/Controller/WSDL?wsdl",array('trace' => 1,"stream_context" => $context));
		$result = $client->__call('NumbersUsersUsersAPIsLogin_create', ['options' => [
			'ua_apiusr_login_username' => '123',
			'ua_apiusr_login_password' => '333'
		]]);
		print_r2($result);
	}
}