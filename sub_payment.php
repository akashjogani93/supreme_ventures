<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <style>
            .error {
                color: red;
            }
        </style>
        <?php require_once("header.php"); ?>
            
        <div class="content-wrapper" style="border:1px solid black;">
            <section class="content-header">
                <h1>
                    Matched Personal Details
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section>

            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="group-form col-md-2">
                                <label for="inputEmail3" class="form_label">ID:</label>
                                    <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="cid" id="cid" value="<?php echo $id;?>">
                            </div>
                            <div class="group-form col-md-4">
                                <label for="inputEmail3" class="form_label">Full Name:</label>
                                    <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="name" id="name"
                                        placeholder="Account No">

                                
                            </div>
                            <div class="group-form col-md-3">
                                <label for="inputEmail3" class="form_label">Bank Name:</label>
                                    <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="bank" id="bank"
                                        placeholder="Bank Name">

                                
                            </div>
                            <div class="group-form col-md-3">
                                <label for="inputEmail3" class="form_label">Account No:</label>
                                    <input type="text" class=" col-sm-4 form-control form-control-sm" readonly name="acc" id="acc"
                                        placeholder="Mobile Number">
                            </div>
                        </div></br>
                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered table-hover example1">
                            <thead>
                                <tr>
                                    <th>Invt Id</th>
                                    <th>Invt Date</th>
                                    <th>Invt Amount</th>
                                    <th>%</th>
                                    <th>Per Day Amount</th>
                                    <th>Total Days</th>
                                    <th>Total Interest</th>
                                    <th>Month Amount</th>
                                </tr>
                            </thead>
                            <tbody class="mytable">
                            </tbody>    
                        </table>
                    </div>   
                </div>   
            </section>
        </div>                              
    </div>
    <?php include("footer.php"); ?>
        
        <script>
            $(document).ready(function()
            {
                var cid=$('#cid').val();
                console.log(cid);
                let log=$.ajax({
                    url:"ajax/sub_payment_ajax.php",
                    method:"POST",
                    dataType: 'json',
                    data:{cid:cid},
                    
                    success:function(data)
                    {
                        // console.log(data)
                        $('#bank').val(data[0].bank);
                        $('#name').val(data[0].full);
                        $('#acc').val(data[0].account);
                       
                    }
                });
                console.log(log);
                    let log1=$.ajax({
                    url:"ajax/sub_payment_report.php",
                    method:"POST",
                    data:{cid:cid},
                    cache:false,
                    success:function(data)
                    {
                        $('.mytable').append(data);
                        $('#example1').dataTable({
                        pageLength : 10,
                        
                        pageLength : 10,
                        "lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]],
                        language: {
                            'paginate': {
                            'previous': '<a type="button" class="btn btn-primary">Previous</a>',
                            'next': '<a type="button" class="btn btn-primary">Next</a>'
                            }
                        }
                        
                        });
                       
                    }
                });//console.log(log1);
                
            });
        </script>
        
        

</body>        
