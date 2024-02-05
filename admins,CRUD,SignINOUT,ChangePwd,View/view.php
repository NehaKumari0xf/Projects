<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view your topics</title>
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
                <?php include 'bootstrap.php';?>     
            </div>
        </div>
<div class="container-fluid"></div>
        <div class="row">
            <div class="col-sm-12 text-center text-info">
            <h1 style="font-size:45px;">All your added topics</h1><br/>
    <?php
    /* create connection*/
    $conn=new PDO("mysql:host=localhost;dbname=registrations;","root","");
    /*preapre statement*/
    $stmt=$conn->prepare("select * from topics");
    //Execute statement
    $stmt->execute();
    //Fetch record
    $admins=$stmt->fetchAll();
    ?>
    <table class="table table-striped " style="font-size:25px;" >
    <?php
    foreach($admins as $admin )
    {
        echo "<tr><td>".$admin['tid'].'.</td><td>'.$admin['tname']."</td></tr>";
    }?>
    </table>
            </div>
        </div>
    </div>
</body>
</html>