<?php

require_once './bootstrap/init.php';

if(isset($_GET['action']) && $_GET['action'] == 'register'){
    require BASE_PATH . 'tpl/register_tpl.php';
}
if(isset($_GET['action']) && $_GET['action'] == 'login'){
    require BASE_PATH . 'tpl/login_tpl.php';
}
if(isset($_GET['action']) && $_GET['action'] == 'verify'){
    require BASE_PATH . 'tpl/verify_tpl.php';
}

