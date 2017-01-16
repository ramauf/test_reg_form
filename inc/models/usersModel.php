<?php
class usersModel{	public static $userTypes = array(1 => 'Работодатель', 2 => 'Соискатель');
	public static function getUser($field, $value){
		if (!in_array($field, array('id', 'email', 'username'))) exit('Error field');
		$result = DB::query('SELECT * FROM `users` WHERE `'.$field.'` = "'.DB::escape($value).'"');
		if (empty($result)) return false;
		//$result[0]['statusName'] = self::$userTypes[$result[0]['status']];
		return $result[0];
	}
	public static function login($login, $pass){
		$result = DB::query('SELECT * FROM `users` WHERE (`email` = "'.DB::escape($login).'" OR `username` = "'.DB::escape($login).'") AND `pass` = "'.md5($pass).'"');
		if (empty($result)) return false;
		//$result[0]['statusName'] = self::$userTypes[$result[0]['status']];
		return $result[0];
	}
	public static function clearField($str){		return str_replace(array('"', "'"), '', strip_tags($str));	}
	public static function addUser($data){		DB::query('INSERT INTO `users` (
		`firstName`,
		`lastName`,
		`email`,
		`phone`,
		`username`,
		`status`,
		`pass`,
		`time`)
		VALUES (
		"'.DB::escape($data['firstName']).'",
		"'.DB::escape($data['lastName']).'",
		"'.DB::escape($data['email']).'",
		"'.DB::escape($data['phone']).'",
		"'.DB::escape($data['username']).'",
		"'.DB::escape($data['status']).'",
		"'.md5($data['pass']).'",
		NOW())');
		return DB::getInsId();	}
	public static function updateUser($id, $data){		foreach ($data as $ind => $val) $str[] = '`'.$ind.'` = "'.DB::escape($val).'"';		DB::query('UPDATE `users` SET '.implode(',', $str).' WHERE `id` = "'.$id.'"');
	}}