<?php
class loginController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->setTemplate('inner', 'loginIndex');
    }
    public function indexAction(){
        if (isset($_POST['login']) && isset($_POST['pass'])){
            $success = !is_array($_POST['login']) * !is_array($_POST['pass']);
            if ($success){//Переменные являются строками
                $login = usersModel::login($_POST['login'], $_POST['pass']);
                if ($login){
                    $_SESSION['users'] = $login;
                    header('Location:/');
                    exit;
                }
            }
            $post['login'] = usersModel::clearField($_POST['login']);
        }
        include($this->templates['main']);
    }
    public function loginedAction(){
        $successRegistration = true;
        $this->setTemplate('inner', 'registrationIndex');
        include($this->templates['main']);
    }
}