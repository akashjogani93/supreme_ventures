<?php
require_once('../dbcon.php');

$id = $_POST['id'];

$fileData= $_FILES['file'];
$bond1 = upload_Profile($fileData,"./withdra-pdf/");
	$con=mysqli_query($conn,"UPDATE `widraw` SET `path`='$bond1' WHERE `wid`='$id'");
	if($con)
    {
      echo $bond1;
      //echo 'FILE UPDATED SUCCESSFULLY';
    }else
    {
      echo 'SOMETHING WENT WRONG , TRY AGAIN..?';
    }


 function upload_Profile($image, $target_dir)
    {   
        if($image['name']!=""){
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $msg = " ";
        try {
            $check = getimagesize($image["tmp_name"]);
            $msg = array();
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $msg[1] = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $msg[2] = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg[3] = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    //$msg= "The file ". basename( $image["name"]). " has been uploaded.";
                } else {
                    $msg[4] = "Sorry, there was an error uploading your file.";
                }
            }
            // echo "<pre>";
            // print_r($msg);
            return ltrim($target_file, '');
            } catch (Exception $e) {
            // echo "Message" . $e->getmessage();
        }
    }else{
        return "";
    }
    }
    
    ?>
