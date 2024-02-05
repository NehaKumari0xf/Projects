<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'bootstrap.php';?>
    <?php include 'navigation.php';?>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="update.php" class="btn btn-outline-success" method="get">
                    <label for="" class="form-label">
                        Enter Id NUmber:
                    </label>
                    <input type="number" class="form-control" name="id" required/>
                    <input type="submit"   value="Get Form"/>
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

                        $stmt = $conn->prepare("select * from menuitem where id=:id");
                        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

                        $stmt->execute();
                        $rec = $stmt->fetch();
                        if (empty($rec)) {
                            echo "<h1>UH-OH!! Invalid Id</h1>";
                        } else {
                ?>
                        <form action="update.php" method="get">
                        <table style="font-size: larger;" >
                            <tbody>
                                <tr><td><label>Id:</label></td><td><input type="number" name="id" value="<?= $rec['id'] ?>" required  /></td></tr>
                                <tr><td><label>Item Name:</label></td><td><input type="text" name="name" value="<?= $rec['name'] ?>" required/></td></tr>
                                <tr><td><label>Measurment Unit::</label></td><td><input type="text" name="unit" value="<?= $rec['unit'] ?>" required/></td></tr>
                                <tr><td><label>MRP:</label></td><td><input type="text" name="mrp" value="<?= $rec['mrp'] ?>" required/></td></tr>
                                <tr><td><label>Selling Price:</label></td><td><input type="text" name="sell" value="<?= $rec['sell'] ?>" required/></td></tr>
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

                $stmt = $conn->prepare("update menuitem set name=:name, unit=:unit, mrp=:mrp, sell=:sell where id=:id");
                $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $stmt->bindValue(':name', $_GET['name']);
                $stmt->bindValue(':unit', $_GET['unit']);
                $stmt->bindValue(':mrp', $_GET['mrp']);
                $stmt->bindValue(':sell', $_GET['sell']);

                $stmt->execute();
                echo '<h1 class="text-center text-success"> Item updated successfully...</h1>';
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