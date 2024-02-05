<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
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
        <?php
        if(isset($_POST['fname']))
        {
            try{
        //post the name of uploaded file
        /* 1. Create connection*/
        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* 2. Create prepare statement*/
        $stmt=$conn->prepare("insert into uploadimage(fname,lname,email,password,address,pic) values(:fname,:lname,:email,:password,:address,:pic)");

        /*3. Bind values to statement*/
        $stmt->bindValue(':fname',$_POST['fname']);
        $stmt->bindValue(':lname',$_POST['lname']);
        $stmt->bindValue(':email',$_POST['email']);
        $stmt->bindValue(':password',$_POST['password']);
        $stmt->bindValue(':address',$_POST['address']);
        $stmt->bindValue(':pic',$_FILES['pic']['name']);
        $stmt->execute();

        move_uploaded_file($_FILES['pic']["tmp_name"], "./image/" . $conn->lastInsertId() . ".jpg");

        /*4. Execute statement*/

        echo '<h1 class="text-center text-success">Record Added Successfully...</h1>';
            }catch(Exception $ex)
            {
                echo "<h1 >". $ex->getMessage()."</h1>";
            }    
        }
    ?>
    <a href="index.html"><button>Add Another Record</button></a>
    <a href="nview.php"><button>View All Record</button></a>
        </div>
    </div>
    </div>
</body>
</html>