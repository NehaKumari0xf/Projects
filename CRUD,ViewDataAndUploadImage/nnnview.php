<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View All Images Details</title>

</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php include 'navigation.php';?>     
          </div>
        </div><hr>

        
        <div class="row">
            <div class="col-sm-12">
                <?php include 'bootstrap.php';?>     
          </div>
        </div>
    

        <div class="row">
            <div class="col-sm-12 text-center">
            <h1>All Images Details</h1><br>
            
        <?php

        /* create connection*/
            $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    /*preapre statement*/
    $stmt=$conn->prepare("select * from uploadimage");
    
    //Execute statement
    $stmt->execute();

    //Fetch record
    $uploadimages=$stmt->fetchAll();
  ?>
  <table class="table table-striped" >
    <thead class="bg-light">
    <tr>
    <th>Sr.no</th>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Password</th>
    <th>Address</th>
    <th>Image</th>
    <th>operations</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $c = 1;
    foreach($uploadimages as $uploadimage )
    {
        $fntoprint = str_pad($uploadimage['fname'], strlen($uploadimage['fname']) - 4, "*", STR_PAD_LEFT);
        echo <<<blk
        <tr><td>{$c}s</td>
        <td>{$uploadimage['img_id']}</td>
        <td>{$fntoprint}</td>
        <td>{$uploadimage['lname']}</td>
        <td>{$uploadimage['email']}</td>
        <td>{$uploadimage['password']}</td>
        <td>{$uploadimage['address']}</td>
        <td><img src="./image/{$uploadimage['img_id']}.jpg" height="100px" width="100px"/></td>
        <td><a href="update.php?img_id={$uploadimage['img_id']}"><button class="btn btn-outline-success">Update</button></a> 
        <a href="delete.php?img_id={$uploadimage['img_id']}"><button class="btn btn-outline-danger">Delete</button></a></td>
        </tr>
       blk;    

    $c++;
    }
    ?>
    </tbody>
</table>
            </div>
        </div>
    </div>
    

</body>
</html>