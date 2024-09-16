<?php

require_once 'bootstrap/init.php';

if(!isLoginUser()){
redirect('auth.php?action=register');
}