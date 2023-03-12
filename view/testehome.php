<?php
session_start();

$name = $_SESSION['name'];
$password = $_SESSION['password'];
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
