<?php
session_start();
date_default_timezone_set('Asia/Tehran');
require "constant.php";
require BASE_PATH . "vendor/autoload.php";
require BASE_PATH . "bootstrap/config.php";
require BASE_PATH . "libs/helpers.php";
require BASE_PATH . "libs/auth-libs.php";
require "mail.php";

try{
$pdo = new PDO("mysql:dbname=$dataBase_config->dbname;host=$dataBase_config->host",$dataBase_config->user,$dataBase_config->password);
}
catch(PDOException $e) {
    echo $e->getMessage();
}


