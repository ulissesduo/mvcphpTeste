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
        if(isset($_GET['search_query'])) {
            // search query submitted, filter data
            $search_query = $_GET['search_query'];
            $data = $this->model->search($search_query);
      
            // load the filter view file
            // header('Location: http://localhost/mvcphpTeste/index.php');
            require_once 'views/filter.php';
          } else {
            // no search query, show all data
            $data = $this->model->index();
      
            // load the index view file with the data
            $this->index();
            require_once 'views/index.php';
        }
    }

    public function getUserById($id) {
        $user = $this->model->getUserById($id);
        return $user;
    }
    
    // Verify user credentials
    public function verifyUser($username, $password) {
        $model = new Model();
        $user = $model->verifyUser($username, $password);
        
        if (!$user) {
            return false;
        }
        
        if (password_verify($password, $user['password'])) {
            return $user['id'];
        } else {
            return false;
        }
    }

    // public function login(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
    //         $id=$_POST['id'];
    //         $username=$_POST['username'];
    //         $password=$_POST['password'];
    //         $user = $this->model->getUserById($username);
            
    //     }
    // }

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
}

?>