<?php 
    include("header.php"); 
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <style>
        .content-wrapper {
            background-color: white;
        }
        .skin-blue .main-header .navbar {
    background-color: white;
}
        .error {
            color: red;
        }
        body{
    margin-top:20px;
    background-color:white !important;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
.container {
    padding: 0 !important;
}
/* .container {
    width: 1235px !important;
} */
        </style>
        <?php
        //session_start();
         
        
        // $type=$_SESSION["type"];
        // echo $type;
        ?>
        <script>
            $("#dyna").text("Dashboard");
            tex();
        </script>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
<!-- google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <div class="container">

<?php 
include("dbcon.php");
function get_Dash_Data($conn,$query){
    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
    $o=mysqli_fetch_array($confirm);
    return $o['0'];

    
}
?>
<?php 
if($_SESSION["type"]<>"member")
{
    ?>
            <div class="row">
        <div class="col-md-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Customers</h6>
                    <h2 class="text-right"><i class="fa fa-solid fa-users f-left"></i><span><?php echo get_Dash_Data($conn,"SELECT  COUNT(`cid`) FROM `register`;"); ?></span></h2>
                    <p>
                        <?php 
                            // $sel="SELECT `id`,`regdate` FROM `invest` WHERE `regdate`<='2024-01-01' ORDER BY `id`";
                            // $conf=mysqli_query($conn,$sel);
                            // while($row=mysqli_fetch_array($conf))
                            // {
                            //     $reg=$row['regdate'];
                            //     $id=$row['id'];
                            //     $year = date('Y', strtotime($reg));
                            //     $Month = date('M', strtotime($reg));
                            //     echo $year;
                            //     echo $Month;
                            //     $up="UPDATE `invest` SET `year`='$year',`month`='$Month' WHERE `id`='$id'";
                            //     $co=mysqli_query($conn,$up);
                            // }
                            // echo 'true';

                            // $sel="SELECT `wid`,`wdate` FROM `widraw` WHERE `wdate`>='2023-01-01' AND `wdate`<='2024-01-01' ORDER BY `wid`";
                            // $conf=mysqli_query($conn,$sel);
                            // while($row=mysqli_fetch_array($conf))
                            // {
                            //     $reg=$row['wdate'];
                            //     $id=$row['wid'];
                            //     $year = date('Y', strtotime($reg));
                            //     $Month = date('M', strtotime($reg));
                            //     echo $year;
                            //     echo $Month;
                            //     $up="UPDATE `widraw` SET `year`='$year',`month`='$Month' WHERE `wid`='$id'";
                            //     $co=mysqli_query($conn,$up);
                            // }
                            // echo 'true';
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number Of Invest</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span><?php echo get_Dash_Data($conn,"SELECT  COUNT(`id`) FROM `invest`;"); ?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number Of Withdraw</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span><?php echo get_Dash_Data($conn,"SELECT  COUNT(`wid`) FROM `widraw`;"); ?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">All Reports</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>9</span></h2>
                </div>
            </div>
        </div>
	</div>
    <div class="panel panel-default" style="border:none;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">Month Wise Invest And withdraw Data</h3>
                </div>
                <div class="col-md-3">
                    <select name="year" class="form-control" id="year">
                        <!-- <option value="">Select Year</option> -->
                        <?php
                            $query ="SELECT DISTINCT `year` FROM `invest` ORDER BY `year` DESC";
                            $exe=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_array($exe))
                            {
                                echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-body" style="background-color: #e7edf2;">
            <div class="row">
                <div class="col-md-6">
                    <div id="chart_area" style="height:300px;"></div>
                </div>
                <div class="col-md-6">
                    <div id="chart_area1" style="height:300px;"></div>
                </div>
            </div>
        </div>
    </div></br>
    <div class="row">
      	
      	<div class="col-md-6">
          <h5>Latest Investments</h5>
          <div class="top-invest" style="background-color:#E4C988;">
          	<table id="example1" class="table table-bordered table-striped" style="background-color:pink;">
              <thead>
                <tr>
                  <th>Cid</th>
                  <th>Full Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody class="mytable">
				<?php 
                	$query="SELECT `invest`.*,`register`.`cid`,`register`.`full` FROM `invest`,`register` WHERE `invest`.`cid`=`register`.`cid` ORDER BY `invest`.`id` DESC LIMIT 10";
                    $con=mysqli_query($conn,$query);
  					while($row=mysqli_fetch_assoc($con))
                    {
                      	?>
                			<tr>
                              	<td><?php echo $row['cid']; ?></td>
                              	<td><?php echo $row['full']; ?></td>
                              	<td><?php echo $row['invest']; ?></td>
                              	<td><?php echo $row['regdate']; ?></td>
                			</tr>
                		<?php
                    }
                ?>
              </tbody>
          	</table>
         </div>
      	</div>
      	<div class="col-md-6">
          <h5>Latest Withdrawals</h5>
          <div class="top-withdraw" >
          <table id="example1" class="table table-bordered table-striped" style="background-color:pink;">
            <thead>
              <tr>
                <th>Cid</th>
                <th>Full Name</th>
                <th>Amount</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody class="mytable">
				<?php 
                	$query="SELECT `widraw`.*,`register`.`cid`,`register`.`full` FROM `widraw`,`register` WHERE `widraw`.`cid`=`register`.`cid` ORDER BY `widraw`.`wid` DESC LIMIT 10";
                    $con=mysqli_query($conn,$query);
  					while($row=mysqli_fetch_assoc($con))
                    {
                      	?>
                			<tr>
                              	<td><?php echo $row['cid']; ?></td>
                              	<td><?php echo $row['full']; ?></td>
                              	<td><?php echo $row['wamt']; ?></td>
                              	<td><?php echo $row['wdate']; ?></td>
                			</tr>
                		<?php
                    }
                ?>
            </tbody>
          </table>
      	</div>
      </div>
    </div>
</div>
       
    
</body>

</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="chart/charts.js"></script>
    <?php
}else{
    ?>
<style>
    body{
        font-family: 'Source Sans Pro', sans-serif;
    }
    p{
        font-family: 'Source Sans Pro';
        font-size: 14px;
        font-weight: 600;
        line-height: 18px;
        letter-spacing: 0em;
    }
    .fst-section{
        padding:0;
    }
   h5{
    /* font-family: Source Sans Pro; */
    font-size: 24px;
    font-weight: 600;
    line-height: 30px;
    letter-spacing: 0.08em;
    color:black;

   }
   h2{
    /* font-family: Source Sans Pro; */
    font-size: 60px;
    font-weight: 700;
    line-height: 75px;
    letter-spacing: 0.08em;
    color:black;

   }
   @media only screen and (max-width: 600px) {
  h2 {
    /* font-family: Source Sans Pro; */
    font-size: 24px;
    font-weight: 700;
    letter-spacing: 0.08em;
    color:black;
    margin:0;
    padding:0;
    line-height: 31px;

  }
}
@media only screen and (max-width: 600px) {
  h2, h4, h5  {
  text-align:center;
    margin:0;
    padding:0;
  }
}

   h6{
    /* font-family: Source Sans Pro; */
    font-size: 17px;
    font-weight: 400;
    line-height: 21px;
    letter-spacing: 0.08em;
    color:black;
   }
   .lefts{
    padding-top:100px;
   }

   @media only screen and (max-width: 600px) {
  .lefts {
    padding-top:0;
  }
}
   .certificate{
    /* margin-top:15px; */
    background-color:#ECF6FF;
   }
   .btns{
    height: 54px;
    width: 218px;
    background: #000000;
    color:white;
   }
   @media only screen and (max-width: 600px) {
  .btns {
    height: 40px;
    width: 150px;
    margin-left:80px;
  }
}

   h4{
    font-family: 'Source Sans Pro';
    font-size: 20px;
    font-weight: 700;
    line-height: 25px;
    letter-spacing: 0.08em;
   }
   
   p{
    font-family: Source Sans Pro;
    font-size: 15px;
    font-weight: 300;
    line-height: 19px;
    letter-spacing: 0.08em;

   }
   .bttn{
    height: 46px;
    width: 188px;
    background:white;
    font-family: Source Sans Pro;
    font-size: 16px;
    font-weight: 600;
    line-height: 21px;
    letter-spacing: 0.08em;
    border-radius:0;
   }
   .anneversary{
    margin-top:15px;
   }
   .evnt{
    margin-top:15px;
    margin-bottom:50px;
   }

   /* gallery */
   div.gallery {
  margin:15px;
  float: left;
  width: 350px;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

/* read more button */
#more {display: none;}
</style>
    <div class="panel-body" style="background-color: white;">
        <div class="row">
            <div class="sec1">
                <div class="col-md-6 " >
                    <img src="img/Group 151 (1).png" alt="" width="100%">
                    <!-- <br><br>
                    <p>Criteria</p>
                    <div class="col-md-3 fst-section"><img src="img/s2.png" alt=""><p style="text-align:center;">Stocks</p></div>
                    <div class="col-md-3 fst-section"><img src="img/s3.png" alt=""><p style="text-align:center;">Commodity</p></div>
                    <div class="col-md-3 fst-section"><img src="img/s4.png" alt=""><p style="text-align:center;">Mutual Funds</p></div>
                    <div class="col-md-3 fst-section"><img src="img/s5.png" alt=""><p style="text-align:center;">Forex</p></div> -->
                </div>

                <div class="col-md-6 ">
                    <div class="lefts" style="padding-left:35px!important;">
                        <h5>STOCK MARKET</h5>
                        <h2>LOREM IPSUM</h2>
                        <h6>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available in publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</h6>
                    </div>
                </div>
            </div>
        </div>
         <br><br><br><br>

        <div class="row">
            <div class="sec1">
                <div class="col-md-6 ">
                    <div class="lefts">
                        <h5>REAL ESTATE</h5>
                        <h2>LOREM IPSUM</h2>
                        <h6>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available in publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</h6>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <img src="img/Group 152 (1).png" alt="" width="100%">
                </div>
            </div>
        </div>
        <br><br><br><br>

        <div class="row">
            <div class="sec1">
                <div class="col-md-6 ">
                    <img src="img/Group 153 (1).png" alt="" width="100%">
                </div>
                <div class="col-md-6 ">
                    <div class="lefts"style="padding-left:35px!important;">
                        <h5>HOTEL</h5>
                        <h2>LOREM IPSUM</h2>
                        <h6>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available in publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</h6>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>

        <div class="row">
            <div class="sec2" style="background-color:#ECF6FF !important;">
                <div class="col-md-12" style="background-color:#ECF6FF !important;padding:30px 0;">
                    <center><h2>TALE OF SUCCESS BY ARCHIVE</h2></center>
                    <center><img src="img/Group 2.png" alt="" width="30%" height="70%"></center>
                    <center><h5>SUPREME</h5></center>
                    <center><h2>BEST PERFORMER</h2></center>
                    <center><h5>2023</h5></center>
                    <center><h6>meaningful content. Lorem ipsum may be used as a <br>
                    placeholder before final copy is available<br>
                     publishing and graphic design, Lorem ipsum is a <br>
                     placeholder text commonly used to demonstrate the visual <br>
                    form of a document</h6></center>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="sec2">
                <div class="col-md-4 certificate" >
                    <img src="img/Group 154 (1).png" alt="" width="100%">
                    <center><h6>meaningful cotext commonly used to demonstrate the visual form of a document</h6></center>
                </div>
                <div class="col-md-4 certificate">
                    <img src="img/Group 154 (1).png" alt="" width="100%">
                    <center><h6>meaningful cotext commonly used to demonstrate the visual form of a document</h6></center>
                </div>
                <div class="col-md-4 certificate">
                    <img src="img/Group 154 (1).png" alt="" width="100%">
                    <center><h6>meaningful cotext commonly used to demonstrate the visual form of a document</h6></center>
                </div>
                <br><br>
            </div>
        </div>

       <!-- <center><h2>EVENTS</h2></center>
        <div class="row">
            <div class="sec1">
                <div class="col-md-6 evnt ">
                    <div class="leftss"style="padding-top:10px;">
                        <h5>UPCOMING EVENT</h5>
                        <h2>FILM-2023 Meet</h2>
                        <h6>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available
                            n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</h6>
                    <button class="btns">CONTACT</button>
                        </div>
                </div>

                <div class="col-md-6 evnt ">
                    <img src="img/image 46 (1).png" alt="" width="100%">
                </div>
            </div>
        </div> -->
        

        	<!--<div class="row">
                <div class="col-md-4 anneversary" >
                    <img src="img/image 47 (1).png" alt="" width="100%">
                    <center><h4>7th ANNIVERSARY Meet</h4></center>
                    <center><p>In publishing and graphic design, Lorem <br> ipsum</p></center>
                    <center><h6 style="word-spacing: 10px;">Monday 12 10:30  am  to  0.5  pm</h6></center>
                    <center><button class="bttn">CONTACT</button></center>

                </div>
                <div class="col-md-4 anneversary">
                    <img src="img/image 48 (1).png" alt="" width="100%">
                    <center><h4>7th ANNIVERSARY Meet</h4></center>
                    <center><p>In publishing and graphic design, Lorem <br> ipsum</p></center>
                    <center><h6 style="word-spacing: 10px;">Monday 12 10:30  am  to  0.5  pm</h6></center>
                    <center><button class="bttn">CONTACT</button></center>
                </div>
                <div class="col-md-4 anneversary">
                    <img src="img/image 49 (1).png" alt="" width="100%">
                    <center><h4>7th ANNIVERSARY Meet</h4></center>
                    <center><p>In publishing and graphic design, Lorem <br> ipsum</p></center>
                    <center><h6 style="word-spacing: 10px;">Monday 12 10:30  am  to  0.5  pm</h6></center>
                    <center><button class="bttn">CONTACT</button></center>
                </div>
        </div>--->
        <div class="row">
           <!-- <center><h5 style="margin-top:20px;">VIEW MORE</h5></center> -->
        </div>

        <div class="row">
            <div class="sec2" style="background-color:#ECF6FF !important;">
                
                <div class="col-md-12">
                    <div class="galry" style="background-color:#ECF6FF ;padding:20px 0;">
                        <center><h2>GALLERY</h2></center>
                        <div class="gallery">
                            <a target="_blank" href="img/ii1.png">
                                <img src="img/ii1.png" alt="Cinque Terre" width="100%" height="400">
                            </a>
                        </div>

                        <div class="gallery">
                            <a target="_blank" href="img/ii2.png">
                                <img src="img/ii2.png" alt="Forest" width="600" height="400">
                            </a>
                        </div>

                        <div class="gallery">
                            <a target="_blank" href="img/ii3.png">
                                <img src="img/ii3.png" alt="Northern Lights" width="600" height="400">
                            </a>
                        </div>

                        <div class="gallery">
                            <a target="_blank" href="img/ii4.png">
                                <img src="img/ii4.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>
                        <div class="gallery">
                            <a target="_blank" href="img/ii5.png">
                                <img src="img/ii5.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>

                        <div class="gallery">
                            <a target="_blank" href="img/ii6.png">
                                <img src="img/ii6.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>

                        <span id="dots"></span><span id="more">

                        <div class="gallery">
                            <a target="_blank" href="img/ii4.png">
                                <img src="img/ii4.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>
                        <div class="gallery">
                            <a target="_blank" href="img/ii5.png">
                                <img src="img/ii5.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>

                        <div class="gallery">
                            <a target="_blank" href="img/ii6.png">
                                <img src="img/ii6.png" alt="Mountains" width="600" height="400">
                            </a>
                        </div>
                        </span>
                       <!-- <center><h5 style="cursor:pointer;" onclick="myFunction()" id="myBtn">View more</h5></center>-->
                        
                    </div>
                </div>
                
            </div>
        </div>

        <!--<div class="row">
            <center><h2>REWARDS</h2></center>
            <div class="sec1">
                <div class="col-md-6 ">
                    <img src="img/rwd1.png" alt="" width="100%">
                </div>
                <div class="col-md-6 ">
                    <div class="lefts"style="padding-left:35px!important;">
                        <h5>MG HECTOR</h5>
                        <h2>Sagar Shinde</h2>
                        <h6>There is no one magic move or secret that creates victory, but lots of little items that when added together can make you victorious</h6>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="sec1">
                <div class="col-md-6 ">
                    <img src="img/rwd2.png" alt="" width="100%">
                </div>
                <div class="col-md-6 ">
                    <div class="lefts"style="padding-left:35px!important;">
                        <h5>DREAM HOME</h5>
                        <h2>Omkar Yadav</h2>
                        <h6>There is no one magic move or secret that creates victory, but lots of little items that when added together can make you victorious</h6>
                    </div>
                </div>
            </div>
        </div>--->


    </div>

        <script>
            function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "View less"; 
                moreText.style.display = "inline";
            }
            }
        </script>
        <?php
}
?>
    