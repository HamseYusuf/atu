<!DOCTYPE html>
<html lang="en">
<?php include('base.php');
      include('header.php');
      include('db.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $address= $_POST['address'];

            if(empty($name) || empty($email) || empty($address)) {
                echo "Fill all the fields";
                header("Location: form.php");
            } elseif(!filter_var($name , FILTER_VALIDATE_INT) && filter_var($email , FILTER_VALIDATE_EMAIL) && 
            !filter_var($address , FILTER_VALIDATE_INT) ) {
                $sql = "INSERT INTO students (name , email , address) VALUES (:name , :email , :address)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":name" , $name);
                $stmt->bindParam(":email" , $email);
                $stmt->bindParam(":address" , $address);
                $stmt->execute();
                header("Location: index.php");

            } else{
                echo"invalid ";
                header("Location: form.php");
            }
        }
      
  
?>
<body>
    <div class="display-6 text-center m-5 ">Studentd form </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
        <form class="form-group" action="form.php" method='post'>
        <label class="form-label" for="name">Name</label>
        <input required class="form-control" type="text" name='name' id="name" placeholder="Enter your name ">
        <label class="form-label" for="last_name">email</label>
        <input class="form-control" type="email" name='email' id="email" placeholder="Enter your Email  ">
        <label class="form-label"> Address </label>
        <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
        <input type="submit" value="submit" class="btn btn-primary mt-3  form-control"   >
    </form>
        </div>
        <div class="text-start mb-3   mt-5 ">
         <a href="index.php" class="btn btn-danger"> Go Back </a>
        </div>
        
    </div>
  </div>
</body>
</html>