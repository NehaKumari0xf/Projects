<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaya College Gaya</title>
    
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
    </div>

    
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-sm-12">
                <?php
                if(isset($_GET['name']))
                {
                    //form is filled so, save the form record
                    try{

                        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        // 2 create prepare statement
                        $stmt=$conn->prepare("insert into new(name,gender,email,phone,subject) values(:name,:gender,:email,:phone,:subject)");
    
                        // bind values
                        $stmt->bindValue(':name',$_GET['name']);
                        $stmt->bindValue(':gender',$_GET['gender']);
                        $stmt->bindValue(':email',$_GET['email']);
                        $stmt->bindValue(':phone',$_GET['phone']);
                        $stmt->bindValue(':subject',$_GET['subject']);
    
                        // execute Statement
                        $stmt->execute();
                        echo '<h1 class="text-center text-success">Student Added Successfully.</h1>';
    
                    }catch(Exception $ex)
                    {
                        echo '<h1 class="text-center text-danger">'.$ex->getMessage()."</h1>";
                    }
                }
                ?>

            </div>
        </div>

        
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="index.php" method="get">
                    <label >Student Name: </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required/>
                    <label>Gender:  </label>
                        <input type="radio" value="m" name="gender" checked id="mr"/><label>Male</label>
                        <input type="radio" value="f" name="gender" id="fr"/><label>Female</label><input type="radio" value="f" name="gender" id="fr"/><label>Transgender</label><br/>
                    <label >E-mail: </label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email" required/>
                    <label >Phone Number: </label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter your Phone number" required/>         
                    <label >Course: </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter your Course" required/>
                    <div>
                        <tr><td><input type="reset" class="btn btn-danger"/></td><td><input class="btn btn-success" type="Submit" value="Submit"/></td></tr>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    
</body>
</html>