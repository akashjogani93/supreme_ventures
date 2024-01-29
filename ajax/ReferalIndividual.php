<?php include('../dbcon.php');


if(isset($_POST["Submit"]))
{
    $filter=$_POST["filter"];
    if($filter=='name')
    {
      $cid=$_POST["cid"];
      $query ="SELECT DISTINCT `register`.`cid` AS `cid` FROM `register`,`invest` WHERE `register`.`cid`='$cid' ORDER BY `register`.`cid` ASC";
    }else
    {
      $query ="SELECT DISTINCT `register`.`cid` AS `cid` FROM `register`,`invest` WHERE `register`.`cid`=`invest`.`cid` ORDER BY `register`.`cid` ASC";
    }
    $conf = mysqli_query($conn,$query) or die(mysqli_error());
    $id=0;
    while($ot=mysqli_fetch_array($conf))
    {
        $cid=$ot['cid'];
        $q="SELECT `invest`.`id` AS `id`,`register`.`cid` AS `cid`,`register`.`full` AS `fullname`,`invest`.`regdate` AS `date`,`invest`.`invest` AS `value`, `invest`.`asign` AS `p`, `invest`.`pday` AS `perday` FROM `register`,`invest` WHERE `register`.`cid`=`invest`.`cid` AND `register`.`cid`='$cid';";
        $confirm = mysqli_query($conn,$q) or die(mysqli_error());
        $i=$total1=$total2=$total3=0;
       while($out=mysqli_fetch_array($confirm))
       {
          $i=1;  $invest=$out['id'];
          $total1=$total1+round($out['value']);
          $total2=$total2+$out['perday'];
          $total3=$total3+round($out['perday']*30);
       
            $intro=array();
            $qry="SELECT `referal`.`refcid` AS `intro_name`,`referal`.`refasign` AS `perc`,`referal`.`refpday` AS `r_perday`,`invest`.`invest` AS `value` FROM `referal`,`invest` WHERE `invest`.`id`=`referal`.`id` AND `referal`.`id`='$invest';";
            $confirm1 = mysqli_query($conn,$qry) or die(mysqli_error());
             while($itd=mysqli_fetch_array($confirm1))
             {
                    $name=$itd['intro_name'];
                    if($name!=0)
                    {
                        $quee=mysqli_query($conn,"SELECT `full` FROM `register` WHERE `cid`='$name'");
                        $name1=mysqli_fetch_array($quee);
                        
                        $intro[$i][0]=$name1[0];
                        $intro[$i][1]=$itd['perc'];
                        $intro[$i][2]=$itd['r_perday'];
                        $intro[$i][3]=round($itd['r_perday']*30);
                        if($itd['value']=='0')
                            {
                                $intro[$i][2]='0';
                                $intro[$i][3]=round(0*30);
                            }
                        $i=$i+1;
                    }else
                    {
                        $intro[$i][0]='-';
                        $intro[$i][1]='-';
                        $intro[$i][2]='-';
                        $intro[$i][3]='-';
                        $i=$i+1;
                    }
             }  
              while($i<9)
             {
               $intro[$i][0]='-';
               $intro[$i][1]='-';
               $intro[$i][2]='-';
               $intro[$i][3]='-';
               $i=$i+1;
             } ?>
       <tr>
         <!---invester ----->
            <td><button onclick="editupdate(<?php echo $out['id']; ?>)" class="btn btn-info">Edit</button></td>
            <td><?php echo $out['id']; ?></td>
            <td><?php echo $out['fullname']; ?></td>
            <td><?php echo $out['date']; ?></td>  
            <td><?php echo $out['value']; ?></td>  
            <td><?php echo $out['p']; ?></td>  
            <td><?php echo $out['perday']; ?></td>
            <td><?php echo round($out['perday']*30)?></td>
           
            <!----Introducer 1--->
           <td> <?php echo $intro[1][0]; ?></td>
           <td><?php echo $intro[1][1]; ?></td>
           <td><?php echo $intro[1][2]; ?></td>
           <td><?php echo $intro[1][3]; ?></td>
            <!----Introducer 1--->
              <!----Introducer 2--->
             <td> <?php echo $intro[2][0]; ?></td>
           <td><?php echo $intro[2][1]; ?></td>
           <td><?php echo $intro[2][2]; ?></td>
           <td><?php echo $intro[2][3]; ?></td>
            <!----Introducer 2--->
           <!----Introducer 3--->
           <td> <?php echo $intro[3][0]; ?></td>
           <td><?php echo $intro[3][1]; ?></td>
           <td><?php echo $intro[3][2]; ?></td>
           <td><?php echo $intro[3][3]; ?></td>
            <!----Introducer 3--->
            <!----Introducer 4--->
           <td> <?php echo $intro[4][0]; ?></td>
           <td><?php echo $intro[4][1]; ?></td>
           <td><?php echo $intro[4][2]; ?></td>
           <td><?php echo $intro[4][3]; ?></td>
            <!----Introducer 4--->
              <!----Introducer 5--->
           <td> <?php echo $intro[5][0]; ?></td>
           <td><?php echo $intro[5][1]; ?></td>
           <td><?php echo $intro[5][2]; ?></td>
           <td><?php echo $intro[5][3]; ?></td>
            <!----Introducer 5--->
              <!----Introducer 6--->
           <td> <?php echo $intro[6][0]; ?></td>
           <td><?php echo $intro[6][1]; ?></td>
           <td><?php echo $intro[6][2]; ?></td>
           <td><?php echo $intro[6][3]; ?></td>
            <!----Introducer 6--->
              <!----Introducer 7--->
           <td> <?php echo $intro[7][0]; ?></td>
           <td><?php echo $intro[7][1]; ?></td>
           <td><?php echo $intro[7][2]; ?></td>
           <td><?php echo $intro[7][3]; ?></td>
            <!----Introducer 7--->
               <!----Introducer 8--->
           <td> <?php echo $intro[8][0]; ?></td>
           <td><?php echo $intro[8][1]; ?></td>
           <td><?php echo $intro[8][2]; ?></td>
           <td><?php echo $intro[8][3]; ?></td>
            <!----Introducer 8--->
       </tr>
       <?php }    } } ?> 
       