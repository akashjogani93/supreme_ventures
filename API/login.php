<?php 
     include('../dbcon.php');
     header('Access-Control-Allow-Origin:*');
     header('Access-Control-Request-Methods:POST');
     header('Content-Type:Application/json');
     header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Origin,Access-Control-Request-Methods,Access-Control-Allow-Headers,Authorization,X-Request-With');
     // $data =json_decode(file_get_contents("php://input"));
     $data =file_get_contents("php://input");
     $data=json_decode($data,TRUE);
     $user=$data['user'];
     $pass=$data['pass'];
    //  $type=$data['Type'];
    //  $mode=$data['mode'];
     // echo $data['status'];
     $sql = "SELECT * FROM `login` WHERE username='$user' AND password='$pass' AND user='member';";
     $exc=mysqli_query($conn,$sql);
     $row = mysqli_num_rows($exc);
     $arr = array();
      
     //echo $row;
     if($row>0){
     $i=0;
     while( $data=mysqli_fetch_array($exc)){
      // echo json_encode($data)};
          echo $data['cid'];
     }   
       //echo json_encode($arr);
     }
     else {
        echo "false";
     } 