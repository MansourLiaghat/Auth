<?php

require_once './bootstrap/init.php';


## Request Method Post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    # Action Register
    if(isset($_GET['action']) && $_GET['action'] == 'register'){
        # Validation Register
        if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email'])){
            setErrorrAndredirect('All Fields Are Required' , 'auth.php?action=register' );
        }
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setErrorrAndredirect('Email Is Not Valid' , 'auth.php?action=register' );
        }
        if(!preg_match('/^09\d{09}$/',$_POST['phone'])){
            setErrorrAndredirect('PhoneNumber Is Not Valid' , 'auth.php?action=register' );
        }
        if(isUserExist($_POST['phone'],$_POST['email'])){
            setErrorrAndredirect('PhoneNumber OR Email Is Existed' , 'auth.php?action=register' );
        }
        
        # Create User
        $userCreate = userCreate($_POST);
        if(!$userCreate){
            setErrorrAndredirect('User Not Created' , 'auth.php?action=register' );
        }else{
            $_SESSION['email'] = $_POST['email'];
            redirect('auth.php?action=verify');
        }
    }
}


## Include Main Page
# Action Register
if(isset($_GET['action']) && $_GET['action'] == 'register'){
    require BASE_PATH . 'tpl/register_tpl.php';
}
# Action Login
if(isset($_GET['action']) && $_GET['action'] == 'login'){
    require BASE_PATH . 'tpl/login_tpl.php';
}
# Action Verify
if(isset($_GET['action']) && $_GET['action'] == 'verify' && !empty($_SESSION['email'])){
    if(!isUserExist(null , $_SESSION['email'])){
        setErrorrAndredirect('User Not Found' , 'auth.php?action=register' );
    }

    if(isset($_SESSION['hash']) && isAliveToken($_SESSION['hash'])){
        sendTokenByEmail($_SESSION['email'],findTokenByHash($_SESSION['hash'])->token);
    }else{
        $createTokenLogin=createTokenLogin();
        sendTokenByEmail($_SESSION['email'],$createTokenLogin['token']);
        $_SESSION['hash'] = $createTokenLogin['hash'];
    }

    require BASE_PATH . 'tpl/verify_tpl.php';

}

