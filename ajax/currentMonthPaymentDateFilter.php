<?php include('../dbcon.php');
?>

<?php
if(isset($_POST['Submit']))
{
    $start=$_POST["fromdate"];
    $end=$_POST["todate"];
    $sql="SELECT * FROM `register` ORDER BY `cid` ASC";
    $today=date("d-m-Y");
    $srch_date=date_diff1($today,$start);
    $retval=mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($retval)) 
    {
            $cid=$row['cid'];
            $full=$row['full'];
            $bank=$row['bank'];
            $account=$row['account'];
            $ifsc=$row['ifsc'];
            $invest=0;
            $total=0;$total1=0;
            $sql1="SELECT * FROM `invest` WHERE `cid`='$cid' AND `regdate`<='$end'";
            $reteval1=mysqli_query($conn,$sql1);
            $result = mysqli_num_rows($reteval1);
            if($result==0)
            {
                $total=0;
            }
            else
            {
                while($row1=mysqli_fetch_array($reteval1))
                {
                    $id=$row1['id'];
                    $invest_date=$row1['regdate'];

                        $w_value=widraw($conn,$id,$end);
                        $invest=$invest+$row1['invest'];
                        $days=date_calculation($invest_date,$start,$end,$srch_date);

                    $invest1=$row1['invest']+$w_value;
                    $perc=$row1['asign'];
                    $monthint=(($invest1*$perc/100)/30);
                
                    $month_intres=$monthint*$days;

                    $total=$total + $month_intres;
                }
                
            }
            if($invest==''){$inv="-"; }else { $inv=$invest; }
            $query="SELECT `referal`.`refasign`,`invest`.`id`,`invest`.`regdate`,`invest`.`invest` FROM `referal`,`invest` WHERE `referal`.`id`=`invest`.`id` AND `referal`.`refcid`='$cid' AND `invest`.`regdate`<'$end'";
            $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            while($out=mysqli_fetch_array($confirm))
            {
                $id=$out['id'];
                $invest_date1=$out['regdate'];
                $w_value=widraw($conn,$id,$end);
                $days1=date_calculation($invest_date1,$start,$end,$srch_date);
                
                $amt=$out['invest']+$w_value;
                $perc=$out['refasign'];
                $day_amt=(($amt*$perc/100)/30);

                
                $month_intres1=$day_amt*$days1;
                $total1=$total1 + $month_intres1;
            }  
            $pay=$total1+$total;
            if($pay>0)
            {
                ?>
                <tr>
                    <td><?php echo $cid; ?></td>
                    <td><?php echo $full; ?></td>
                    <td><?php echo round($pay); ?></td>
                    <td><?php echo $bank; ?></td>
                    <td><?php echo $account; ?></td>
                    <td><?php echo $ifsc; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($end));?></td>
                    </tr>
                <?php
                
            }
    }
}



//if widrw amount is taken by future days 
function widraw($conn,$id,$end)
{
    $w_value=0;
    $q="SELECT `wamt` FROM `widraw` WHERE `inv_id`='$id' AND `wdate`>'$end';";
    $cfm = mysqli_query($conn,$q) or die(mysqli_error());
    $result = mysqli_num_rows($cfm);
    if($result>0)
    {
        $data=mysqli_fetch_array($cfm);
        $w_value=$data['wamt'];
    }
    return($w_value);
}

//function thats gives number days bettween two dates
function date_calculation($invest_date,$start,$end,$srch_date)
{
        $today=date("d-m-Y");
        $i_days=date_diff1($today,$invest_date);
        if($i_days>$srch_date)
        {
            $date1=$start;
        }else{
            $date1=$invest_date;
        }
        $days=date_diff1($end,$date1);
        return($days);
}

//function thats gives number days bettween two dates
function date_diff1($start,$end)
{
    $diff=strtotime($start)-strtotime($end);
    $days=abs(round($diff/86400));
    if($days==0)
    {
      return $days;
    }
    else
    {
      return $days+1;
    }
    
}

?>