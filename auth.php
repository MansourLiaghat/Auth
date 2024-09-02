<?php

require_once './bootstrap/init.php';


## Request Method Post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    # Action Register
    if(isset($_GET['action']) && $_GET['action'] == 'register'){
        if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email'])){
            setErrorrAndredirect('All Fields Are Required' , 'auth.php?action=register' );
        }
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setErrorrAndredirect('Email Is Not Valid' , 'auth.php?action=register' );
        }
        if(!preg_match('/^09\d{09}$/',$_POST['phone'])){
            setErrorrAndredirect('PhoneNumber Is Not Valid' , 'auth.php?action=register' );
        }
    }
}



## Include Main Page
if(isset($_GET['action']) && $_GET['action'] == 'register'){
    require BASE_PATH . 'tpl/register_tpl.php';
}
if(isset($_GET['action']) && $_GET['action'] == 'login'){
    require BASE_PATH . 'tpl/login_tpl.php';
}
if(isset($_GET['action']) && $_GET['action'] == 'verify'){
    require BASE_PATH . 'tpl/verify_tpl.php';
}

