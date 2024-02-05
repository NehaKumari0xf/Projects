<?php
$errmsg="";
if(isset($_POST['cname']))
{
    try{
        $con=new PDO("mysql:host=localhost;dbname=registrations;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //validate user id
        $stmt=$con->prepare("select * from clients where clientid=:uid");
        $stmt->bindValue(":uid",$_POST['uid']);
        $stmt->execute();
        $users=$stmt->fetchAll();
        if(count($users)>0)
        {
            $errmsg="<p class='text-danger text-center'><b>User id is already in use. <br/>Please select a different user id.</b></p>";
        }
        else
        {
            //add user to users table
            $stmt=$con->prepare("insert into clients(cname,gender,email,clientid,pwd) values(:cname,:gender,:email,:uid,:pwd)");
            $stmt->bindValue(":cname",$_POST['cname']);
            $stmt->bindValue(":gender",$_POST['gen']);
            $stmt->bindValue(":email",$_POST['email']);
            $stmt->bindValue(":uid",$_POST['uid']);
            $stmt->bindValue(":pwd",$_POST['pwd']);
            $stmt->execute();
            header("location:signin.php");
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
    <?php include 'bootstrap.php';?>

        <title>Signup</title>
        <script>
            function validate()
            {
                var pwd=document.getElementById("pwd").value;
                var cpwd=document.getElementById("cpwd").value;

                if(pwd!=cpwd)
                {
                    alert ("Password and Confirm Password must be same");
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body><section>
        <div class="container mt-5 ">
            <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center my-3 py-3">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg></div>
            <?php if($errmsg!="")
                {
                    echo '<tr><td colspan="2" style="color:red; class="text-center"">'.$errmsg.'</td></tr>';
                }?>   
            <form action="signup.php" method="post" onsubmit="return validate()">                
                <input placeholder="Name" class="form-control my-3 py-2"  type="text" name="cname" required value="<?php
                    if($errmsg!="")
                    {
                        echo $_POST['cname'];
                    }?>"/>
                <input type="radio" name="gen" value="m" <?php
                    if($errmsg!="")
                    {
                        if($_POST['gen']=='m')
                        echo "checked";
                    }
                    else
                    echo "checked";
                    ?>/>Male 
                    <input type="radio" name="gen" value="f"
                    <?php
                    if($errmsg!=""&&$_POST['gen']=='f')
                    {
                        echo "checked";
                    }?>/>Female
                <input placeholder="E-mail" class="form-control my-3 py-2"  type="email" name="email" required
                value="<?php
                if($errmsg!="")
                {
                    echo $_POST['email'];
                }
                ?>"/>
                <input type="text" placeholder="Username" class="form-control my-3 py-3"  name="uid" required/><?php
                if($errmsg!="")
                {
                    echo '<del class="text-danger " ><b>'.$_POST['uid'].'</b></del>';
                }
                ?>
                <input type="password" placeholder="Password" class="form-control my-3 py-2"  name="pwd" id="pwd" required/></td></tr>
                <input type="password" placeholder="Confirm Password" class="form-control my-3 py-2"  required id="cpwd"/></td></tr>
                <div class="text-center ">
                <input class="btn btn-primary btn-lg" type="submit" value="Sign up">
                    <a href="signin.php"  class="nav-link">Already have an account ? <b>Sign in<b></a>
                </div>
            </table>
        </form>
            </div>
            </div>
        </div>
    </body>
</html>