<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Person</title>
</head>
<body>
    <h1>All Person</h1>
    <?php
    /* create connection*/
    $conn=new PDO("mysql:host=localhost;dbname=ricla;","root","");

    /*preapre statement*/
    $stmt=$conn->prepare("select * from person");
    
    //Execute statement
    $stmt->execute();

    //Fetch record
    $persons=$stmt->fetchAll();
  ?>
  <table>
    <?php
    foreach($persons as $person )
    {
        ?>
        <tr>
            <td id="td1"><?= $person['id'];?></td>
            <td id="td1"><?= $person['alpha'];?></td>
            <td id="td1"><?= $person['l'];?></td>
            <td><img src="<?=$person['id'] ?>.jpg" height="100px" width="100px"></td>
        </tr>
            <?php
    }
    ?>

</table>
<a href="pp.php"><button>Add New Person</button></a>
</body>
</html>