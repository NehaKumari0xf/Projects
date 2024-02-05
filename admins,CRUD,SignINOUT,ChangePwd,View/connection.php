<?php
$con=null;
try{
    $con=new PDO("mysql:host=localhost;dbname=registrations;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $ex)
{
    echo $ex->getMessage();
}
?>