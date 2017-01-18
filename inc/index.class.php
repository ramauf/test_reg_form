<?php
error_reporting(7);
define('BASE_PATH', realpath(dirname(__FILE__).'/../'));
define('CONTROLLERS_PATH', realpath(BASE_PATH.'/inc/controllers'));
define('MODELS_PATH', realpath(BASE_PATH.'/inc/models'));
define('VIEWS_PATH', realpath(BASE_PATH.'/inc/views'));
define('IMAGES_PATH', realpath(BASE_PATH.'/images'));
class indexClass{
    private $meta = array('title' => '', 'keywords' => '', 'description' => '');
    private $nav = array('/' => 'Главная');
    function __construct($URL){
        session_start();
        spl_autoload_register(function($className){//Автоподключим модели
            if (file_exists(MODELS_PATH.'/'.$className.'.php')) require_once(MODELS_PATH.'/'.$className.'.php');
        });
        require_once(BASE_PATH.'/inc/config.php');
        require_once(BASE_PATH.'/inc/db.class.php');
        require_once(BASE_PATH.'/inc/lang.class.php');
        if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'ru';
        langClass::init($_SESSION['lang']);
        globals::$URL = $URL;
        if (!is_writable(IMAGES_PATH)) exit('Надо проставить права для записи на папку '.IMAGES_PATH);
        DB::query('SELECT NOW()');

        //---------------------------роутинг--------------------------------
        require_once(CONTROLLERS_PATH.'/Controller.php');
        if (empty($URL[0])) $controllerName = 'defaultController';
        if (preg_match('|^([a-z0-9\.]+)$|', $URL[0], $m)) if (file_exists(CONTROLLERS_PATH.'/'.$m[0].'Controller.php')) $controllerName = $m[0].'Controller';//Имя контроллера должно соответствовать шаблону а так же существовать в директории контроллеров
        if (!isset($controllerName)){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            exit('URL not found');
        }else globals::$controller = $controllerName;
        require_once(CONTROLLERS_PATH.'/'.$controllerName.'.php');
        $controller = new $controllerName();
        $method = isset($URL[1]) ? $URL[1].'Action' : 'indexAction';
        if (!method_exists($controller, $method)){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            exit('URL not found');
        }else globals::$method = $method;
        $controller->$method();
    }
}
class globals{
    public static $URL;
    public static $controller;
    public static $method;
}