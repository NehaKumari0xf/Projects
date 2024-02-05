<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
</head>
<body>
        <?php
        if(isset($_POST['alpha']))
        {
            try{
        //post the name of uploaded file
        /* 1. Create connection*/
        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* 2. Create prepare statement*/
        $stmt=$conn->prepare("insert into person(alpha,l,pic) values(:alpha,:l,:pic)");

        /*3. Bind values to statement*/
        $stmt->bindValue(':alpha',$_POST['alpha']);
        $stmt->bindValue(':l',$_POST['l']);
        $stmt->bindValue(':pic',$_FILES['pic']['name']);
        $stmt->execute();

        move_uploaded_file($_FILES['pic']["tmp_name"], "./file/" . $conn->lastInsertId() . ".jpg");

        /*4. Execute statement*/

        echo "<h1>Added Successfully.</h1>";
            }catch(Exception $ex)
            {
                echo "<h1 >". $ex->getMessage()."</h1>";
            }
            
        }
    ?>
    <a href="pp.html"><button>Add Another</button></a>
    <a href="viewAllPerson.php"><button>View All Person</button></a>
    
</body>
</html>