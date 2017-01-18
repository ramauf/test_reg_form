<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = explode('/', trim($url[0], '/'));
if (!preg_match('|^[a-z0-9\.\-\_]+$|i', $_SERVER['HTTP_HOST'])){
    exit('IP SAVED');
}

if (!preg_match('|^[a-z0-9_\.\?\&\=/\-\%]+$|i', $_SERVER['REQUEST_URI'])){
    exit('IP SAVED');
}
require_once('inc/index.class.php');
new indexClass($url);