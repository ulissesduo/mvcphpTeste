<?php
require_once('C:\xampp\htdocs\mvcphp\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphp\model\model.php');
require_once('C:\xampp\htdocs\mvcphp\view\view.php');

$model = new Model();
$view = new View();
$controller = new Controller($model, $view);

if (isset($_POST['create'])) {
    $name = $_POST['nome'];
    $controller->create($name);
}

?>