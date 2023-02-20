<?php

class Controller{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function index(){
        $data = $this->model->select();
        // echo $data . " asas";
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Actions</th>';
        echo '</tr>';

        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] .'</td>';
            echo '<td>' . $row['nome'] .'</td>';
            // echo '<td><a href="http://localhost/mvcphpteste/view/editStudent.php?action=update&id='.$row['id'].'">Update</a> | <a href="?action=delete&id='.$row['id'].'">Delete</a></td>';
            echo '<td><a href="http://localhost/mvcphpteste/view/editStudent.php?id=' . $row['id'] . '&name=' . $row['nome'] . '">Update</a> | <a href="http://localhost/mvcphpteste/view/delete.php?id=' . $row['id'] . '&name=' . $row['nome'] . '">Delete</a></td>';

            echo '</tr>';
        }
        echo '</table>';
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nome'];
            $this->model->create($name);
            header('location: http://localhost/mvcphpTeste/index.php');
            exit();
        } else {
            require_once('C:\xampp\htdocs\mvcphpTeste\view\create.php');
        }
    }

    // public function update($id, $name){
    //     if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //         $name = $_POST['nome'];
    //         $this->model->update($id, $name);
    //         header('Location: http://localhost/mvcphpTeste/index.php');
    //         exit;
    //     }
    //     else{
    //         require_once('C:\xampp\htdocs\mvcphpTeste\view\editStudent.php');
    //     }
    // }
    
    public function update($id, $name){
        $name = $_POST['nome'];
        if($this->model->update($id, $name) != false){
            header('Location: http://localhost/mvcphpTeste/index.php');
            exit;

        }else{
            require_once('C:\xampp\htdocs\mvcphpTeste\view\editStudent.php');
        }
    }
    
    public function delete(){
        $data = $this->model->delete(1,'kk');
        echo $data;
    }
}

?>