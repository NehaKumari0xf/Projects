<?php
$errmsg="";
$msg="";
if(isset($_POST['uid']))
{
    //validate user data from db
    try
    {

        $con=new PDO("mysql:host=localhost;dbname=ricla","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt=$con->prepare("select * from registration where uid=:uid and pwd=:pwd");
        $stmt->bindValue(":uid",$_POST['uid']);
        $stmt->bindValue(":pwd",$_POST['pwd']);

        $stmt->execute();
        $results=$stmt->fetchAll();

        if(count($results)==1)
        {
            session_start();
            $_SESSION['aid']=$results[0]['aid'];
            header("location:index.php");
        }
        else
        {
            $errmsg="Invalid user id or password";
        }
    }
    catch(Exception $ex)
    {
        $errmsg=$ex->getMessage();
    }
}
else if(isset($_GET['id']))
{
    if($_GET['id']==1)
    {
        $msg="You have logged out successfully.";
    }
    else if($_GET['id']==0)
    {
        $msg="You are already logged out.";
    }
}
?>

<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <?php include 'bootstrap.php';?>            
    <?php include 'navigation.php';?>            

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function hideMessage()
            {
                //alert("hello");
                $("#msgdisplay").fadeOut(5000);
            }
        </script>
</head>
<body onload="hideMessage();">

    <div style="height:40px;">
        <div id="msgdisplay">
        <?php
        if($errmsg!="")
        {
            echo '<p style="color:red">'.$errmsg.'</p>';
        }
        else if($msg!="")
        {
            echo '<p style="color:green">'.$msg.'</p>';   
        }
        ?>
        </div>
    </div>

    <!-- Button to open the modal login form -->
<button onclick="document.getElementById('id01').style.display='block'">Login</button>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="post" action="nav.php">
    
    <div class="container">
      <label for="uname"><b>User id</b></label>
      <input type="text" placeholder="Enter Username" name="uid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="showInputPwd" placeholder="Enter Password" name="pwd"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <label>
      
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

</body>
</html>