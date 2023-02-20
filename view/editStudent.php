<?php
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

$id = '';
$name = '';
// if (isset($_POST['create'])) {
//     $name = $_POST['id'];
//     $controller->update($id, $name);
// }

if(isset($_GET['id']) && isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nome'];
    $id = $_POST['id'];
    
    $controller->update($id, $name);
    header("Location: http://localhost/mvcphpteste/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="http://localhost/mvcphpteste/view/edit.php" method="POST">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $name; ?>" />

        <div>
            <input type="submit" name="create" value="Submit">
            <input type="button" value="Cancel">
        </div>
    </form>
</body>
</html>