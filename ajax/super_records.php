<?php 
    include('../dbcon.php');
    if(isset($_POST['submit']))
    {
        $full1=$_POST['full1'];
        if($full1=='full1')
        {
            $query="SELECT * FROM `invest`";
        }
        else
        {
            $query="SELECT * FROM `invest` WHERE `cid`='$full1'";
        }
        $exc=mysqli_query($conn,$query);
        $new1=0; $wamt1=0;
        while($con=mysqli_fetch_array($exc))
        {
            $new=$con['invest'];
            $new1=$new+$new1;
           
        }


        echo json_encode($new1);
        mysqli_close($conn);
    }
    if(isset($_POST['withdraw']))
    {
        $full1=$_POST['full1'];
        if($full1=='full1')
        {
            $query="SELECT * FROM `widraw`";
        }
        else
        {
            $query="SELECT * FROM `widraw` WHERE `cid`='$full1'";
        }
        $exc=mysqli_query($conn,$query);
        $wamt1=0;
        while($con=mysqli_fetch_array($exc))
        {
            $wamt=$con['wamt'];
            $wamt1=$wamt+$wamt1;
           
        }


        echo json_encode($wamt1);
        mysqli_close($conn);
    }
    
    if(isset($_POST['interest']))
    {
        
        $full1=$_POST['full1'];
        if($full1=='full1')
        {
            $query="SELECT * FROM `widraw`";
        }
        else
        {
            $query="SELECT * FROM `widraw` WHERE `cid`='$full1'";
        }
        $exc=mysqli_query($conn,$query);
        $wamt1=0;
        while($con=mysqli_fetch_array($exc))
        {
            $wamt=$con['wamt'];
            $wamt1=$wamt+$wamt1;
           
        }


        echo json_encode($wamt1);
        mysqli_close($conn);
    }
?>