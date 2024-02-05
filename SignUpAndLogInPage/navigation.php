<?php
session_start();
?>


<nav>
    <ul>
        <li>
            <a href="changePassword.php">password</a>
        </li>
        <li>
            <a href="signin.php">login</a>
        </li>
        <li>
            <a href="logout.php">logout</a>
        </li>
    </ul>
</nav>
<!doctype html>
<html>
<head>
<title>Home</title>
</head>
<body>

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
</body>
</html>