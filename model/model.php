<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

class Model{
    private $con;
    
    public function __construct($PDO){
        // $con = new db();
        $this->con = $PDO;
    }
    
    //create
    public function create($name) {
        $sql = "INSERT INTO `username`(`nome`) VALUES ('$name')";
        if($this->con->query($sql) == TRUE){
            return true;
        }else{        
            return false;
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM username WHERE id = :id LIMIT 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function verifyUser($username, $password) {
        $sql = "SELECT id FROM username WHERE nome = :username AND password = :password LIMIT 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array(":username" => $username, ":password" => $password));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user['id'];
        } else {
            return false;
        }
    }
    
    public function select(){
        $sql = "SELECT * FROM username";
        $stmt = $this->con->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function search($searchTerm) {
        $sql = "SELECT * FROM username WHERE nome LIKE :searchTerm";
        $stmt = $this->con->prepare($sql);
        $searchTerm = "%{$searchTerm}%";
        $stmt->execute(array(":searchTerm" => $searchTerm));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $nome){
        $sql = "UPDATE username SET nome=:nome WHERE id=:id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    
        echo "id: $id\n";
        echo "query: $sql\n";
        if($stmt->execute()){
            return $stmt->rowCount();
        }
        else{
            echo 'edit failed';
            return false;
        }        
    }
    
    public function delete($id){
        $sql = "DELETE FROM username WHERE id=:id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id',$id);
        if($stmt->execute()){
         
            return $stmt->rowCount();   
        }else{
            return false;
        }
    }
}
?>