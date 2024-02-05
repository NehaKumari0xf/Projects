<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php include 'navigation.php' ?>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                try{
                    $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $stmt=$conn->prepare("select * from student where student_id=:student_id");
                    $stmt->bindValue(':student_id',$_GET['student_id']);
                    $stmt->execute();
                    $rec=$stmt->fetch();
                    if(count($rec)==0)
                    {
                        //invalid id
                        echo "<h1>Invalid ID entered</h1>";
                    }
                    else
                    {
                        //record found
                        ?>
                        <form action="updateProcess.php" method="get">
                        <label>Student Name</label><br/>
                        <label>Student ID</label><input type=number name="student_id" value="<?= $rec['student_id']?>" disabled/><br/>
                <label>First Name</label>    <input type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" value="<?= $rec['firstname']?>"/>
                <label>Last Name</label>     <input type="text" id="lastname" name="lastname" placeholder="Enter Your last Name" value="<?= $rec['lastname']?>"/><br/>
                <label>Date Of Birth:</label><input type="date" id="dateofbirth" name="dateofbirth" value="<?= $rec['dateofbirth']?>"/><br/>
                <label>Gender:</label><input type="radio" value="m" name="gender" checked id="mr"/><label>Male</label>
                <input type="radio" value="f" name="gender" id="fr"/><label>Female</label>    <input type="radio" value="f" name="gender" id="fr"/><label>Transgender</label><br/>
                <label>Father's Name</label><br/> <input type="text" id="fathersname" name="fathersname" placeholder="Enter Your Father's Name" value="<?= $rec['fathersname']?>"/><br/>
                <label>Contact Number</label><br/> <input type="number" id="contactnumber" name="contactnumber"placeholder="Enter Your Contact Number" value="<?= $rec['contactnumber']?>"/><br/>
                <label>Qualification</label><br/> <input type="text" id="qualification" name="qualification" placeholder="Enter Your Qualification" value="<?= $rec['qualification']?>"/><br/>
                <label>Email</label><br/>         <input type="email" id="email" name="email" placeholder="Enter Your G-mail" value="<?= $rec['email']?>"/><br/>
                <label>Address</label><br/>   <input type="text" id="address" name="address" placeholder="Enter Your Address" value="<?= $rec['address']?>"/><br/>
                <input type="submit" value="Update student"/>
                        </form>
                        <?php

                    }



                }catch(Exception $ex)
                {
                    echo "<h1>".$ex->getMessage()."</h1>";
                }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>
</html>