<body class="hold-transition skin-blue sidebar-mini">
<link rel="stylesheet" href="loader.css">
    <div class="wrapper" id="form1">
        <style>
            .error {
                color: red;
            }

            #employee_grid tbody tr:hover {
                background-color: pink;
                }
        </style>
        <?php require_once("header.php"); ?>
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
            <script>
                $("#dyna").text("team referal Details");
                tex();
            </script>
            <section class="content">
                
                <div class="box">
                    <div class="box-body">
        </br>
                        <table id="employee_grid" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Full Name</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody class="mytable1" id="tb">
                            
                            </tbody>
                        </table>
                        <!-- <center><div class="loader"></div></center> -->
                    </div>
                </div>
            </section>


        </div>
    </div>
    <script type="text/javascript" src="js/team_view.js"></script>
    <?php require_once("footer.php"); ?>
</body>
