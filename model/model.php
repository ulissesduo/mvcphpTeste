<?php
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

class Model{
    private $con;
    
    public function __construct($PDO){
        // $con = new db();
        $this->con = $PDO;
    }
    
    // public function create($name){
    //     $sql = "INSERT INTO username (nome) VALUES (':name')";
    //     $stmt = $this->con->prepare($sql);
    //     $stmt = bindParam(':name', $name);
    //     $stmt->execute();
    //     return $stmt;
    // }
    

    //create
    public function create($name) {
        $sql = "INSERT INTO `username`(`nome`) VALUES ('$name')";
        if($this->con->query($sql) == TRUE){
            return true;
        }else{        
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
