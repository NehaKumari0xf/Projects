<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Menu Items</title>
    

</head>
    
<body>
    <?php include 'bootstrap.php';?>
    <?php include 'navigation.php';?>
    <div class="container-fluid py-5 container">
        <div class="row py-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <form class="form" action="index.php" method="get">
                    <label>Item Name:</label>
                        <input type="text" name="name" class="bx form-control" placeholder="Enter Item Name" required />
                    <label>Measurment Unit:</label>
                        <input type="text" name="unit" class="bx form-control" placeholder="Enter Measurment Unit" required/>
                    <label>MRP:</label>
                        <input type="text" name="mrp" class="bx form-control" placeholder="Enter MRP"/>
                    <label>Selling Price:</label>
                        <input type="text" name="sell" class="bx form-control" placeholder="Enter Selling Price" required/>
                    <div>
                        <tr>   
                            <td>
                                <input type="submit" class="btn btn-outline-success" value="Submit" />
                            </td>
                            <td>
                                <input type="reset" class="btn btn-outline-danger" value="Cancel" />
                            </td>
                        </tr>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 welcome">
                <label>Welcome</label>
                <p class="py-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, iure laudantium saepe maxime ullam quia enim repudiandae veniam. Commodi debitis illum error officiis magnam ad hic doloribus cupiditate dolores assumenda!</p>
                <input type="submit" class="btn btn-outline-success" value="About Us" />                   
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row py-5">
            <div class="col-sm-12">
                <?php
                    if(isset($_GET['name']))
                    {
                    //form is filled so, save the form record
                    try{
                        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        //prepare statements
                        $stmt=$conn->prepare("insert into menuitem(name, unit, mrp, sell) values(:name, :unit, :mrp, :sell)");
                        //bind values
                        $stmt->bindValue(':name',$_GET['name']);
                        $stmt->bindvalue(':unit',$_GET['unit']);
                        $stmt->bindvalue(':mrp',$_GET['mrp']);
                        $stmt->bindvalue(':sell',$_GET['sell']);
                        //execute statement
                        $stmt->execute();
                        //for message
                        echo'<h2 class="text-center text-danger">Added Successfully...</h2>'; 

                    }catch(Exception $ex)
                    {
                        echo'<h2 class="text-center text-success">'.$ex->getMessage()."</h2>";
                    } 
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>