<?php
require_once('C:\xampp\htdocs\mvcphp\controller\controller.php');
require_once('C:\xampp\htdocs\mvcphp\model\model.php');
// require_once('C:\xampp\htdocs\mvcphp\view\view.php');

// $model = new Model();
// $view = new View();
// $controller = new Controller($model, $view);

// if (isset($_POST['create'])) {
//     $name = $_GET['nome'];
//     // $controller->edit($name);

//     echo $name;
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $affectedRows = $controller->delete($id);
    $affectedRows = 1;
    if ($affectedRows > 0) {
        echo 'aee';
        header('Location: http://localhost/mvcphp/index.php?id=' . $id);
        // echo $id;

        
        
    }
}

?>