<?php
class logoutController{
    public function indexAction(){
        unset($_SESSION['users']);
        header('Location:/');
        exit;
    }
}