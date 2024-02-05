<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View All Student Details</title>

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
            <h1>All Student Details</h1><br>
            
        <?php
        /* create connection*/
            $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");

    /*preapre statement*/
    $stmt=$conn->prepare("select * from new");
    
    //Execute statement
    $stmt->execute();

    //Fetch record
    $news=$stmt->fetchAll();
  ?>
  <table class="table table-striped" >
    <thead class="bg-light">
    <th>Sr.no</th>
    <th>Id</th>
    <th>Name</th>
    <th>Gnder</th>
    <th>E-mail</th>
    <th>Phone Number</th>
    <th>Course</th>
    <th>operations</th>
    </thead>
    <tbody>
    <?php
    $c = 1;
    foreach($news as $new )
    {
      /*  echo "<tr><td>".$c."<tr><td>".$new['id'].'</td><td>'.$new['name']."</td><td>".'</td><td>'.$new['gender']."</td><td>".$new['email'].'</td><td>'.$new['phone']."</td><td>".$new['subject'].'</td><td><a href="update.php?id='.$new['id'].'"><button class="btn btn-outline-success" >Update</button></a> <a href="delete.php?id='.$new['id'].'"><button class="btn btn-outline-danger" >Delete</button></a>'."</td></tr>";*/
      
    
    ?>

    <tr>
        <td><?=$c?></td>
        <td><?=$new['id']?></td>
        <td><?=$new['name']?></td>
        <td><?=$new['gender']?></td>
        <td><?=$new['email']?></td>
        <td><?=$new['phone']?></td>
        <td><?=$new['subject']?></td>
        <td><a href="update.php?id=<?=$new['id']?>"><button class="btn btn-outline-success">Update</button></a> 
        <a href="delete.php?id=<?=$new['id']?>"><button class="btn btn-outline-danger">Delete</button></a></td>
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