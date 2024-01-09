<html>
   <?php include('base.php');
        include('header.php');
        include('db.php');
   ?>
    <body>

    <?php


            $id='';
            $first_name='';
            $last_name='';
      
           if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['id'];
            $first_name= $_POST['first_name'];
            $last_name = $_POST['last_name'];
            
            if(!empty($first_name) && !empty($last_name)) {

            } else {
                header('Location: form.php');
            }
           }

       
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
                </tr>
            </thead>
            <tbody>

            <?php  
                    $stmt = $conn->prepare('SELECT * FROM students');
                    $stmt->execute();
                    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  
            ?>

            <?php  
                  foreach($students as $student) { ?>


                          <tr>
                                <td> <?php echo $student['id'];  ?></td>
                                <td> <?php echo  $student['name'];  ?></td>
                                <td> <?php echo  $student['email'];  ?></td>
                                <td> <?php echo  $student['address'];  ?></td>
                            </tr>
                 <?php } ?>
           
               
            </tbody>
           </table>
      </div>

    </body>
</html>