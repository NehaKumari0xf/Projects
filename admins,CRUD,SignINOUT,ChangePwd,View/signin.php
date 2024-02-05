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
        $con=new PDO("mysql:host=localhost;dbname=registrations;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //validate user id
        $stmt=$con->prepare("select * from clients where clientid=:uid and pwd=:pwd");
        $stmt->bindValue(":uid",$_POST['uid']);
        $stmt->bindValue(":pwd",$_POST['pwd']);
        $stmt->execute();
        $users=$stmt->fetchAll();
        if(count($users)==1)
        {
            session_start();
            $_SESSION['uid']=$users[0]['clientid'];
            $_SESSION['cname']=$users[0]['cname'];
            $_SESSION['gender']=$users[0]['gender'];
            header("location:index.php");
        }
        else
        {
            $errmsg="<b>Invalid user id or password.</br> Attempt:".($_COOKIE['attempt']+1)."/5</b>";
            

        }

    }catch(Exception $ex)
    {
        $errmsg=$ex->getMessage();
    }
}
?>

<!doctype html>
<html>
    <head>
        <title>Sign in</title>
        <?php include 'bootstrap.php';?>

    </head>
    <body>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center my-3 py-3">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg></div>
        <?php
        if($errmsg!="")
        {
            echo '<p class="text-danger text-center" class="text-center">'.$errmsg.'</p>';
        }

        if(isset($_GET['signup']))
        {
            echo '<p class="text-success"> User created successfully with id <b>'.$_GET['uid'].'</b></p>';

        }

        if(isset($_GET['pwd'])&& $_GET['pwd']=="1")
        {
            echo '<p class="text-success"> Password changed successfully. Re-login with new password.</p>';
        }

        ?>
        <form action="signin.php" method="post">
                <input type="text" placeholder="Username" class="form-control my-5 py-5" name="uid" value="<?php 
                    if(isset($_GET['uid']))
                    {
                    echo $_GET['uid'];
                    }?>" required/>
                <input type="password" name="pwd" placeholder="Password" class="form-control my-5 py-5" required/>
                <div class="text-center ">
                <input class="btn btn-primary btn-lg" type="submit" value="Sign in">
                    <a href="signup.php"  class="nav-link">Don't have an account ? <b> Sign up</b></a>
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


