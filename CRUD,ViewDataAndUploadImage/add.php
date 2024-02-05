<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
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

                        $stmt = $conn->prepare("select * from tomato where id=:id");
                        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

                        $stmt->execute();
                        $rec = $stmt->fetch();
                        if (empty($rec)) {
                            echo "<h1>Invalid Id</h1>";
                        } else {
                ?>
                            <form action="update.php" method="get" class="my-5 col-sm-7">
                                <label>Id:</label><br/>
                                <input type="number" name="id" value="<?= $rec['id'] ?>" required  /><br/>
                                <label>Name:</label>
                                <input type="text" name="name" value="<?= $rec['name'] ?>" required/><br/>
                                <label>Quantity: </label>     
                    <input type="text" id="quantity"required  name="quantity" value="<?= $rec['quantity'] ?>" placeholder="Enter your quantity"/><br/>
                <label>Phone number: </label>
                    <input type="text" id="contactnumber" required name="contactnumber" value="<?= $rec['contactnumber'] ?>" placeholder="Enter your phone number"/><br/>               
                <label>Email: </label>
                    <input type="email" id="email" name="email" value="<?= $rec['email'] ?>" required placeholder="Enter your email"/><br/>
                <label>Address: </label>   
                    <input type="text" id="address" required name="address" value="<?= $rec['address'] ?>" placeholder="Enter your address"/><br/>
                    <div><tr><td>
                <label>Payment Method: </label>
                    <select id="pay" name="pay" value="<?= $rec['pay'] ?>">
                            <option value="Cash on deleviry">Cash on deleviry</option>
                            <option value="wallet">Wallet</option>
                            <option value="UPI">UPI</option>
                            <option value="Coupons">Coupons</option>
                        </select>
                <div>
                    <br/><tr><td><input type="reset" value=" stay " class="btn btn-outline-danger"/></td><td><input class="btn btn-outline-success"  type="Submit" value="Confirmed"/></td></tr>
                </div>
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

                $stmt = $conn->prepare("delete from tomato  where id=:id");
                $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                
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