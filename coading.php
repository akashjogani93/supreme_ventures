<?php
include("dbcon.php");
session_start();
if(isset($_POST['Schedule']))
{
    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $start_time=date('Y-m-d h:i:s',strtotime($_POST['start']));
   	$end_time=date('Y-m-d h:i:s',strtotime($_POST['end']));
    $_SESSION["endtime"]=$end_time;
    $query ="INSERT INTO `log_permission`(`set_time`,`end_time`,`user`) VALUES ('$start_time','$end_time','admin');";
     $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    //echo '<script> window.location= "all_report.php";</script>';
  	header("Location: log_Information.php");
}


if(isset($_GET['stop']))
{
    // echo $_GET['stop'];
    date_default_timezone_set("Asia/Kolkata");
    $start_time=date('Y-m-d h:i:s');
     // echo $start_time;
    $end_time = date('Y-m-d h:i:s',strtotime('-1 minutes',strtotime($start_time)));
    $_SESSION["endtime"]=$end_time;
    //echo $end_time;
    $query ="UPDATE `log_permission` SET `end_time`='$end_time' ORDER BY `log_per_id` DESC LIMIT 1;";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    echo '<script> window.location= "log_Information.php";</script>';

}
?>