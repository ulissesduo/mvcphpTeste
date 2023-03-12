<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');
// session_start();

// Get the user ID from the query parameter
$user_id = $_GET['id'];

// Get the user information using the getUserById() method in your controller

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);
$user = $controller->getUserById($user_id);

// Display the user ID and other user information
// echo "User ID: " . $user['id'];
// echo "<br>";
// echo "Username: " . $user['nome'];

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
      <h1>Welcome <?php echo $user['nome']; ?>!</h1>
      <p>Your ID is <?php echo $user_id; ?>.</p>
      <p>Your password is <?php echo $user['password']; ?>.</p>
      <p>Your user type is <?php echo $user['user_type']; ?>.</p>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
