<?php session_start(); 
include("dbcon.php"); ?>
<?php include('link.php');
date_default_timezone_set("Asia/Kolkata");

// if((($_SESSION["type"]<>"admin")||($_SESSION["type"]=="")&&($_SESSION["id"]=="")))
// {
//   echo "<script>window.location='index.php';</script>";
// }
// else if($_SESSION["type"]=="member")
// {
//     echo "<script>alert('Log in session closed');</script>";
//     echo "<script>window.location='logout.php';</script>";
// }

if(($_SESSION["type"]=="")&&($_SESSION["id"]==""))
{
    echo "<script>window.location='index.php';</script>";
}else if($_SESSION["type"]=="admin")
{
    
}else if($_SESSION["type"]=="manager")
{
    $id=$_SESSION["id"];
}else if($_SESSION["type"]=="member")
{
    $id=$_SESSION["id"];
    // cheak for timing permission
    $qry="SELECT `end_time` FROM `log_permission` ORDER BY `log_per_id` DESC LIMIT 1;";
    $conf=mysqli_query($conn,$qry) or die(mysqli_error());
    $row=mysqli_fetch_array($conf);
    date_default_timezone_set('Asia/Calcutta');
    $date=date("Y-m-d H:i:s");
    $_SESSION["endtime"]=$row['end_time'];
    if($_SESSION["endtime"]<$date && $_SESSION["endtime"]!="")
    {
        echo "<script>alert('Log in session closed');</script>";
        echo "<script>window.location='logout.php';</script>";
    }
}

?>
<style>
a:hover{
    text-decoration:none;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover{
    color:black;
}

</style>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <!-- <div class="fixs" style="position:fixed;"> -->
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>T I<b></span>
                    <span class="logo-lg"><b>SUPREME VENTURES</b></span>  
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" >
                    <img src="img/Vector.png" class="sidebar-toggle"data-toggle="offcanvas" role="button" height="45px" width="50px">
                    </a>
                    
                    <center><h2 style="margin-top:7px;"><b id="dyna"></b></h2></center>
                        
                        <script>
                            $(document).ready(function() {
                                $('body').bind('cut copy', function(e)
                                    {
                                    e.preventDefault();
                                    });
                                });
                            function tex()
                            {
                                var tex = document.getElementById('dyna').textContent.toUpperCase();
                                document.getElementById("dyna").innerHTML = tex;
                            }
                        </script>
                    <div class="navbar-custom-menu">
                        <!-- <center> <ul class="nav navbar-nav">
                            <li>Dashboard</li>
                        </ul></center> -->
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
            
                    <div class="user-panel">
                        <div class="pull-left image">
                        
                        </div>
                        <div class="pull-left info">
                        </div>
                    </div>
                    <ul class="sidebar-menu">
        <?php if($_SESSION["type"]=="admin") 
                {
                        ?>
                            <!-- <li class="header">MAIN NAVIGATION</li> -->
                            <li><a href="home.php"><img class="fa" src="logos/monitor.png"><span>Dashboard</span></a></li>
                            <li><a href="registration.php"><img class="fa" src="logos/contact-form (1).png"><span>Registration</span></a></li>
                      		<li><a href="register_customer1.php"><img class="fa" src="logos/contact-form (1).png"><span>View Customers</span></a></li>
                            <li><a href="investment.php"><img class="fa" src="logos/save-money.png"><span>Investment</span></a></li>
                            <li><a href="singleInvestment.php"><img class="fa" src="logos/6.png"><span>Single Invest Details</span></a></li>
                      		<li><a href="investment_report.php"><img class="fa" src="logos/6.png"><span>Investment Report</span></a></li>
                            <li><a href="singleWidraw.php"><img class="fa" src="logos/cash-withdrawal.png"><span>Withdraw</span></a></li>
                      		<li><a href="team_view.php"><img class="fa" src="logos/cash-withdrawal.png"><span>Referal View</span></a></li>
                            <li><a href="all_report.php"><img class="fa" src="logos/roadmap.png"><span>All Investment Reports</span></a></li>
                            <!-- <li><a href="all_records.php"><img class="fa" src="logos/verify.png"><span>Total Records</span></a></li> -->
                            <!-- <li class="treeview">
                                <a href="#">
                                    <img class="fa" src="logos/roadmap.png">
                                    <span>Reports</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="register_customer.php"><i class="fa fa-circle-o"></i>Customer List</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="fd_registraion.php"><img class="fa" src="logos/7.png"><span>FD Registration</span></a></li> -->
                            <!-- <li><a href="fd_plan.php"><img class="fa" src="logos/7.png"><span>FD Plan</span></a></li> -->
                            <li><a href="change_pass.php"><img class="fa" src="logos/padlock.png"><span>Change Password</span></a></li>
                            <li><a href="logout.php"><img class="fa" src="logos/tog (2).png"><span> logout</span></a></li>

                        <?php
                }else if($_SESSION["type"]=="manager")
                {
                    ?>
                        <li><a href="home.php"><i class="fa fa-table"></i> <span>Dashboard</span></a></li>
                        <li><a href="super_invest.php"><i class="fa fa-table"></i> <span>Single Investment</span></a></li>
                        <li><a href="super_investment.php"><i class="fa fa-table"></i> <span>All Investment</span></a></li>
                        <li><a href="all_report.php"><img class="fa" src="logos/roadmap.png"><span>All Investment Reports</span></a></li>
                        <li><a href="logout.php"><img class="fa" src="logos/tog (2).png"><span> logout</span></a></li>

                        <!-- <li><a href="sub_profile.php"><i class="fa fa-table"></i> <span>Profile</span></a></li> -->
                        <!-- <li><a href="sub_payment.php"><i class="fa fa-table"></i> <span>Payment Details</span></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-table"></i> <span>Change Password</span></a></li> -->
                        <!-- <li><a href="#"><i class="fa fa-table"></i> <span><?php echo $id; ?></span></a></li> -->
                    <?php
                }else if($_SESSION["type"]=="member")
                {
                    ?>  
                        <li><a href="home.php"><i class="fa fa-table"></i> <span>Dashboard</span></a></li>
                        <li><a href="sub_profile.php"><img class="fa " src="img/acount.png" alt=""> <span>Profile</span></a></li>
                        <li><a href="sub_payment.php"><img class="fa " src="img/payment.png" alt="">  <span>Payment Details</span></a></li>
                        <!-- <li><a href="#"><i class="fa fa-table"></i> <span>Change Password</span></a></li> -->
                        <li><a href="logout.php"><img class="fa" src="logos/tog (2).png"><span> logout</span></a></li>

                        <!-- <li><a href="#"><i class="fa fa-table"></i> <span><?php echo $id; ?></span></a></li> -->
                    <?php
                }
                ?>
                    </ul>
                    
                </section>
                
            </aside>
            
                
              
        <!-- </div> -->
                    