<?php
include "bootstrap/init.php";

if(!isLoggedIn()){
    redirect('auth.php?action=login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.Deljoo auth</title>
</head>
<body>
    <?= "from index";?>
   
</body>
</html>