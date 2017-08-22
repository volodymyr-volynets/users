<?php

namespace Numbers\Users\Users\Controller\Logout;
class Quick extends \Object\Controller {
	public function actionIndex() {
		\Numbers\Users\Users\Model\User\Authorize::signOut();
		\Request::redirect('/Numbers/Users/Users/Controller/Logout/Confirmed');
	}
}