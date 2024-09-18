<?php

require_once 'bootstrap/init.php';

# User Is Login ?
if(!isLoginUser()){
    redirect('auth.php?action=verify');
}

$userData = getAuthenticateUserBySession($_COOKIE['auth']);

# Logout
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    logout($userData->email);
}

include 'tpl/index_tpl.php';