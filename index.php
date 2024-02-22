<?php
include "bootstrap/init.php";

if(!isLoggedIn()){
    redirect('auth.php?action=login');
}

$userData =getAuthenticateBySession($_COOKIE['auth']);
if(isset($_GET['action']) and $_GET['action'] == 'logout')
    logout($userData->email);

include "tpl/index-tpl.php";
?>
