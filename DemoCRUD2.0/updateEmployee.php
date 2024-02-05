<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <?php include 'navigation.php'?>
      </div>
    </div>      
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php
            try{
                $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                    $stmt=$conn->prepare("update employe set name=:name,fName=:fName,gender=:gender,mobile=:mobile,email=:email where id=:id");
                    $stmt->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
                    $stmt->bindValue(':name',$_GET['name']);
                    $stmt->bindValue(':fName',$_GET['fName']);
                    $stmt->bindValue(':gender',$_GET['gender']);
                    $stmt->bindValue(':mobile',$_GET['mobile']);
                    $stmt->bindValue(':email',$_GET['email']);
                    $stmt->execute();
                    echo '<h1 class="text-center text-success"> Record updated successfully.</h1>';
            }catch(Exception $ex)
            {
                echo '<h1 class="text-center text-danger">'.$ex->getMessage()."</h1>";

            }
        ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    


</body>
</html>