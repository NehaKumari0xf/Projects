
<?php
$errmsg="";
if(!isset($_COOKIE['attempt']))
    {
            //set cookie with attempt 1
            setcookie("attempt","1",time()+120,"/");

    }
    else
    {
        if($_COOKIE['attempt']>=5)
        {
                header("location:signinlocked.html");
        }    }
if(isset($_POST['uid']))
{
    if(!isset($_COOKIE['attempt']))
    {
            //set cookie with attempt 1
            setcookie("attempt","1",time()+120,"/");

    }
    else
    {
        
        //increase cookie attempt by 1
        $counter=$_COOKIE['attempt']+1;
        setcookie("attempt",$counter,time()+120,"/");

    }
    try
    {
        $con=new PDO("mysql:host=localhost;dbname=ricla;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //validate user id
        $stmt=$con->prepare("select * from useraccounts where uid=:uid and pwd=:pwd");
        $stmt->bindValue(":uid",$_POST['uid']);
        $stmt->bindValue(":pwd",$_POST['pwd']);
        $stmt->execute();
        $users=$stmt->fetchAll();
        if(count($users)==1)
        {
            session_start();
            $_SESSION['uid']=$users[0]['uid'];
            $_SESSION['uname']=$users[0]['uname'];
            $_SESSION['gender']=$users[0]['gender'];
            header("location:navigation.php");
        }
        else
        {
            $errmsg="Invalid user id or password. Attempt:".($_COOKIE['attempt']+1)."/5";
            

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
    <title>Document</title>
    <?php include 'bootstrap.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function hideMessage()
            {
                $("#msgdisplay").fadeOut(5000);
            }
        </script>
</head>
<body onload="hideMessage();">
<?php include 'nav.php';
if($errmsg!="")
{
    echo '<p style="color:red">'.$errmsg.'</p>';
}?>
<div style="height:40px;">
        <div id="msgdisplay">
        <?php
         if(isset($_GET['signup']))
        {
            echo '<p style="color:green">User created successfully with id <b>'.$_GET['uid'].'</b></p>';   
        }
        if(isset($_GET['pwd']) && $_GET['pwd']=="1")
        {
            echo '<p style="color:green"> Password changed successfully. Re-login with new password.</p>';
        }
        ?>
        </div>
    </div>
    
    <form method="post" action="signin.php">
        <h1><b>Log in</b></h1><br/>
        <label><b>User id</b> </label>
            <input type="text" name="uid" id="uid" placeholder="Enter your user id"  value="<?php
                if(isset($_GET['uid']))
                {
                    echo $_GET['uid'];
                }
                ?>" required/><br/>
        <label><b>Password</b> </label>
            <input type="password" name="pwd" placeholder="Enter your Password" required/>
        <button type="submit">Log in</button><p class="text-center">----------------------------- x ----------------------------</p>
    <pre class="t2">      <a href="changePassword.php" class="nav-link" ><b>Forgot Password</b></a>     Need an account? <a href="signup.php" class="nav-link"><b>Sign Up</b></a>     
    </pre> 
    </form>
</body>
</html>



