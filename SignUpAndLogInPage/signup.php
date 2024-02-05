<?php
$errmsg="";
if(isset($_POST['uname']))
{
    //validate user data from database
    try
    {
        //connection to db
        $conn=new PDO("mysql:host=localhost;dbname=ricla","root","");
        //check any error to db connection
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("select * from useraccounts where uid=:uid");
        $stmt->bindValue(":uid",$_POST['uid']);
        $stmt->execute();
        $results=$stmt->fetchAll();
        //check duplicate user id
        if(count($results)>0)//
        {
            $errmsg="This user id is already taken. Please choose another id.";
        }
        else
        {
            //add user to users table
            $stmt=$conn->prepare("insert into useraccounts(uid,pwd,email,uname,gender) values(:uid,:password,:emailid,:uname,:gender)");
            $stmt->bindvalue(":uid",$_POST['uid']);
            $stmt->bindvalue("password",$_POST['pwd']);
            $stmt->bindvalue("emailid",$_POST['email']);
            $stmt->bindValue(":uname",$_POST['uname']);
            $stmt->bindValue(":gender",$_POST['gen']);

            $stmt->execute();
            //redirect
            header("location:signin.php?signup=1&uid=".$_POST['uid']);

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
    <script>
        function validatePwd()
        {
            var pwd=document.getElementById("pwd").value;
            var cpwd=document.getElementById("cpwd").value;

            if(pwd!=cpwd)
            {
                alert("Password and Confirm Password must be same");
                return false;
            }
            return true;
        }
       
    </script>
</head>
<body>
    <?php 
    include 'nav.php';
    //in case body part have an error issues
    if ($errmsg!="" )
    {
        echo "<script> alert('".$errmsg.'");</script>';
    }
    ?>
    <form method="post" action="signup.php"  onsubmit="return validatePwd()">
    <h1><b>Sign up</b></h1><br/>
    <label>Name:</label></td>
            <input type="text" name="uname" required value="<?php
                if($errmsg!="")
                {
                    echo $_POST['uname'];
                }
                ?>"
                />
        <label>Gender:</label>
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
                    }
                    ?>/>Female
        <label><b>E-mail</b> </label>
            <input type="email" name="email" placeholder="Enter your E-mail" value="<?php
            if(isset($_POST['email'])) 
            echo $_POST['email']?> " required/><br/>
        <label><b>User id</b> </label>
            <input type="text" name="uid" id="uid" placeholder="Enter your user id"  required/><?php
                if($errmsg!="")
                {
                    echo '<del style="color:red;"><b>'.$_POST['uid'].'</b></del> is already taken. Please select a diffrent user id.';
                } ?><br/>
        <label><b>Password</b> </label>
            <input type="password" name="pwd" id="pwd" placeholder="Enter your Password" required/>
        <label><b>Confirm Password</b> </label>
            <input type="password" name="cpwd" id="cpwd" placeholder="Confirm your Password" required/>
        <button type="submit">Sign up</button><p class="text-center">----------------------------- x ----------------------------</p>
        <pre class="t2 text-center">Already have an account? <a class="nav-link" href="signin.php" ><b>Log in</b></a> 
     </pre> 
    </form>
</body>
</html>

