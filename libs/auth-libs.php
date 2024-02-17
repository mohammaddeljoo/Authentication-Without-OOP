<?php

function isUserExists($email, $phone) : bool{
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `email`= :email OR `phone`= :phone ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email'=> $email, ':phone' => $phone]);
    $record = $stmt->fetch(PDO::FETCH_OBJ);
    return $record ? true : false ;

}

function createUser(array $userdata):bool {
    global $pdo;
    $sql = "INSERT INTO `users` (name,email,phone) VALUES (:name,:email,:phone);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name'=>$userdata['name'],':email'=>$userdata['email'],':phone'=>$userdata['phone']]);
    return $stmt->rowCount() ? true : false;
    
}