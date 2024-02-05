<?php
$errmsg="";
session_start();
if(!isset($_SESSION['uid']))
{
    header("location:login.php");
}


if(isset($_POST['cpassword']))
{
    if(!isset($_SESSION['changeAttempt']))
        {
            $_SESSION['changeAttempt']=1;
        }
        else
        {
            $_SESSION['changeAttempt']=$_SESSION['changeAttempt']+1;
        }

    try
    {
        
        $con=new PDO("mysql:host=localhost;dbname=registrations;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //validate user id
        $stmt=$con->prepare("select * from clients where clientid=:uid and pwd=:pwd");
        $stmt->bindValue(":uid",$_SESSION['uid']);
        $stmt->bindValue(":pwd",$_POST['cpassword']);
        $stmt->execute();
        $users=$stmt->fetchAll();
        if(count($users)==1)
        {
            $stmt=$con->prepare("update clients set pwd=:pwd where clientid=:uid");
            $stmt->bindValue(":uid",$_SESSION['uid']);
            $stmt->bindValue(":pwd",$_POST['npassword']);
            $stmt->execute();
            // password changed so logout the current user.
            session_unset();
            session_destroy();
            header("location:signin.php?pwd=1&uid=".$_SESSION['uid']);

        }
        else
        {
            $errmsg="Invalid Current Password.<br/> Attempt ".($_SESSION['changeAttempt']+1)."/3";
            if($_SESSION['changeAttempt']==3)
            {
                //log out current user
                session_unset();
                session_destroy();
                header("location:signin.php");
            }
        }
    }catch(Exception $ex)
    {
        $errmsg=$ex->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change Password</title>
    <?php include 'bootstrap.php';?>
</head>
<body>
    <?php include 'navigation.php';?>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center my-3 py-3">  
                            <h1>Change Password</h1>
                        </div>
    <form action="changePassword.php" method="post">
            <?php
            if($errmsg!="")
            {
                echo '<tr><td colspan="2"><p  class="text-center text-danger"><b>'.$errmsg.'</b></p></td></tr>';
            }
            ?>
            <input type="password" placeholder="Current Password" class="form-control my-4 py-5" name="cpassword" reequired/></td>
            <input type="password" placeholder="New Password" class="form-control my-4 py-5" name="npassword" id="npassword" required/></td>
            <input type="password" placeholder="Confirm Password" class="form-control my-4 py-5" id="cnpassword" required/></td>
            <div class="col-sm-6 my-3 text-center">
                <input class="btn btn-danger btn-lg" type="reset" value="Cancel">
            </div>
            <div class="col-sm-5 my-3 text-center ">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit">
            </div>
    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>