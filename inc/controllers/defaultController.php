<?php
class defaultController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->setTemplate('inner', 'defaultIndex');
    }
    public function indexAction(){
        if (isset($_POST['username'])){
            $fields = array('username', 'email', 'pass', 'pass2', 'firstName', 'lastName', 'status', 'phone');
            $success = true;
            $post = array();
            foreach ($fields as $field){
                if (!isset($_POST[$field])){
                    $success = false;
                }else{
                    if (!is_array($_POST[$field])){
                        $_POST[$field] = trim($_POST[$field]);
                        $success *= true;
                        $post[$field] = usersModel::clearField($_POST[$field]);
                    }else{
                        $success = false;
                    }
                }
            }
            if ($success){//Все поля заданы и являются строками
                $status = array();
                $status['username'] = !usersModel::getUser('username', $_POST['username']);
                $status['username'] *= strlen($_POST['username']) >= 3 && strlen($_POST['username']) <= 20;
                $status['email'] = !usersModel::getUser('email', $_POST['email']);
                $status['email'] *= $_POST['email'] == filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $status['pass'] = strlen($_POST['pass']) >= 3 && strlen($_POST['pass']) <= 20;
                $status['pass2'] = $status['pass']*($_POST['pass'] == $_POST['pass2']);
                $status['firstName'] = !empty($_POST['firstName']);
                $status['lastName'] = !empty($_POST['lastName']);
                $status['status'] = !empty($_POST['status']);
                foreach ($status as $val) $success *= $val;
            }
            if ($success){//Все поля корректно заполнены
                $users_id = usersModel::addUser($_POST);
                if (!empty($_FILES['file']['tmp_name'])){
                    $update = array('avatar' => imagesModel::upload($_FILES['file']['tmp_name'], IMAGES_PATH.'/avatar_'.$users_id));
                    usersModel::updateUser($users_id, $update);
                }
                $_SESSION['users'] = usersModel::login($_POST['email'], $_POST['pass']);
                header('Location:/default/registered');
                exit;
            }else{
                $failRegistration = true;
            }
        }
        if (!isset($_SESSION['users'])){
            $this->setTemplate('inner', 'registrationIndex');
        }else{
            $this->setTemplate('main', 'main2Index');
        }
        include($this->templates['main']);
    }
    public function registeredAction(){
        $successRegistration = true;
        $this->setTemplate('inner', 'registrationIndex');
        include($this->templates['main']);
    }
}