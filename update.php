<html>
<?php 

include('db.php');
include("base.php");
include("header.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare('SELECT * FROM students WHERE id = :id');
    $stmt->bindParam(":id" , $id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
   echo  $student['name'];
    
    
}
?>
<body>
    
<div class="container">
    <div class="row flex justify-content-center">
        <div class="col-4">
            <div class="display-5 text-center m-2 ">Update form </div>
            <form action="update_handle.php?id=<?php echo $student['id'] ?>" method="post" class="group">
            <label for="" class="form-label"> Name</label>
            <input value="<?php echo $student['name'] ?>" type="text" name="name" class="form-control">
            <label for="" class="form-label"> email</label>
            <input value="<?php echo $student['email'] ?>" type="email" name="email" class="form-control">
            <label for="" class="form-label"> address</label>
            <input value="<?php echo $student['address'] ?>" type="text" name="address" class="form-control">
            <input type="submit"  value ="submit" class="form-control btn btn-danger mt-2">

        </form>
        </div>
    </div>
</div>
</body>
</html>