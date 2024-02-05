<?php
session_start();
if(isset($_SESSION['aid']))
{
    session_unset();
    session_destroy();
    header("location:login.php?id=1");
    
}
 else
 {
    header("location:login.php?id=0");
 }

?>
 <?php
     include "navigation.php";
    ?>