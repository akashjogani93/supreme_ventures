<body class="hold-transition skin-blue sidebar-mini">
<link rel="stylesheet" href="loader.css">
    <div class="wrapper" id="form1">
        <style>
            .error {
                color: red;
            }
            h3{
                text-align:center;
            }
        </style>
        <?php require_once("header.php"); ?>
        <script>
            $("#dyna").text("Investment Asign %");
            tex();
        </script>
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-12 searchpad">
                            <!-- <form class="form-horizontal" id="addform" action="ajax/introduceReferal.php" method="POST"> -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="inputEmail3" id="search_name" class="col-sm-4 control-label">Search Full Name</label>
                                            <div class="col-sm-8">
                                                <input  type="text" class="form-control full" name="full" id="full" placeholder="Search Full Name" required="required">
                                            </div>
                                        </div>
                                        <div class="group-form col-md-1 ">
                                            <label for="inputEmail3" class="form_label"></label>
                                            <a type="button" id="search1" onclick="searchfull()" class="btn btn-primary">Search</a>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
                <div class="box">
                    <form class="form-horizontal" id="form"  method="POST">
                        <div class="box-body">
                            <div class="row">
                                <div class="group-form col-md-12">
                                    <h3>
                                        <b>Matched Personal Details</b>
                                    </h3>
                                </div>
                            </div></br>
                            <div class="row">
                                <!-- <center><h3>
                                        Matched Personal Details
                                    </h3></center></br><hr> -->
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Bank Name:</label>
                                        <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="bank" id="bank11"
                                            placeholder="Back Name">
                                            <input type="hidden" name="full1" id="full1">

                                    
                                </div>
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Account No:</label>
                                        <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="acc" id="acc11"
                                            placeholder="Account No">

                                    
                                </div>
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Mobile Number:</label>
                                        <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="mobile" id="mobile11"
                                            placeholder="Mobile Number">

                                    
                                </div>
                                
                            </div></br>

                            <div class="row">
                                
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Invest Amount:</label>
                                        <input type="text" class="col-sm-4 form-control form-control-sm investOne" required name="invest" id="invest" placeholder="Invest To Amount" autocomplete="off">

                                    
                                </div>
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Assign %:</label>
                                        <input type="text" class="col-sm-4 form-control form-control-sm investOne" required name="asign" id="asign"
                                            placeholder="Assign %" autocomplete="off">

                                    
                                </div>
                                <div class="group-form col-md-2">
                                    <label for="inputEmail3" class="form_label">Per Day:</label>
                                        <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="pday" id="pday"
                                            placeholder="Per Day Amount" autocomplete="off">

                                    
                                </div>
                                <div class="group-form col-md-2">
                                    <label for="inputEmail3" class="form_label">Per Month:</label>
                                        <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="pmonth" id="pmonth" placeholder="Per Mounth Amount">

                                    
                                </div>
                                
                            </div></br>
                            <div class="row">
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Investment Date</label>
                                    <input type="date" class="col-sm-4 form-control form-control-sm" required name="regdate" id="regdate" placeholder="Registration Date">
                                </div>
                                <div class="group-form col-md-4">
                                    <label for="inputEmail3" class="form_label">Payment Mode:</label>
                                    <select class="form-control form-control-sm" name="pmode" required id="pmode">
                                        <option value="">Select Mode</option>
                                        <option>Cash</option>
                                        <option>Bank Check</option>
                                        <option>Online</option>
                                    <select>
                                </div>
                                <div class="group-form col-md-2">
                                  	<label for="inputEmail3" class="form_label">Proof of Payment:</label>
                                    <!--<img id="img1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSlc_piJr999mRLgWEgWyB5bJRR1uR3lImSTfhyTaxFi_TPOjm5" height="120" width="120" onclick="image_select()">-->
                                    <input type="file" class="form-control" name="screen" id="screen" accept="image/png, image/jpeg">
                                </div>
                                <div class="group-form col-md-2">
                                  	<label for="inputEmail3" class="form_label">Upload Agreement:</label>
                                    <!--<img id="img1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSlc_piJr999mRLgWEgWyB5bJRR1uR3lImSTfhyTaxFi_TPOjm5" height="120" width="120" onclick="image_select()">-->
                                    <input type="file" class="form-control" name="bond" id="bond" accept="image/png, image/jpeg">
                                  		
                                </div>
                            </div></br>
                            <div id="show">
                                <div class="row">
                                    <div class="group-form col-md-12">
                                        <h3>
                                            <b>Referrals</b>
                                        </h3>
                                    </div>
                                </div></br>
                                <div class="row">
                                <!-- <hr><center><h3>
                                            REFERRALS
                                    </h3></center></br><hr> -->
                                    <div class="group-form col-md-4">
                                        <label for="inputEmail3" class="form_label">Search Referral:</label>
                                            <input type="text" class=" col-sm-4 form-control form-control-sm referal" name="referal[]" id="referal" placeholder="Search Referral">
                                            <input type="hidden" name="referal1[]" id="referal1" class="referal1">

                                    </div>
                                    <div class="group-form col-md-2">
                                        <label for="inputEmail3" class="form_label">Assign %:</label>
                                            <input type="text" class=" col-sm-4 form-control form-control-sm asignke" name="refAsign[]" id="refAsign[]" placeholder="Assign %">

                                        
                                    </div>
                                    <div class="group-form col-md-2">
                                        <label for="inputEmail3" class="form_label">Per Day:</label>
                                            <input type="text" class=" col-sm-4 form-control form-control-sm perkey" readonly name="refpday[]" id="refpday[]" placeholder="Per Day Amount">

                                        
                                    </div>
                                    <div class="group-form col-md-2">
                                        <label for="inputEmail3" class="form_label">Per Month:</label>
                                            <input type="text" class=" col-sm-4 form-control form-control-sm permkeys" readonly name="refpmonth[]" id="refpmonth[]"
                                                placeholder="Per Mounth Amount">
                                    </div>
                                     <div class="group-form col-md-2">
                                        
                                         <a class="col-sm-4 btn btn-sm form-control form-control-sm btn-danger add_more" id="add_more" style="margin-top:20px;">Add Referrals</a>
                                      <!--  <a class="col-sm-4 btn btn-sm form-control form-control-sm btn-danger remove" style="margin-top:20px;">Remove</a> -->
                                    </div>
                                    
                                </div>
                            </div></br>
                            <!-- <div class="row">
                                
                                <div class="group-form col-md-2">
                                    <a class="col-sm-4 btn btn-sm form-control form-control-sm btn-danger add_more" id="add_more">Add Referals</a>
                                </div>
                            </div></br> -->
                        </div>
                        <div class="box-footer">
                            <center>
                                <button type="submit" id="sub" class="btn btn-primary regsub">Submit</button>
                            </center>
                        </div>
                    </form>
                </div>
            </section>
        </div>                              
    </div>
    <script type="text/javascript" src="js/investment.js"></script>
    <?php include("footer.php"); ?>
</body>        
