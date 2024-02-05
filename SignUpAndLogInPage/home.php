<?php
session_start();
if(!isset($_SESSION['uid']))
header("location:signin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Page</title>
    <?php include 'bootstrap.php';?>
</head>
<body>
<?php include 'navigation.php';?>
<h1>Welcome <?= $_SESSION['uid'] ?> (<?php 
if($_SESSION['gender']=='m')
{
    echo "Mr. ";
}
else 
{
    echo "Miss ";
}
echo $_SESSION['uname'];
?>)</h1>
<</body>
</html>