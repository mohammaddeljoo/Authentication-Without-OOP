<?php
session_start();
require "constant.php";

require BASE_PATH . "bootstrap/config.php";
require BASE_PATH . "libs/helpers.php";
require BASE_PATH . "libs/auth-libs.php";

try{
$pdo = new PDO("mysql:dbname=$dataBase_config->dbname;host=$dataBase_config->host",$dataBase_config->user,$dataBase_config->password);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
