<?php
class Controller{	protected $templates = array('main' => 'mainIndex', 'inner' => 'defaultIndex', 'left' => 'leftrowIndex');
	protected function __construct(){		if (isset($_GET['lang'])){			if (in_array($_GET['lang'], array('ru', 'en'))) $_SESSION['lang'] = $_GET['lang'];			$url = explode('?', $_SERVER['REQUEST_URI']);
			header('Location:'.$url[0]);
			exit;		}
		foreach ($this->templates as $ind => $val) $this->setTemplate($ind, $val);	}
	protected function setTemplate($name, $value){
		$this->templates[$name] = VIEWS_PATH.'/'.$value.'.php';
	}}