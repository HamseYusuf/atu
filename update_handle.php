<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = " UPDATE students SET name = :name , email = :email , address = :address WHERE id = :id";
    $stmt= $conn->prepare($sql);
    $stmt->bindParam(":name" , $name);
    $stmt->bindParam(":email" , $email);
    $stmt->bindParam(":address" , $address);
    $stmt->bindParam(":id" , $id);
    $stmt->execute();
    header("Location: index.php");
}
 ?>