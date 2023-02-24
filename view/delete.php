<?php 
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $controller->delete($id);
    header("Location: http://localhost/mvcphpteste/index.php");  
    exit();
}else {
    header("Location: http://localhost/mvcphpteste/index.php");  
    exit();
}
?>