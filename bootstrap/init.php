<?php

require "config.php";
require "constant.php";

try{
$pdo = new PDO("mysql:dbname=$dataBase_config->dbname;host=$dataBase_config->host",$dataBase_config->user,$dataBase_config->password);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

require "../libs/helpers.php";