<?php
$errmsg="";
$msg="";
if(isset($_POST['fname']))
{
    //validate user data from db
    try
    {

        $con=new PDO("mysql:host=localhost;dbname=ricla","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       //check the uid is available or not
       $stmt=$con->prepare("select * from registration where uid=:usid ");
       $stmt->bindValue(":usid",$_POST['userid']);
       $stmt->execute();
       $recs=$stmt->fetchAll();
       if(count($recs)==0)
       {
       
        $stmt=$con->prepare("insert into registration(fname,lname,email,pwd,uid) values(:fname,:lname,:email,:pwd,:usid)");
        $stmt->bindValue(":usid",$_POST['userid']);
        $stmt->bindValue(":pwd",$_POST['pwd']);
        $stmt->bindValue(":fname",$_POST['fname']);
        $stmt->bindValue(":lname",$_POST['lname']);
        $stmt->bindValue(":email",$_POST['email']);        

        $stmt->execute();
        header("location:index.php");
      }
      else
      {
        $errmsg="This id is already taken. Please choose a diffrent id.";
      }
  }
    catch(Exception $ex)
    {
        $errmsg=$ex->getMessage();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<?php include 'bootstrap.php';?>            
</head>

<body>
<?php include 'navigation.php';
if ($errmsg!="" )
{
  echo"<p>". $errmsg.'</p>';
}
?>            
<form  method="post" action="signup.php">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr/>
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter Username" id="fname" name="fname" required value="<?php
          if(isset($_POST['fname'])) echo $_POST['fname'];
  ?>" />

      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Username" id="lname" name="lname" required value="<?php
                if(isset($_POST['lname'])) echo $_POST['lname'];
      ?>"/>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" id="email" required value="<?php
                if(isset($_POST['email'])) echo $_POST['email'];
?>                "/>

      <label for="userid"><b>User id</b></label>
      <input type="text" placeholder="Enter User id" name="userid" id="userid" required/>

      <label for="pwd"><b>Password</b></label>
      <input type="password" id="showInputPwd" placeholder="Enter Password" name="pwd"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
      <label>
        <input type="checkbox"  onclick="myInputPwdFunction()" style="margin-bottom:15px"/> Show Password
      </label><br/>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="RepeatPwd" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"/> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <input type="submit" value="signup" />
    
  </form> 
<!-- Button to open the modal 
<button onclick="document.getElementById('id01').style.display='block'">Sign Up</button>

 The Modal (contains the Sign Up form) 
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">x</span>
  <form class="modal-content" method="post" action="signup.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter Username" id="fname" name="fname" required />

      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Username" id="lname" name="lname" required/>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" id="email" required/>

      <label for="userid"><b>User id</b></label>
      <input type="text" placeholder="Enter User id" name="userid" id="userid" required/>

      <label for="pwd"><b>Password</b></label>
      <input type="password" id="showInputPwd" placeholder="Enter Password" name="pwd"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
      <label>
        <input type="checkbox"  onclick="myInputPwdFunction()" style="margin-bottom:15px"/> Show Password
      </label><br/>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="RepeatPwd" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"/> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <input type="submit" value="signup" class="signup" />
    </div>
  </form>
</div>
--->
</body>
</html>