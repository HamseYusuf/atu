<?php
 include("db.php");
 include("base.php");

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username" , $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && $password == $user['password']) {
        session_start();
        $_SESSION['id'] = $user['id'];
        header("Location: index.php");
    }else {
        echo "invalid username or password";
    }
 }

?>

<html>
    <body>
        
    <div class="container">
    <div class="row flex justify-content-center mt-5">
      <div class="col-4">
      <div class="display-4 text-center"> Login </div>
        <form action="login.php" method="post" class="form-group">
            <label for="" class="form-label"> Username</label>
            <input required type="text" name="username" class="form-control">
            <label for="" class="form-control"> Password</label>
            <input required  type="password" name="password" class="form-control">
            <input type="submit" value="Login" class="form-control btn btn-success mt-2 ">
        </form>
        <a href="signup.php" class=""> sing up </a>
      </div>
    </div>
    </div>
    </body>
</html>