<?php 


function assets(string $path): string{

    return site_url('assets/' . $path);

}
function site_url($url = '')
{
    return BASE_URL .  $url;
}

function redirect($target){
    header('Location:' . $target);
    die();
}

function setErrorAndRedirect(string $message , string $target) : void {
    $_SESSION['error'] = $message;
    redirect( site_url($target));
}

function vp($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}