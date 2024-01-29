<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <style>
            .error {
                color:red;
            }
            .gallery-images
            {
                width:100%;
                align-items:center;
            }
            .img
            {
                /* display:block; */
                /* width:30%; */
                float:left;
                /* height:25px; */
                margin:11px 8px;
                font-size:12px;
            }
            label
            {
                font-size:12px;
                /* width:100%; */
            }
        </style>
        <?php require_once("header.php"); ?>
        <script>
            $("#dyna").text("policy");
            tex();
        </script>
        <?php
            require_once("dbcon.php"); 
        ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <div class="group-form col-md-12">
                                <h3>
                                    <b>View Policy</b>
                                </h3>
                            </div>
                        </div></br>
                        <div>
                        <!-- <id="example1" class="table table-bordered table-striped"> -->
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:3%">id</th>
                                        <th style="width:10%">Name</th>
                                        <th style="width:5%">User</th>
                                        <th style="width:10%">Email</th>
                                        <th style="width:8%">Date</th>
                                        <th style="width:8%">Contact</th>
                                        <th style="width:8%">Whatsapp</th>
                                        <th style="width:8%">Ploicy</th>
                                        <th style="width:22%">Document</th>
                                        <th style="width:18%">Other</th>
                                    </tr>
                                </thead>
                                <tbody id="polici">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                $(document).ready(function()
                {
                        fetchData();
                });
                function fetchData()
                {
                    let log=$.ajax({
                        url: 'ajax/policies.php',
                        type: "POST",
                        data:{submit:"submit"},
                        datatype:'json',
                        cache:false,
                        success:function(data)
                        {
                            data1=JSON.parse(data);
                            $('#polici').empty();
                            var appendData='';
                            var i=0;
                            $.each(data1, function(index, item) 
                            {
                                var galleryArray = item.Documents.split(',');
                                    var labelsArray = item.labels.replace(/[\[\]"]/g, '').split(',');
                                    var labels2 = item.label2.replace(/[\[\]"]/g, '').split(',');
                                var imageHTML = '';
                                $.each(galleryArray, function(index2, img) 
                                {
                                    if(img.length > 0)
                                    {
                                        var label = labelsArray[index2];
                                        imageHTML += `<div class="img"><a href="API/${img}" download="API/${img}" class="download-link"><button>${label}</button></a></div>`;
                                    }
                                });

                                var otherArray = item.Other_Documents.split(',');
                                var otherHTML = '';
                               
                                     $.each(otherArray, function(index1, img1) 
                                    {
                                         if(img1.length > 0)
                                        {
                                            var label = labels2[index1];
                                            otherHTML += `<div class="img"><a href="API/${img1}" download="API/${img1}" class="download-link"><button>${label}</button></a></div>`;
                                        }
                                    });
                                
                                appendData=`<tr>
                                                <td>${index + 1}</td>
                                                <td>${item.Pname}</td>
                                                <td>${item.user}</td>
                                                <td>${item.email}</td>
                                                <td>${item.date}</td>
                                                <td>${item.Contact}</td>
                                                <td>${item.Whatsapp}</td>
                                                <td>${item.policy_on}</td>
                                                <td>
                                                    <div class="gallery-images">
                                                        ${imageHTML}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="gallery-images">
                                                        ${otherHTML}
                                                    </div>
                                                </td>
                                            </tr>`;
                                $('#polici').append(appendData);
                            });

                            oTable = $('#example1').dataTable({
                            searching: false,
                            pageLength : 10,
                            aLengthMenu: [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, "All"]
                            ],
                            iDisplayLength: -1
                        });  
                        }
                    });
                }
            </script>
        </div>
    </div>
</body>