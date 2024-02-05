<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateForm</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>

    <div class="conatiner-fluid">
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

                    $stmt=$conn->prepare("select * from employe where id=:id");
                    $stmt->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $rec=$stmt->fetch();
                    if(empty($rec))
                    {
                        echo "<h1>Invalid Id</h1>";
                    }
                    else
                    {
                        ?>
                        <form action="updateEmployee.php" method="get">
                        <table style="font-size: larger;" >
                            <tbody>
                                <tr><td><label>Id:</label></td><td><input type="number" name="id" value="<?=$rec['id']?>" required  /></td></tr>
                                <tr><td><label>Name:</label></td><td><input type="text" name="name" value="<?=$rec['name']?>" required/></td></tr>
                                <tr><td><label>Father's Name:</label></td><td><input type="text" name="fName" value="<?=$rec['fName']?>" required/></td></tr>
                                <tr><td><label>Gender:</label></td><td>
                                    <select name="gender" value="<?=$rec['gender']?>">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="t">Transgender</option>
                                    </select>
                                </td></tr>
                                <tr><td><label>Mobile No:</label></td><td><input type="text" name="mobile" maxlength="10" value="<?=$rec['mobile']?>" required/></td></tr>
                                <tr><td><label>E-mail:</label></td><td><input type="email" name="email" value="<?=$rec['email']?>" required/></td></tr>
                                <tr><td><input  class="btn btn-danger" type="reset"></td><td><input type="submit" class="btn btn-success" value="Update" /></td></tr>
                            </tbody>
                        </table>
                    </form>
                        <?php

                    }
                }catch(Exception $ex)
                {

                }

            ?>         
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    
</body>
</html>