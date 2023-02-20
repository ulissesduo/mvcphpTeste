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
    <?php

    $controller->index();

    ?>
<!-- 
    <a href="http:\\localhost\mvcphpteste\view\addStudent.php">Add User</a>
    <a href="http:\\localhost\mvcphpteste\view\view.php">select User</a>
    <a href="http:\\localhost\mvcphpteste\view\delete.php">delete User</a>
    <a href="http:\\localhost\mvcphpteste\view\editStudent.php">edit User</a>
     -->
</body>
</html>