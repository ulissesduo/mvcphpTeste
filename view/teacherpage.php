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
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'teacher') {
  header('Location: loginform.php');
  exit();
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Home</title>
  </head>
  <body>
    <div class="container">
      <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
      <p>Your name session is <?php echo $_SESSION['username']; ?>.</p>
      <p>Your ID session is <?php echo reset($_SESSION['user_id']); ?>.</p>
      <p>Your password is session of  <?php echo $_SESSION['password']; ?>.</p>
      <p>session name <?php echo $_SESSION['username'];?></p>
      <p>Your user type session is: <?php echo $_SESSION['user_type'];?></p>

      <a href="logout.php">Log out</a>

    </div>
    <div class="container">
      <h4>This is your teacher area.</h4>
      <p>Here you can manage your students, control their payment, check the lessons of each students and much more.</p>
      <p>Access your Student List <a href="http://localhost/mvcphpteste/view/studentlist.php">here</a>.</p>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>