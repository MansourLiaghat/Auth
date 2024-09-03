<?php

session_start();
require_once 'constants.php';
require_once 'config.php';
require_once BASE_PATH . 'libs/helpers_func.php';
require_once BASE_PATH . 'libs/auth_func.php';


# DataBase Connection
try {
    $pdo = new PDO("mysql:host=$dbConfig->host;dbname={$dbConfig->dbName};charset={$dbConfig->charset}",$dbConfig->userName,$dbConfig->password);
} catch (PDOException $error) {
    echo 'not ok' . $error ;
}
