<?php
session_start();

if(!isset($_SESSION['aid']))
{
    header("location:navigation.php");
}

//user is already logged in
?>
<!doctype html>
<html>
    <head>
        <title>Home</title>
</head>
<body>
</body>
</html>

