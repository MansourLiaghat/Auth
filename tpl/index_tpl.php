<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<br><br><br>
<a href="<?= siteUrl('index.php?action=logout') ?>">logout</a>
<br><br><br><br><br>

<?php foreach($userData as $key=>$value): ?>
<ul>
    <li>
        <?= $key .' : ' . $value ?>
    </li>
</ul>
<?php endforeach; ?>



</body>
</html>