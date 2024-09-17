<?php

require_once 'bootstrap/init.php';

if(!isLoginUser()){
redirect('auth.php?action=register');
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php foreach(getAuthenticateUserBySession($_COOKIE['auth']) as $key=>$value): ?>
<ul>
    <li>
        <?= $key .' ' . $value ?>
    </li>
</ul>
<?php endforeach; ?>


</body>
</html>