<?php
session_start();
if(!isset($_SESSION['uid']))
header("location:signin.php");
?>
<!doctype html>
<html>
<head>
<title>Ricla Home</title>
<?php include "bootstrap.php"; ?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php include "navigation.php"; ?>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-12 mg">
        <h1><b>Welcome,<i> <?= $_SESSION['uid'] ?> (<?php 
        if($_SESSION['gender']=='m')
        {
            echo "Mr. ";
        }
        else 
        {
            echo "Miss ";
        }
            echo $_SESSION['cname'];
        ?>)</i></b></h1>
    </div>
</div>
</body>
</html>