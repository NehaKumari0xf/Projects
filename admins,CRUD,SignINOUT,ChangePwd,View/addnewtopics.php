<?php
$err="";
$msg="";
session_start();
if(!isset($_SESSION['uid']))
{
    header("location:signin.php");
}
//process for adding new topic
if(isset($_POST['topic']))
{
    try
    {
        $con=new PDO("mysql:host=localhost;dbname=registrations;","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //check topic is already available or not
        $stmt=$con->prepare("select * from topics where tname=:tn");
        $stmt->bindValue(':tn',strtoupper($_POST['topic']));
        $stmt->execute();
        $recs=$stmt->fetchAll();
        if(count($recs)==0)
        {
            //topic not availabe so add it to table
            $stmt1=$con->prepare("insert into topics(tname) values(:tn)");
            $stmt1->bindValue(":tn",strtoupper($_POST['topic']));
            $stmt1->execute();
            $msg="New Topic added successfully.";
        }
        else
        {
            $err="This topic is already available.<br/>Choose another topic.";
        }


    }catch(Exception $ex)
    {
        $err=$ex->getMessage();
    }
}

?>
<!doctype html>
<html>
    <head>
        <title>Add new Topic</title>
        <?php include 'bootstrap.php';?>
    </head>
    <body>
        <?php include "navigation.php"; ?>
        <section>
        <div class="container mt-5 pt-5">
            <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                    <div class="text-center my-3 py-3">  
                        <h1>Add new Topics</h1>
                    </div>
                    <?php
                        if($err!="")
                        { echo '<p class="text-danger text-center"><b>'.$err."</b></p>"; }
                        if($msg!="")
                        { echo '<p class="text-success text-center"><b>'.$msg."</b></p>"; }
                    ?>
                        
        <form method="post" action="addnewtopics.php">
            <input type="text" name="topic" class="form-control my-4 py-5" placeholder="Enter new topic" required/><br/>
            <div class="col-sm-12 my-3 text-center ">
                <input class="btn btn-primary btn-lg" type="submit" class="tab" value="Add"/>
            </div>
        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    </body>
</html>