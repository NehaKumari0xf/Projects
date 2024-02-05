

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
        
        $con=new PDO("mysql:host=localhost;dbname=ricla;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //validate user id
        $stmt=$con->prepare("select * from useraccounts where uid=:uid and pwd=:pwd");
        $stmt->bindValue(":uid",$_SESSION['uid']);
        $stmt->bindValue(":pwd",$_POST['cpassword']);
        $stmt->execute();
        $users=$stmt->fetchAll();
        if(count($users)==1)
        {
            $stmt=$con->prepare("update useraccounts set pwd=:pwd where uid=:uid");
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
            $errmsg="Invalid Current Password. Attempt ".($_SESSION['changeAttempt']+1)."/3";
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
</head>
<body>
    <?php include 'navigation.php';?>
    <h1>Change Password</h1>
    <form action="changePassword.php" method="post">
        <table>
            <?php
            if($errmsg!="")
            {
                echo '<tr><td colspan="2">'.$errmsg.'</td></tr>';
            }
            ?>
            <tr>
                <td><label >Enter current password:</label></td>
                <td><input type="password" name="cpassword" reequired/></td>
            </tr>
            <tr>
                <td><label >Enter new password</label></td>
                <td><input type="password" name="npassword" id="npassword" required/></td>
            </tr>
            <tr>
                <td><label >Confirm new password</label></td>
                <td><input type="password" id="cnpassword" required/></td>
            </tr>
            <tr>
                <td><input type="reset"></td>
                <td><input type="submit" value="Change Password"></td>
            </tr>
        </table>
    </form>
</body>
</html>