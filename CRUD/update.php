<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="update.php" method="get">
                    <label for="" class="form-label">
                        id
                    </label>
                    <input type="number" class="form-control" name="id" required/>
                    <input type="submit" value="Get Form"/>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <?php
                if (isset($_GET['id'])) {
                    try {
                        $conn = new PDO("mysql:host=localhost;dbname=ricla", "root", "");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $stmt = $conn->prepare("select * from new where id=:id");
                        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

                        $stmt->execute();
                        $rec = $stmt->fetch();
                        if (empty($rec)) {
                            echo "<h1>Invalid Id</h1>";
                        } else {
                ?>
                        <form action="update.php" method="get">
                        <table style="font-size: larger;" >
                            <tbody>
                                <tr><td><label>Id:</label></td><td><input type="number" name="id" value="<?= $rec['id'] ?>" required  /></td></tr>
                                <tr><td><label>Student Name:</label></td><td><input type="text" name="name" value="<?= $rec['name'] ?>" required/></td></tr>
                                <tr><td><label>Gender:</label></td><td>
                                    <select name="gender" value="<?= $rec['gender'] ?>">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="t">Transgender</option>
                                    </select>
                                </td></tr>
                                <tr><td><label>Phone Number:</label></td><td><input type="text" name="phone" maxlength="10" value="<?= $rec['phone'] ?>" required/></td></tr>
                                <tr><td><label>E-mail:</label></td><td><input type="email" name="email" value="<?= $rec['email'] ?>" required/></td></tr>
                                <tr><td><label>Couses:</label></td><td><input type="text" name="subject" value="<?= $rec['subject'] ?>" required/></td></tr>
                                <tr><td><input  class="btn btn-danger" type="reset"></td><td><input type="submit" class="btn btn-success" value="Update" /></td></tr>
                            </tbody>
                        </table>
                    </form>
                        <?php

                        }
                    } catch (Exception $ex) {

                    }
                }
            ?>         
            </div>
            <div class="col-sm-4"></div>
        </div>


        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php
        if (isset($_GET['name'])) {

            try {
                $conn = new PDO("mysql:host=localhost;dbname=ricla", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("update new set name=:name,gender=:gender,email=:email,phone=:phone,subject=:subject where id=:id");
                $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $stmt->bindValue(':name', $_GET['name']);
                $stmt->bindValue(':gender', $_GET['gender']);
                $stmt->bindValue(':email', $_GET['email']);
                $stmt->bindValue(':phone', $_GET['phone']);
                $stmt->bindValue(':subject', $_GET['subject']);

                $stmt->execute();
                echo '<h1 class="text-center text-success"> Record updated successfully.</h1>';
            } catch (Exception $ex) {
                echo '<h1 class="text-center text-danger">' . $ex->getMessage() . "</h1>";

            }
        }
        ?>
        </div>
        <div class="col-sm-4"></div>

    </div>

    
</body>
</html>