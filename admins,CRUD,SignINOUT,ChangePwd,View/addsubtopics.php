<?php
session_start();
// get all topic name
$alltopics=null;
$msg="";
$msgType="";
$selectedTopicId=1;
$topicName="";
include "connection.php";

 if(!isset($_SESSION['uid']))
    {
     header("location:signin.php");
    }
try{
    $stmt=$con->prepare("select * from topics order by tname");
    $stmt->execute();
    $alltopics=$stmt->fetchAll();

    //save data to table if form data received
   if(isset($_GET['tid']))
   {
    //get name of topic 
    $stmt=$con->prepare("Select * from topics where tid=:ti");
    $stmt->bindValue(":ti",$_GET['tid']);
    $stmt->execute();
    $rset=$stmt->fetch();
    $topicName=$rset['tname'];

    //check subtopic is already available or not
    $stmt=$con->prepare("select count(*) as tr from subtopics where subtopic=:stn and tid=:tid");
    $stmt->bindValue(":stn",$_GET['stname']);
    $stmt->bindValue(":tid",$_GET['tid']);
    $stmt->execute();
    $rset=$stmt->fetch();
    if($rset['tr']>=1)
    {
        //subtopic is already available
        $msg=" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning!</strong> Sub Topic (".$topicName."->".$_GET['stname'].") already available";
        $msgType="alert alert-warning alert-dismissible";

    }
    else{    
    $stmt=$con->prepare("insert into subtopics(subtopic,tid) values(:stn,:ti)");
    $stmt->bindValue(":stn",ucwords($_GET['stname']));
    $stmt->bindValue(":ti",$_GET['tid']);
    $stmt->execute();    
    $msg=" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> New Sub Topic (".$topicName."->".$_GET['stname'].") addedd successfully.";
    $msgType='alert alert-success alert-dismissible
    ';
    }
   } 

}catch(Exception $ex)
{
    $msg=$ex->getMessage();
    $msgType="alert alert-danger alert-dismissible";
}
//handle message
?>

<!doctype html>
<html>
<head>
    <title>Add New Subtopic</title>
    <?php include "bootstrap.php"; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php include "navigation.php"; ?>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-6"><h1>Add New Sub Topic</h1></div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <div class="<?=$msgType?>" role="alert">
                <?=$msg?>
            </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="addsubtopics.php" method="get">
                    <div class="row py-3">
                        <div class="col-sm-6 "><label>Select Topic</label></div>
                        <div class="col-sm-6"><select name="tid" class="form-control">
                        <?php $selected="";
                            $selectedTopicId=$alltopics[0]['tid'];
                            foreach($alltopics as $topic)
                            {
                                if(isset($_GET['tid'])&&$_GET['tid']==$topic['tid'])
                                {
                                    $selected="selected";
                                    $selectedTopicId=$_GET['td'];
                                } 
                                
                                 else
                                 $selected="";   
                                echo '<option value="'.$topic['tid'].'" '.$selected.' >'.$topic['tname'].'</option>';
                            }?>
                        </select></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-sm-6"><label>Enter subtopic Name:</label></div>
                        <div class="col-sm-6"><input type="text" required class="form-control" name="stname"/></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-sm-6"><input type="reset" class="btn btn-primary"/></div>
                        <div class="col-sm-6"><input type="submit" class="btn btn-success" value="Save"/></div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <div style="height:200px;width:100%;">
            <?php
            try{
                $stmt=$con->prepare("select * from subtopics where topicid=:ti");
                $stmt->bindValue(":ti",$selectedTopicId);
                $stmt->execute();
                $recs=$stmt->fetchAll();
                ?>
                <table class="table">
                    <thead>
                        <tr><th colspan="3">Subtopics of <?=$topicName?></th></tr>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sub Topic ID</th>
                        <th scope="col">Sub Topic Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                <?php
                    $srno=1;
                    foreach($recs as $topic)
                    {
                        echo '<tr><th scope="row">'.$srno.'<td>'.$topic['subtopicid'].'</td><td>'.$topic['subtopicname'].'</td></tr>';
                        $srno++;
                    }
                    echo '</tbody></table>';
                    

            }
            catch(Exception $ex)
            {

            }
            ?>
            </div>
            <div>
            <div class="col-sm-3"></div>
        </div>

    </div>
    
</body>
</html>