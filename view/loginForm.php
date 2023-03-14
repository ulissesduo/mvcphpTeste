<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

session_start();


// Check if the user is already logged in, redirect to the appropriate page
if (isset($_SESSION['user_id'])) {
  if ($_SESSION['user_type'] === 'teacher') {
    header('Location: teacherpage.php');
    exit();
  } else if ($_SESSION['user_type'] === 'student') {
    header('Location: testehome.php');
    exit();
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    // Check if the username and password are correct
    $user_id = $model->verifyUser($_SESSION['username'], $_SESSION['password']);
    $userid = $controller->getUserId($_SESSION['username'], $_SESSION['password']);

    if ($user_id) {
        // Set the user ID in the session
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_type'] = $user_id['user_type']; //esse valor foi passado para outra pagina
      if($_SESSION['user_type'] == 'teacher'){
        // Redirect the user to the next page with the user ID as a query parameter
        header('Location: teacherpage.php?id=' . $userid);
        exit();
      }
      else if($_SESSION['user_type'] == 'student'){
        header('Location: testehome.php?id=' . $userid);
        exit();
      }        
    } 
    else {
        // Handle authentication failure
        $error = "Invalid username or password";
    }
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
    <title>Login Form</title>
  </head>
  <body>
    <div>
      <div class="row align-items-center" style="height: 100vh;">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
          <!-- Form -->
          <form class="form-example" action="loginform.php" method="post">
            <h1>Login form</h1>

            <?php if (isset($error)) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } ?>
            
            <!-- Input fields -->
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" placeholder="Username..." name="username" required />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Password..." name="password" required />
            </div>

            <button type="submit" class="btn btn-primary btn-customized mt-4">Login</button>
            <button type="button" class="btn btn-secondary btn-customized mt-4">Cancel</button>

          </form>
          <!-- Form end -->
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</
