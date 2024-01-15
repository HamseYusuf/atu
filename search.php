<html>
   <?php include('base.php');
        include('header.php');
        include('db.php');
       
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query = $_GET['query'];
            if(empty($query)) {
                header("Location: index.php");
            }
        }
   ?>
    <body>

    <?php


      

       
    ?>
       <div class="display-6 text-start ms-4 mt-4">
        List of books
       </div>
     
      <div class="container mt-4">
        <a class=" btn btn-primary mb-2" href="form.php">Add new </a>
      <table class="table ">
            <thead>
                <tr>
                    <th> Id </th>
                    <th>Name</th>
                    <th>email</th>
                    <th>address </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php  
                    $stmt = $conn->prepare('SELECT * FROM students WHERE name LIKE :query');
                    $stmt->bindParam(":query" , $query);
                    $stmt->execute();
                    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  
            ?>

            <?php  
                
                if($students) {
                    foreach($students as $student) { ?>


                        <tr>
                              <td> <?php echo $student['id'];  ?></td>
                              <td> <?php echo  $student['name'];  ?></td>
                              <td> <?php echo  $student['email'];  ?></td>
                              <td> <?php echo  $student['address'];  ?></td>
                              <td>
                                <a href="update.php?id=<?php echo $student['id'] ?>" class="btn btn-info btn-sm">Update </a>
                                <a href="delete.php?id=<?php echo $student['id'] ?>" class="btn btn-danger btn-sm">Delete </a>
                              </td>
                          </tr>
               <?php } 
                } else {
                    echo "Not Found";
                }
                ?>
           
               
            </tbody>
           </table>
      </div>

    </body>
</html>