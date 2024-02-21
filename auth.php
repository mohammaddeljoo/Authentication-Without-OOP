<?php
require "bootstrap/init.php";

if(isLoggedIn()){
    redirect();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $action = $_GET['action'];
    $params = $_POST;
    var_dump($_POST);
    if($action == 'register'){
        #validate: 
        #اگر دیتا ها را وارد نکنید میاد ارور میده که بیا و پرش کن
        if(empty($params['name']) || empty($params['email']) || empty($params['phone'])){
           setErrorAndRedirect('All Input Fields Reqired','auth.php?action=register');
        }
        if(!filter_var($params['email'],FILTER_VALIDATE_EMAIL)){
            setErrorAndRedirect('Please Enter Valid Email Adress.!','auth.php?action=register');

        }
        # اگر دیتا ها قبلا در جدول یوزد ثبت شده باشند ارور میده 
        if(isUserExists($params['email'],$params['phone'])){
            setErrorAndRedirect('User Exist with this data','auth.php?action=register');
        }
        #ساختن یوزر جدید
        if(createUser($params)){
            $_SESSION['email'] = $params['email'];
            redirect('auth.php?action=verify');
        }
    }

    if($action == 'verify'){
        $token = findTokenByHash($_SESSION['hash'])->token;
        if($token === $params['token']){
            $session = bin2hex(random_bytes(32));
            changeLoginSession($session , $_SESSION['email']);
            setcookie('auth',$session,time() + 1728000, '/');
            deleteTokenByHash($_SESSION['hash']);
            unset($_SESSION['hash'], $_SESSION['email']);
            redirect();

        }else{
            setErrorAndRedirect('this token is wrong','auth.php?action=verify');

        }
    }

}
// if($action == 'verify'){
//     vp("$params");
// }


if(isset($_GET['action']) and $_GET['action'] == 'verify' and !empty($_SESSION['email'])){
    #جک کنیم ببینیم این ایمیل در سشن هست یا نه
    if(!isUserExists($_SESSION['email']))
        setErrorAndRedirect('User - Not - Exist with this data','auth.php?action=login');

    if(isset($_SESSION['hash']) and isAliveToken($_SESSION['hash'])){
        sendTokenByMail($_SESSION['email'], findTokenByHash($_SESSION['hash'])->token);

    }else{
        $tokenResult = createLoginToken();
        sendTokenByMail($_SESSION['email'], $tokenResult['token']);

        $_SESSION['hash'] = $tokenResult['hash'];
    }
    include 'tpl/verify-tpl.php';
}




if(isset($_GET['action']) && $_GET['action'] == 'register'){
    include "tpl/register-tpl.php";
}else{
 include "tpl/login-tpl.php";
}