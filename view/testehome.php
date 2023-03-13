<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');

// Get the user information using the getUserById() method in your controller
$db = new db();
$pdo = $db->connection();
$model = new Model($pdo);
$controller = new Controller($model);
session_start();

if(!isset($_SESSION['user_type']) == 'student'){
    header('Location: loginform.php');
  
}
$name = $_SESSION['name'];
$password = $_SESSION['password'];

$user = $controller->getUserById(123); // replace 123 with the ID of the user you want to retrieve
print_r($user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>WELCOME <?php echo $name;?></h1>
    <p>Your password is <?php echo $password?></p>
</body>
</html>
