<?php
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <a href='http:\\localhost\mvcphpteste\view\addStudent.php'>Add new User</a>    
    <form action="http:\\localhost\mvcphpteste\index.php" method="get">
        <input type="text" name="q" placeholder="Search...">
        <button type="submit" name='search'>Search</button>
    </form>

    <?php

        $controller->index();
    
    ?>
</body>
</html>