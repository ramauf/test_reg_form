<?php
class Controller{
	protected function __construct(){
			header('Location:'.$url[0]);
			exit;
		foreach ($this->templates as $ind => $val) $this->setTemplate($ind, $val);
	protected function setTemplate($name, $value){
		$this->templates[$name] = VIEWS_PATH.'/'.$value.'.php';
	}