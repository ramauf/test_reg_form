<?php
class loginController extends Controller{
	public function __construct(){
		parent::__construct();
		$this->setTemplate('inner', 'loginIndex');
	}
	public function indexAction(){
			$success = !is_array($_POST['login']) * !is_array($_POST['pass']);
			if ($success){//��� ���� ���� � �������� ��������
				$login = usersModel::login($_POST['login'], $_POST['pass']);
				if ($login){
					header('Location:/');
					exit;
			$post['login'] = usersModel::clearField($_POST['login']);
		include($this->templates['main']);
	public function loginedAction(){
		$this->setTemplate('inner', 'registrationIndex');
?>