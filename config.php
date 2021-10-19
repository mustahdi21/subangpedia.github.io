<?php
//************************************************
//
//************************************************

date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL);

$maintenance = 0; // Maintenance? 1 = ya 0 = tidak

$settingURL = 'https://subangpedia.xyz/';
// $settingURL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
// $settingURL .= "://".$_SERVER['HTTP_HOST'];
// $settingURL .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

if($maintenance == 1) {
    die("Site under Maintenance.");
}
// database
$config['db'] = array(
	'host' => 'localhost',
	'name' => 'subangp3_mustahdismm',  //name dabatase
	'username' => 'subangp3_mustahdismm', //username yourtabase
	'password' => 'mustahdi2108' //password your database
);

$conn = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
if(!$conn) {
	die("Koneksi Gagal : ".mysqli_connect_error());
	}
$config['web'] = array(
	'url' => $settingURL
);
// date & time
$date = date("Y-m-d");
$time = date("H:i:s");
require("lib/function.php");
require("lib/setting.php");
require("lib/JsonGetLayanan.php");
$getOperator = new JsonGetLayanan();
//$getOperator->setPathJson("../Jsn/jsn.json");

?>