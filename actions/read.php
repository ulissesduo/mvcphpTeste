<?php
require_once('C:\xampp\htdocs\mvcphp\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphp\view\view.php');

$model = new Model();
$view = new View();
$controller = new Controller($model, $view);

$result = $controller->read();
// $view->render($result);

?>
    
