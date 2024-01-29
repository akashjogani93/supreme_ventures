<?php
require_once('../dbcon.php');

if(isset($_POST['cid']))
{
    $cid = $_POST['cid'];
    $fddate = $_POST['fddate'];
    $invest = $_POST['invest'];
    $year = $_POST['year'];
    $q="INSERT INTO `fd`(`cid`,`amount`,`date`,`year`)VALUES('$cid','$invest','$fddate','$year')";
    $conform=mysqli_query($conn,$q);
    echo 'invested';
}


if(isset($_POST['submit']))
{
    $query="SELECT `register`.`full`,`fd`.* FROM `register`,`fd` WHERE `register`.`cid`=`fd`.`cid`";
    $conform=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($conform))
    {
         ?>
            <tr>
                <td><?php echo $row['fd_id']; ?></td>
                <td><?php echo $row['full']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
         <?php
    }
}   
?>