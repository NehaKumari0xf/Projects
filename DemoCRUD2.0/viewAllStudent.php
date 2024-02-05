<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <?php include 'navigation.php';?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <h1>All Student</h1>
    <?php
    /* create connection*/
    $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");

    /*preapre statement*/
    $stmt=$conn->prepare("select * from student");
    
    //Execute statement
    $stmt->execute();

    //Fetch record
    $students=$stmt->fetchAll();
  ?>
  <table class="table table-striped" >
    <?php
    foreach($students as $student )
    {
        echo "<tr><td>".$student['student_id'].'</td><td>'.$student['firstname']."</td><td>".$student['lastname']."</td><td>".$student['dateofbirth'].'</td><td>'.$student['gender']."</td><td>".$student['fathersname']."</td><td>".$student['contactnumber'].'</td><td>'.$student['qualification']."</td><td>".$student['email']."</td><td>".$student['address']."</td><td>".$student['country']."</td></tr>";
    }
    ?>

</table>
            </div>
        </div>
    </div>
    
</body>
</html>