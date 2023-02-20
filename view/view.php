<?php
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

$controller->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <p>teste</p> -->
    <a href="http://localhost/mvcphp/actions/read.php">read</a><br>
    <a href="http://localhost/mvcphp/actions/readFilter.php">readFilter</a><br>
    <a href="http://localhost/mvcphp/view/addStudent.php">create</a>
</body>
</html>