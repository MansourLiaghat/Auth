<?php

function userCreate(array $userData) : bool {
    global $pdo ;
    $sql = "INSERT INTO `users` (fullName,phone,email) VALUES (:fullName,:phone,:email);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':fullName'=>$userData['name'],':phone'=>$userData['phone'],':email'=>$userData['email']]);
    return $stmt->rowCount() ? true : false ;
}


function isUserExist(string $phone = null , string $email = null) : bool|object {
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `phone` = :phone OR `email` = :email ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':phone'=> $phone ?? '' , ':email'=> $email ?? '']);
    $record = $stmt->fetch(PDO::FETCH_OBJ);
    return $record ? true : false ;
}

function createTokenLogin(): array  {
    global $pdo;
    $token = rand(100000,999999);
    $hash = bin2hex(random_bytes(16));
    $expired_at = time()+ 600;
    $sql = "INSERT INTO `tokens` (`token`,`hash`,`expired_at`) VALUES (:token,:hash,:expired_at);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':token'=>$token , ':hash'=>$hash , ':expired_at'=>date('Y-m-d H:i:s' , $expired_at)]);
    return[
        'hash'=>$hash,
        'token'=>$token
    ];
}


function findTokenByHash(string $hash) : object|bool {
    global $pdo;
    $sql = "SELECT * FROM `tokens` WHERE `hash` = :hash;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash'=>$hash]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function isAliveToken(string $hash) : bool {
    $record=findTokenByHash($hash);
    if(!$record){
        return false;
    }else{
        return strtotime($record->expired_at) > time()+120 ;
    }
}

function sendTokenByEmail(string $email , string|int $token) : bool {
    global $mail ; 
    $mail->addAddress($email);          
    $mail->Subject = 'verify token';
    $mail->Body    = 'your token is : ' . $token;
    return $mail->send();
}

function changeLoginSession(string $session , string $email) : bool {
    global $pdo ;
    $sql = "UPDATE `users` SET `session` = :session WHERE `email` = :email ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session'=> $session , ':email' => $email]);
    return $stmt->rowCount() ? true : false ;
}

function deleteTokenByHash(string $hash) : bool {
    global $pdo ;
    $sql = "DELETE FROM `tokens` WHERE `hash` = :hash;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash'=>$hash]);
    return $stmt->rowCount() ? true : false ;
}

function getAuthenticateUserBySession(string $session) : bool|object {
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `session` = :session;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session'=>$session]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function isLoginUser() : bool {
    if(empty($_COOKIE['auth']))
        return false;
        return getAuthenticateUserBySession($_COOKIE['auth']) ? true : false ;
}