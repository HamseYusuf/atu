<html>
<?php 
include("db.php");
include("base.php");

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($username) || empty($email) || empty($password)) {
        header("Location: signup.php");
    } else {
        $sql = "INSERT INTO users (username , email , password) VALUES (:username , :email , :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username" , $username);
        $stmt->bindParam(":email" , $email); 
        $stmt->bindParam(":password",password_hash($password , PASSWORD_DEFAULT));
        $stmt->execute();
        header("Location: index.php");
    }
}

?>

<body>
    <div class="container mt-5 ">
        <div class="display-4 fw-bold text-center"> Sing Up</div>
        <div class="row flex justify-content-center">
         <div class="col-6">
         <form action="signup.php"  method="post" class="form-group">
                <label for="" class="form-label"> Username</label>
                <input type="text" name="username" placeholder="Enter Your Name" class="form-control">
                <label for="" class="form-labe">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                <label for="" class="form-label"> Password</label>
                <input type="password" class="form-control" placeholder="Type New Passowrd" name="password">
                <button class="btn btn-info mt-2 " type="submit">Sing up </button>
            </form>
         </div>
        </div>
    </div>
</body>
</html>