<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Person</title>
</head>
<body>
    <?php
        /* 1. Create connection*/
        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");

        /* 2. Create prepare statement*/
        $stmt=$conn->prepare("insert into person(name,gender,age) values(:name,:gender,:age)");

        /*3. Bind values to statement*/
        $stmt->bindValue(':name',$_GET['pname']);
        $stmt->bindValue(':gender',$_GET['gender']);
        $stmt->bindValue(':age',$_GET['age'],PDO::PARAM_INT);

        /*4. Execute statement*/
        $stmt->execute();

        echo "<h1>Person added Successfully.</h1>";
    ?>
    <a href="index.php"><button>Add Another</button></a>
    <a href="viewAllPerson.php"><button>View All Person</button></a>
</body>
</html>


