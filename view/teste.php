<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['nome'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: http://localhost/mvcphpteste/view/testehome.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <!-- Form -->
    <form class="form-example" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Login form</h1>

            <!-- Input fields -->
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" placeholder="Username..." name="nome" required />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Password..." name="password" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-customized mt-4">Login</button>
            <button type="button" class="btn btn-secondary btn-customized mt-4">Cancel</button>

          </form>
</body>
</html>
