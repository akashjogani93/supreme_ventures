<body class="hold-transition skin-blue sidebar-mini">
<link rel="stylesheet" href="loader.css">
    <div class="wrapper" id="form1">
        <style>
            .error {
                color: red;
            }
            .col-md-5.fd-pan{
                /* background: linear-gradient(45deg,#FFB64D,#ffcb80);*/
                padding: 20px 0px 20px 40px;
                box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5)
            }
        </style>
        <?php require_once("header.php"); ?>
        <script>
            $("#dyna").text("Fixed Deposit Plan");
        </script>
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <form class="form-horizontal" id="addform" action="ajax/introduceReferal.php" method="POST"> -->
                                <div class="box-body" style="padding:30px;">
                                    <div class="row" >
                                        <div class="col-md-5 fd-pan">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail3" class="form_label">Full Name:</label>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" class="col-sm-4 form-control form-control-sm full" name="full" id="full" placeholder="Select Full Name" required="required">
                                                    <input type="hidden" name="full1" id="full1">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail3" class="form_label">FD Date:</label>
                                                </div>
                                                <div class="form-group col-md-8">
                                                <input type="date" class="col-sm-4 form-control form-control-sm" required name="regdate" id="regdate" placeholder="Registration Date">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail3" class="form_label">FD Amount:</label>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" class="col-sm-4 form-control form-control-sm investOne" required name="invest" id="invest" placeholder="Amount">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail3" class="form_label">FD For:</label>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" class="col-sm-4 form-control form-control-sm investOne" readonly name="Year" id="year" placeholder="5 Year">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <center>
                                                    <button onclick="t()" name="submit" id="sub" class="btn btn-primary" style=" margin-top:20px; background-color:#1a8e5f;color:#fff;">Submit</button>
                                                </center>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-1">
                                            
                                        </div> -->
                                        <div class="col-md-7">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>FD.no</th>
                                                        <th>Full Name</th>
                                                        <th>Amount</th>
                                                        <th>Year</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="mytable">
                                                    <!-- <tr>
                                                        <td>1</td>
                                                        <td>Bhujabali DandannavarB Dandannavar</td>
                                                        <td>500000</td>
                                                        <td>5</td>
                                                        <td>13-2-2023</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php require_once("footer.php"); ?>

    <script>
        $(document).ready(function()
        {
            fetchall();
            //autocomplete names
            $(function() {
                $(".full").autocomplete({
            
                    source: 'investment_searchName.php',
                    focus: function (event, ui) {
                        event.preventDefault();
                        $("#full").val(ui.item.label);
                    },
                    select: function (event, ui) {
                        event.preventDefault();
                        $("#full1").val(ui.item.value);
                        $("#full").val(ui.item.label);
                }
                    
                }); 

                // let log = $.ajax({
                //     url: 'ajax/fd_plan.php',
                //     type: "POST",
                //     dataType: 'json',
                //     data: {
                //         submit: "submit",
                //     },
                //     success:function(data) 
                //     {
                //         $("#example1 tbody").empty().html(data);
                //     }
                // });console.log(log);

            });
            
        });
        function t()
        {
            console.log('log');
            var cid = $('#full1').val();
            var fddate = $('#regdate').val();
            var invest = $('#invest').val();
            var year = 5;
            log = $.ajax({
                url: 'ajax/fd_plan.php',
                type: "POST",
                data: {
                    cid : cid,
                    fddate : fddate,
                    invest : invest,
                    year: year
                },success: function(data) {
                    alert(data);   
                    fetchall(); 
                }
            });
        }
        function fetchall()
        {
           let  log = $.ajax({
                    url: 'ajax/fd_plan.php',
                    type: "POST",
                    data: {
                        submit: "submit",
                    },
                    catch: false,
                    success:function(data) 
                    {
                        $(".mytable").html(data);
                    }
            });console.log(log)
        }
    </script>
</body>

<?php  
 //update Password
// if(isset($_POST['New_pass']))
// {
//     $password=$_POST['old'];
//     $id=$_POST['id'];
// 	$create_pass=$_POST['createpass'];
// 	$confirm_pass=$_POST['confirmpass'];
//     if($create_pass==$confirm_pass)
// 	{
// 		$query="SELECT * FROM `login` WHERE `cid`='$id' AND `password`='$password' AND `user`='admin';";
// 		$confirm=mysqli_query($conn,$query) or die(mysqli_error());
// 		if($confirm)
// 		{
// 			$query="UPDATE `login` SET `password`='$confirm_pass' WHERE `user`='admin' AND `cid`='$id';";
// 			$confirm=mysqli_query($conn,$query) or die(mysqli_error());
// 			if($confirm)
// 			{
// 			    echo "<script>alert('Password Updated');</script>";
// 				echo "<script>location='logout.php';</script>";
// 			}
// 		}
// 	}else{
// 		echo "<script>alert('Password Wrong, Try Again');</script>";
// 		echo "<script>location='change_pass.php';</script>";
// 	}
// }
?>