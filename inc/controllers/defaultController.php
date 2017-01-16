<?php
class defaultController extends Controller{
	public function __construct(){
		$this->setTemplate('inner', 'defaultIndex');
	public function indexAction(){
			$success = true;
			$post = array();
			foreach ($fields as $field){
				}else{
						$success *= true;
						$post[$field] = usersModel::clearField($_POST[$field]);
						$success = false;
					}
				}
			if ($success){//��� ���� ���� � �������� ��������
				$status = array();
				$status['username'] *= strlen($_POST['username']) >= 3 && strlen($_POST['username']) <= 20;
				$status['email'] = !usersModel::getUser('email', $_POST['email']);
				$status['email'] *= $_POST['email'] == filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
				$status['pass'] = strlen($_POST['pass']) >= 3 && strlen($_POST['pass']) <= 20;
				$status['pass2'] = $status['pass']*($_POST['pass'] == $_POST['pass2']);
				$status['firstName'] = !empty($_POST['firstName']);
				$status['lastName'] = !empty($_POST['lastName']);
				$status['status'] = !empty($_POST['status']);
				foreach ($status as $val) $success *= $val;
			if ($success){//��� �������� ������ �������
				if (!empty($_FILES['file']['tmp_name'])){
					usersModel::updateUser($users_id, $update);
				}
				$_SESSION['users'] = usersModel::login($_POST['email'], $_POST['pass']);
				header('Location:/default/registered');
				exit;
		if (!isset($_SESSION['users'])){
			$this->setTemplate('inner', 'registrationIndex');
		}else{
		include($this->templates['main']);
	public function registeredAction(){
		$this->setTemplate('inner', 'registrationIndex');
?>