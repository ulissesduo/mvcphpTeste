<?php

class Controller{
    private $model;
    private $data = array();


    public function __construct($model){
        $this->model = $model;
    }

    public function index(){
        $data = $this->model->select();
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
            echo '<td><a href="http://localhost/mvcphpteste/view/editStudent.php?id=' . $row['id'] . '&name=' . $row['nome'] . '">Update</a> | <td><a href="http://localhost/mvcphpteste/view/deleteConfirm.php?id=' . $row['id'] . '&name=' . $row['nome'] . '">Delete</a>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public function index2() {
        $searchModel = new Model();
        if(isset($_POST['searchTerm'])) {
            $data = $searchModel->search($_POST['searchTerm']);
        } else {
            $data = $searchModel->select();
        }
        require_once('http://localhost/index2.php');
    }
    

    public function userFilter(){
        $data = $this->model->filter();
        return $data;
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
    
    public function update($id, $name) {
        var_dump($id, $name); // debug statement

        if ($this->model->update($id, $name)) {
            // Redirect to the home page if the update was successful
            header('Location: http://localhost/mvcphpTeste/index.php');
            echo 'jaa';
            echo "Data updated successfully"; // Debug statement

            exit;
        } else {
            // Set an error flag to indicate that the update failed
            $error = true;
            // Render the editStudent view to allow the user to try again
            require_once('C:\xampp\htdocs\mvcphpTeste\view\editStudent.php');
        }
    }
    public function delete($id) {
        $this->model->delete($id);
    }
    
    // public function delete(){
    //     $data = $this->model->delete(1,'kk');
    //     echo $data;
    // }
}

?>