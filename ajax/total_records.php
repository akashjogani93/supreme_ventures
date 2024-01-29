<?php 
    include('../dbcon.php');
    if(isset($_POST['submit']))
    {
        // $dd=$_POST['submit'];
        // echo $dd;

        $query="SELECT * FROM `invest`";
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
        // $dd=$_POST['submit'];
        // echo $dd;

        $query="SELECT * FROM `widraw`";
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
        
        $query="SELECT * FROM `widraw`";
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