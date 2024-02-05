<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View All Items Details</title>

</head>
<body>
    <?php include 'navigation.php';?>
    <?php include 'bootstrap.php';?>          
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
            <h1>All Items Details</h1><br>
            
        <?php

        /* create connection*/
            $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    /*preapre statement*/
    $stmt=$conn->prepare("select * from menuitem");
    
    //Execute statement
    $stmt->execute();

    //Fetch record
    $menuitems=$stmt->fetchAll();
  ?>
  <table class="table table-striped" >
    <thead class="bg-light">
    <tr>
    <th>Sr.no</th>
    <th>Id</th>
    <th>Name</th>
    <th>Measurment Unit</th>
    <th>MRP</th>
    <th>Selling Price</th>
    <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $c = 1;
    foreach($menuitems as $menuitem )
    {  
    ?>
    <tr>
        <td><?= $c?></td>
        <td><?= $menuitem['id']?></td>
        <td><?= $menuitem['name']?></td>
        <td><?= $menuitem['unit']?></td>
        <td><?= $menuitem['mrp']?></td>
        <td><?= $menuitem['sell']?></td>
        <td>
            <a href="update.php?id=<?=$menuitem['id']?>"><button class="btn btn-outline-success">Update</button></a> 
        </td>
    </tr>
    <?php
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