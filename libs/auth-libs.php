<?php

function isUserExists($email = null, $phone = null) : bool{
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `email`= :email OR `phone`= :phone ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email'=> $email ?? '', ':phone' => $phone ?? '']);
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
#token geerate
function createLoginToken() : array {
    global $pdo;
    $hash = bin2hex(random_bytes(8));
    $token =rand(100000,999999);
    $expired_at = time() + 600;
    $sql = "INSERT INTO `tokens` (token,hash,expired_at) VALUES (:token,:hash,:expired_at);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':token' => $token,':hash' => $hash,':expired_at' => date("Y-m-d H:i:s",$expired_at)]);
    return [
        'token' => $token,
        'hash' => $hash
    ];
    
}

function isAliveToken($hash) : bool{
    $record = findTokenByHash($hash);
    if(!$record)
        return false;
    return strtotime($record->expired_at) > time() + 120;


}

function findTokenByHash($hash) : object|bool {
    global $pdo;
    $sql = 'SELECT * FROM `tokens` WHERE `hash` = :hash;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash' => $hash]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

#send token

#verify

#login