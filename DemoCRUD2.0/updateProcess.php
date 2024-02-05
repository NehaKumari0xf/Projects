<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php include 'navigation.php'
                ?>
            </div>

            <div class="row">
               <div class="col-sm-4">
                <?php
                try{
                    $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                    $stmt=$conn->prepare("update student set firstname=:firstname,lastname=:lastname,dateofbirth=:dateofbirth,gender=:gender,fathersname=:fathersname,contactnumber=:contactnumber,qualification=:qualification,email=:qualification,address=:address where student_id=:student_id");
                    $stmt->bindvalue(':student_id',$_GET['student_id'],PDO::PARAM_INT);
                    $stmt->bindValue(':firstname',$_GET['firstname']);
                    $stmt->bindValue(':lastname',$_GET['lastname']);
                    $stmt->bindValue(':dateofbirth',$_GET['dateofbirth']);
                    $stmt->bindValue(':gender',$_GET['gender']);
                    $stmt->bindValue(':fathersname',$_GET['fathersname']);
                    $stmt->bindValue(':contactnumber',$_GET['contactnumber'],PDO::PARAM_INT);
                    $stmt->bindValue(':qualification',$_GET['qualification']);
                    $stmt->bindValue(':email',$_GET['email']);
                    $stmt->bindValue(':address',$_GET['address']);
                    $stmt->execute();
                    echo '<h1 class="text-center text-success"> Record updated succesfully. </h1>';
                }catch(Exception $ex)
                {
                    echo '<h1 class="text-center text-success">'.$ex->getMessage()." </h1>";
                }
                ?>
               </div> 
               
            </div>
        </div>
    </div>


</body>
</html>