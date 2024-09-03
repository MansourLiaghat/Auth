<?php

function createUser(array $userData) : bool {
    global $pdo ;
    $sql = "INSERT INTO `users` (fullName,phone,email) VALUES (:fullName,:phone,:email);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':fullName'=>$userData['name'],':phone'=>$userData['phone'],':email'=>$userData['email']]);
    return $stmt->rowCount() ? true : false ;
}


function isUserExist(string $phone , string $email) : bool {
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `phone` = :phone OR `email` = :email ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':phone'=> $phone , ':email'=> $email]);
    $record = $stmt->fetch(PDO::FETCH_OBJ);
    return $record ? true : false ;
}

