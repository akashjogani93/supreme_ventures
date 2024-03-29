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
            /* Ensure that the demo table scrolls */
            th, td { white-space: nowrap; }
            
            div.dataTables_wrapper {
               
                
            }
            
            .table-striped>tbody>tr:nth-child(odd)>td, 
            .table-striped>tbody>tr:nth-child(odd)>th 
            {
                background-color: #E5DCC3;
                padding:15px; 
            }
            .table-striped>tbody>tr:nth-child(even)>td, 
            .table-striped>tbody>tr:nth-child(even)>th 
            {
                background-color: #C9CCD5;
                padding:15px;  
            }
            
            table.dataTable thead {background-color:#D3E4CD}
            button.dt-button.buttons-csv.buttons-html5 {
                background-color: #4AA96C;
                color: white;
            }
            button.dt-button.buttons-excel.buttons-html5 {
                background-color: #4AA96C;
                color: white;
            }
            button.dt-button.buttons-print {
                background-color: #AF2D2D;
                color: white;
            }
            button.dt-button.buttons-pdf.buttons-html5 {
                background-color: #AF2D2D;
                color: white;
            }
        </style>
        
        <?php require_once("header.php"); 
        ?>
        <script>
            $("#dyna").text("Withdrawal Details");
            tex();
        </script>
        <script type="text/javascript">
            $(function() {
                
                $(".full").autocomplete({

                    source: 'widraw_searchName.php',
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
            });
        </script>
        <div class="content-wrapper">
            <!-- <section class="content-header">
                <h1>
                   Investment Details
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section> -->
            <section class="content">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="addform" method="POST">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="group-form col-md-2">
                                            <label for="inputEmail3" class="form_label">Apply Filters</label>
                                            <select class="col-sm-4 form-control form-control-sm" id="select" name="option">
                                                <option>Search By Name</option>
                                                <option>Search By Date</option>
                                                <option>Search By Amount</option>
                                                <option>Date & Amount</option>
                                                <option>Name & Amount</option>    
                                            </select>                
                                        </div>
                                        <div class="group-form col-md-4" id="namewise">
                                            <label for="inputEmail3" class="form_label">Search Name</label>
                                            <input  type="text" class="col-sm-4 form-control form-control-sm full" name="full" id="full" placeholder="Search Full Name" required="required">
                                            <input type="hidden" name="full1" id="full1">
                                        </div>
                                        <div class="group-form col-md-2" id="datewise1" style="display: none;">
                                            <label for="inputEmail3" class="form_label">Select From Date</label>
                                            <input  type="date"  class="col-sm-4 form-control form-control-sm" name="fromdate" id="fromdate">
                                        </div>
                                        <div class="group-form col-md-2" id="datewise2" style="display: none;">
                                            <label for="inputEmail3" class="form_label">Select To Date</label>
                                            <input type="date"  class="form-control" name="todate"  id="todate">
                                            <script>
                                                $(document).ready( function() {
                                                    var yourDateValue = new Date();
                                                    var formattedDate = yourDateValue.toISOString().substr(0, 10)
                                                    $('#todate').val(formattedDate);
                                                });
                                            
                                            </script>
                                        </div>
                                        <div class="group-form col-md-2" id="amt1" style="display: none;">
                                            <label for="inputEmail3" class="form_label">Amount To Start</label>
                                            <input type="text"  class="form-control form-control-sm" name="amtstart"  id="amtstart" placeholder="Amount TO Start">
                                        </div>
                                        <div class="group-form col-md-2" id="amt2" style="display: none;">
                                            <label for="inputEmail3" class="form_label">Amount TO Ending</label>
                                            <input type="text"  class="form-control form-control-sm" name="amtend"  id="amtend" placeholder="Amount TO Ending">
                                        </div>
                                        <div class="group-form col-md-1">
                                            <label for="inputEmail3" style="color:white;" class="form_label">..</label>
                                            <a type="button" id="search1" class="btn btn-primary">Load Data</a>
                                        </div>
                                        <div class="group-form col-md-1">
                                            <label for="inputEmail3" style="color:white;" class="form_label">..</label>
                                            <a href="withdraw_report.php" id="search" class="btn btn-warning">Refresh</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="group-form col-md-12">
                                <h3>
                                    <b>  withdrawal Report Details</b>
                                </h3>
                            </div>
                        </div></br>
                        
                        <!-- <center><h3>
                                Widrawal Report Details
                            </h3></center> -->
                        <div class="table-responsive" style="overflow-y:scroll; height: 560px; width:100% margin-left: 100px;" id="tablepdf">
                            <!-- <table id="example1" class="cell-border" cellspacing="0" style="width:100%"> -->
                            <table id="employee_grid" class="table table-striped table-bordered table-hover example1">
                                <thead>
                                    <tr>
                                        <th>Slno</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Withdraw Date</th>
                                        <th>Amount</th>    
                                        <th>Agreement</th>    
                                    </tr>
                                </thead>
                                <tbody id="mytable1">
                                    
                                </tbody>    
                                
                            </table>
                            <!-- <center><div class="loader"></div></center> -->

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>  -->
    <script type="text/javascript">
        $(document).ready(function()
        {   
            
            let log=$('#employee_grid').DataTable({
                "lengthMenu": [[100, -1], [100, "All"]],
              searching:false,
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                buttons: ['csv', 'excel'],
                "bProcessing": true,
                "serverSide": true,
                "ajax":{
                    url :"ajax/allWidrawal.php", // json datasource
                    type: "post",  // type of method ,GET/POST/DELETE
                    datatype: 'json',
                    data:{submit:'Submit'},
                    error: function(){
                        $("#employee_grid_processing").css("display","none");
                    }
                    // ,
                    // success:function(data)
                    // {
                    //     console.log(data);
                    // }
                }
            }); 
            $('#namewise').show();
            $('#datewise1').hide();
            $('#datewise3').hide();
            $('#amt1').hide();
            $('#amt2').hide();
            $('#select').change(function()
            {
                var option=$(this).val();
                //console.log(option);
                if(option=="Search By Date")
                {
                    $('#namewise').hide();
                    $('#amt1').hide();
                    $('#amt2').hide();
                    $('#datewise1').show();
                    $('#datewise2').show();
                    
                }
                else if(option=="Search By Name")
                {
                    $('#namewise').show();
                    $('#datewise1').hide();
                    $('#datewise2').hide();
                    $('#amt1').hide();
                    $('#amt2').hide();
                }
                else if(option=="Search By Amount")
                {
                    $('#namewise').hide();
                    $('#datewise1').hide();
                    $('#datewise2').hide();
                    $('#amt1').show();
                    $('#amt2').show();
                }
                else if(option=="Date & Amount")
                {
                    $('#namewise').hide();
                    $('#datewise1').show();
                    $('#datewise2').show();
                    $('#amt1').show();
                    $('#amt2').show();
                }
                else if(option=="Name & Amount")
                {
                    $('#namewise').show();
                    $('#amt1').show();
                    $('#amt2').show();
                    $('#datewise1').hide();
                    $('#datewise2').hide();
                    
                }
            });
            $('#search1').click(function()
            {
                //alert('hii');
                
                var filter=$('#select').val();
                if(filter=="Search By Name")
                {
                    $('#fromdate').val('');
                    $('#amtstart').val('');
                    $('#amtend').val('');
                    var cid=$('#full1').val();
                    var name=$('#full').val();
                    if(name=='')
                    {
                        alert('Please Select Name');
                        exit();
                    }
                    var table = $('#employee_grid').DataTable();
                    table.destroy();
                        let log=$('#employee_grid').DataTable({
                            "lengthMenu": [[100, -1], [100, "All"]],
                          searching:false,
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            buttons: ['csv', 'excel'],
                            "bProcessing": true,
                            "serverSide": true,
                            "ajax":{
                                url :"ajax/allWidrawal.php", // json datasource
                                type: "post",  // type of method ,GET/POST/DELETE
                                datatype: 'json',
                                data:{submit:'name',cid:cid},
                                error: function(){
                                    $("#employee_grid_processing").css("display","none");
                                }
                                // ,
                                // success:function(data)
                                // {
                                //     console.log(data);
                                // }
                            }
                        }); 
                }
                else if(filter=="Search By Date")
                {
                    $('#full1').val('');
                    $('#full').val('');
                    $('#amtstart').val('');
                    $('#amtend').val('');
                    //console.log(filter);
                    var fromdate=$('#fromdate').val();
                    var todate=$('#todate').val();
                    
                    if(fromdate=='')
                    {
                        alert('Please Select From Date');
                        exit();
                    }
                    var table = $('#employee_grid').DataTable();
                    table.destroy();
                        let log=$('#employee_grid').DataTable({
                            "lengthMenu": [[100, -1], [100, "All"]],
                          	searching:false,
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            buttons: ['csv', 'excel'],
                            "bProcessing": true,
                            "serverSide": true,
                            "ajax":{
                                url :"ajax/allWidrawal.php", // json datasource
                                type: "post",  // type of method ,GET/POST/DELETE
                                datatype: 'json',
                                data:{submit:'date',fromdate:fromdate,todate:todate},
                                error: function(){
                                    $("#employee_grid_processing").css("display","none");
                                }
                                // ,
                                // success:function(data)
                                // {
                                //     console.log(data);
                                // }
                            }
                        }); 
                }
                else if(filter=="Search By Amount")
                {
                    $('#full1').val('');
                    $('#full').val('');
                    $('#fromdate').val('');
                    var amtstart=$('#amtstart').val();
                    var amtend=$('#amtend').val();
                    if(amtstart=='')
                    {
                        alert('Add Starting Amount');
                        exit();
                    }
                    else if(amtend=='')
                    {
                        alert('Add Ending Amount');
                        exit();
                    }

                    var table = $('#employee_grid').DataTable();
                    table.destroy();
                        let log=$('#employee_grid').DataTable({
                            "lengthMenu": [[100, -1], [100, "All"]],
                          searching:false,
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            buttons: ['csv', 'excel'],
                            "bProcessing": true,
                            "serverSide": true,
                            "ajax":{
                                url :"ajax/allWidrawal.php", // json datasource
                                type: "post",  // type of method ,GET/POST/DELETE
                                datatype: 'json',
                                data:{submit:'amt',amtstart:amtstart,amtend:amtend},
                                error: function(){
                                    $("#employee_grid_processing").css("display","none");
                                }
                                // ,
                                // success:function(data)
                                // {
                                //     console.log(data);
                                // }
                            }
                        }); 
                }
                else if(filter=="Date & Amount")
                {
                    $('#full1').val('');
                    $('#full').val('');
                    var fromdate=$('#fromdate').val();
                    var todate=$('#todate').val();
                    var amtstart=$('#amtstart').val();
                    var amtend=$('#amtend').val();
                    if(fromdate=='')
                    {
                        alert('Please Select From Date');
                        exit();
                    }
                    else if(amtstart=='')
                    {
                        alert('Add Starting Amount');
                        exit();
                    }
                    else if(amtend=='')
                    {
                        alert('Add Ending Amount');
                        exit();
                    }

                    var table = $('#employee_grid').DataTable();
                    table.destroy();
                        let log=$('#employee_grid').DataTable({
                            "lengthMenu": [[100, -1], [100, "All"]],
                          searching:false,
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            buttons: ['csv', 'excel'],
                            "bProcessing": true,
                            "serverSide": true,
                            "ajax":{
                                url :"ajax/allWidrawal.php", // json datasource
                                type: "post",  // type of method ,GET/POST/DELETE
                                datatype: 'json',
                                data:{submit:'dateamt',fromdate:fromdate,todate:todate,amtstart:amtstart,amtend:amtend},
                                error: function(){
                                    $("#employee_grid_processing").css("display","none");
                                }
                                // ,
                                // success:function(data)
                                // {
                                //     console.log(data);
                                // }
                            }
                        });     
                }
                else if(filter=="Name & Amount")
                {
                    $('#fromdate').val('');
                    var cid=$('#full1').val();
                    var name=$('#full').val();
                    var amtstart=$('#amtstart').val();
                    var amtend=$('#amtend').val();
                    if(name=='')
                    {
                        alert('Please Select Name');
                        exit();
                    }
                    else if(amtstart=='')
                    {
                        alert('Add Starting Amount');
                        exit();
                    }
                    else if(amtend=='')
                    {
                        alert('Add Ending Amount');
                        exit();
                    }

                    var table = $('#employee_grid').DataTable();
                    table.destroy();
                        let log=$('#employee_grid').DataTable({
                            "lengthMenu": [[100, -1], [100, "All"]],
                          searching:false,
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            buttons: ['csv', 'excel'],
                            "bProcessing": true,
                            "serverSide": true,
                            "ajax":{
                                url :"ajax/allWidrawal.php", // json datasource
                                type: "post",  // type of method ,GET/POST/DELETE
                                datatype: 'json',
                                data:{submit:'nameamt', cid:cid,amtstart:amtstart,amtend:amtend},
                                error: function(){
                                    $("#employee_grid_processing").css("display","none");
                                }
                                // ,
                                // success:function(data)
                                // {
                                //     console.log(data);
                                // }
                            }
                        });   
                }
            });
         
          //$('.file-input').on('change', function() 
          //{
            
           /* var row = $(this).closest('tr');
            var id = row.find('td:first').text();
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
              var fileData = e.target.result;
              // Construct your update query using the id and fileData variables
            };

            reader.readAsText(file); */
          //});
          //debugger;
        });
    </script>
	<script>
      	function bondchange(input)
        {
			
          	var row = $(input).closest('tr');
  			var id = row.find('td:eq(0)').text();
          	var file = input.files[0];
    		var reader = new FileReader();
			reader.onload = function(e) {
      		var fileData = e.target.result;
             $.ajax({
            url: 'ajax/update_file.php',
            type: 'POST',
            data: {
              id: id,
              file: fileData
            },
            success: function(response) 
            {
              alert(response)
              console.log(response)
            },
            error: function(xhr, status, error) {
              console.log('Error updating file: ' + error);
            }
          });
        };

        reader.readAsText(file);
      }
      
	</script>
</body>
