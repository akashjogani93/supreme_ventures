<?php
require_once('../dbcon.php');
include('../sms.php');
//use Dompdf\Dompdf;

$cid=$_POST['full1'];
$regdate = $_POST['regdate'];
$year = date('Y', strtotime($regdate));
$Month = date('M', strtotime($regdate));
$invest = $_POST['invest'];
$asign = $_POST['asign'];
$pday = $_POST['pday'];
$pmonth = $_POST['pmonth'];
$pmode = $_POST['pmode'];
$image = $_FILES['screen'];
$bond= $_FILES['bond'];
$mobile = $_POST['mobile'];
$profile = upload_Profile($image,"../img/");
$bond1 = upload_Profile($bond,"./pdf/");

if(!empty($cid) && !empty($regdate) && !empty($year) && !empty($Month) && !empty($invest) && !empty($asign) && !empty($pday) && !empty($pmonth) && !empty($pmode) && !empty($mobile))
{
    $msg1="Dear Customer /nYour Amount Rupees of: $invest, /nSuccessfully Invested,/nFrom: Supreme Ventures";
    $q="INSERT INTO `invest`(`cid`, `regdate`, `invest`, `asign`, `pday`, `pmonth`,`pmode`,`img`,`year`,`month`,`path`)VALUES 
    ('$cid','$regdate','$invest','$asign','$pday','$pmonth','$pmode','$profile','$year','$Month','$bond1');";
    $conform=mysqli_query($conn,$q);
    if($conform)
    {
        
        $q1="SELECT `id` FROM `invest` ORDER BY `id` DESC LIMIT 1;";
        $cfm=mysqli_query($conn,$q1);
        while($row=mysqli_fetch_array($cfm))
        {
            $invest_id=$row['id'];
            sms($mobile,$msg1,$conn);
            echo $invest_id;
        }
    }
}else
{
    echo '0';
}

    //upload images profele & other document in jpg,png format
    function upload_Profile($image, $target_dir)
    {   
        if($image['name']!="")
        {
        	$target_file = $target_dir . basename($image["name"]);
        	$uploadOk = 1;
        	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        	$msg = "";
        	try {
            		$check = getimagesize($image["tmp_name"]);
            		$msg = array();
            		if ($check !== false) 
                	{
                		//echo "File is an image - " . $check["mime"] . ".";
                		$uploadOk = 1;
            		}
                    // Check if file already exists
                    if(file_exists($target_file)) 
                    {
                        $msg[1] = "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") 
                    {
                        $msg[2] = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if($uploadOk == 0) 
                    {
                        $msg[3] = "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    }else 
                    {
                        if (move_uploaded_file($image["tmp_name"], $target_file)) 
                        {
                            //$msg= "The file ". basename( $image["name"]). " has been uploaded.";
                        } else 
                        {
                            $msg[4] = "Sorry, there was an error uploading your file.";
                        }
                    }
              		// echo "<pre>";
                    // print_r($msg);
                    return ltrim($target_file,'');
            	} catch (Exception $e) 
            	{
           			 // echo "Message" . $e->getmessage();
        		}
          }else
          {
              return "";
          }
    }
  ?>
    