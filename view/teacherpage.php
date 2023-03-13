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
if(!isset($_SESSION['user_type']) == 'teacher' || !isset($_GET['id']) != null){
  header('Location: loginform.php');
}
// Get the user ID from the query parameter

$user_id = $_GET['id'];
$_SESSION['user_id'] = $user_id;


// Retrieve the username and password from the session
$username = $_SESSION['username'];
$password = $_SESSION['password'];
// get user type
$user_type = $_SESSION['user_type'];

$user = $controller->getUserById($user_id);
$user_id = $controller->getUserId($_SESSION['username'], $_SESSION['password']);


// Display the user ID and other user information
// echo "User ID: " . $user_id;
// echo "<br>";
// echo "Username session: " . $username;
// echo "<br>";
// echo "password session: " . $_SESSION['password'];
// echo "<br>";
// print_r($user);
// echo "<br>";
// echo "user_type: " .$user_type;
// echo "<br>";
// echo "id session: " .$_SESSION['user_id'];
// echo "<br>";
// echo "user type teste: " .$_SESSION['user_type'];
// echo "<br>";
// echo "user type teste: " .$user_type;
// echo "<br>";
// echo "print_r da linha 51: " .$user_type;

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
      <p>Your ID session is <?php echo $_SESSION['user_id']; ?>.</p>
      <p>Your password is session of  <?php echo $_SESSION['password']; ?>.</p>
      <p>session name <?php echo $_SESSION['username'];?></p>
      <p>Your user type session is: <?php echo $_SESSION['user_type'];?></p>
      <a href="logout.php">Log out</a>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>