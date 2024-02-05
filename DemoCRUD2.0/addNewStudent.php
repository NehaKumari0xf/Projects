<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>Save Student</title>
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
            <?php

try{
    /* 1. Create connection*/
    $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    /* 2. Create prepare statement*/
    $stmt=$conn->prepare("insert into student(firstname,lastname,dateofbirth,gender,fathersname,contactnumber,qualification,email,address,country) values(:firstname,:lastname,:dateofbirth,:gender,:fathersname,:contactnumber,:qualification,:email,:address,:country)");

    /*3. Bind values to statement*/
    $stmt->bindValue(':firstname',$_GET['firstname']);
    $stmt->bindValue(':lastname',$_GET['lastname']);
    $stmt->bindValue(':dateofbirth',$_GET['dateofbirth']);
    $stmt->bindValue(':gender',$_GET['gender']);
    $stmt->bindValue(':fathersname',$_GET['fathersname']);
    $stmt->bindValue(':contactnumber',$_GET['contactnumber'],PDO::PARAM_INT);
    $stmt->bindValue(':qualification',$_GET['qualification']);
    $stmt->bindValue(':email',$_GET['email']);
    $stmt->bindValue(':address',$_GET['address']);
    $stmt->bindValue(':country',$_GET['country']);


    /*4. Execute statement*/
    $stmt->execute();

    echo "<h1> Regestration Successfully...</h1>";
}
catch(Exception $ex)
{
    echo "<h1>". $ex->getMessage()."</h1>";
}

?>
</div>
</div>
</div>  
    
</body>
</html>


