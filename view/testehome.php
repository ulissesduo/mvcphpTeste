<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');

// Get the user information using the getUserById() method in your controller
$db = new db();
$pdo = $db->connection();
$model = new Model($pdo);
$controller = new Controller($model);

session_cache_limiter('nocache');
session_start();


// Check if the user is not logged in as a teacher, redirect to login form
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'student') {
  header('Location: loginform.php');
  exit();
}

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
<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
      <p>Your name session is <?php echo $_SESSION['username']; ?>.</p>
      <p>Your ID session is <?php echo reset($_SESSION['user_id']); ?>.</p>
      <p>Your password is session of  <?php echo $_SESSION['password']; ?>.</p>
      <p>session name <?php echo $_SESSION['username'];?></p>
      <p>Your user type session is: <?php echo $_SESSION['user_type'];?></p>
    <a href="logout.php">Log out</a>

</body>
</html>
