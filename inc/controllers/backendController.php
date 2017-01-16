<?php
class backendController{
	public function registrationAction(){
		exit(json_encode(!usersModel::getUser(key($_POST), current($_POST))));	}}
?>