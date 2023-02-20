<?php
require_once('C:\xampp\htdocs\mvcphp\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphp\model\model.php');
// require_once('C:\xampp\htdocs\mvcphp\view\view.php');

// $ids = $_GET['id'];
// echo $ids;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $affectedRows = $controller->delete($id);
    if ($affectedRows > 0) {
        header("Location: http://localhost/mvcphp/");
    }
}

?>