<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
require_once("Config/Config.php");
require_once("Helpers/Helpers.php");

$url = !empty($_GET['url']) ? $_GET['url'] : 'Inicio/index';
$arrUrl = explode("/", $url);

$controller = $arrUrl[0];
$method = isset($arrUrl[1]) && $arrUrl[1] != "" ? $arrUrl[1] : 'index';

$params = "";

if (!empty($arrUrl[2])) {
    for ($i = 2; $i < count($arrUrl); $i++) {
        $params .= $arrUrl[$i] . ',';
    }
    $params = rtrim($params, ',');
}

require_once("Libraries/Core/Autoload.php");
require_once("Libraries/Core/Load.php");
?>
