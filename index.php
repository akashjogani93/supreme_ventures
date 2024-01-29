<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Investment</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">  
    
    
<style type="text/css">
    body {
        /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
        background-image: url("img/Group 150 (1).png");
        /* background-color: #946000; */
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        overflow-y: hidden;
        font-family: 'Ropa Sans', sans-serif;
    }


    .container-fluid {
        height: 100%;

        padding-bottom: 129px;
    }

    .main {
        float:right;
        height: 400px;
        margin-top: 6em;
        background-color: rgba(33, 37, 41, 0.7);
        width:300px;
        margin-top:150px;
    }

    .main label {
        color: #ffffff;
    }

    form {
        margin: 0px;
        padding: 0px;


    }

    h1 {
        color: white;
    }
    .m-4 {
    margin: 0.2rem!important;
}

.mt-2, .my-2 {
    margin-top: 2.5rem!important;
}



input {
        
        margin-top:10px;
        font-family: Inter;
        font-size: 16px;
        font-weight: 600;
        line-height: 19px;
        letter-spacing: 0em;
        color:black;
        /* padding:0px 10px 0px 5px; */
        display:block;
        width:100%;
        border:none;
        border-bottom:2px solid rgba(0, 0, 0, 0.6); 
    }
    input:focus 		{ outline:none; }

    ::placeholder{
        color:rgba(0, 0, 0, 0.6);
        font-family: Inter;
        font-size: 16px;
        font-weight: 600;
        line-height: 19px;
        letter-spacing: 0em;
        color:black;


    }


    /* LABEL ======================================= */

    label{
    color:rgba(0, 0, 0, 0.6); 
    font-size: 14px;
    font-weight: 600;
    line-height: 17px;
    letter-spacing: 0em;
color:rgba(0, 0, 0, 0.6);
    font-family: 'Inter';
    }
    .btn{
        font-family: 'Inter';
        font-size: 16px;
        font-weight: 600;
        line-height: 19px;
        letter-spacing: 0em;
        padding-top:15px;
        padding-bottom:15px;
        background-color:#031737;
        color:white;
    }
    .btn:hover{
        background-color:rgba(0, 0, 0, 0.6);
        color:white;
    }
    /* BOTTOM BARS ================================= */
    .bar 	{ position:relative; display:block; width:300px; }
    .bar:before, .bar:after 	{
    content:'';
    height:2px; 
    width:0;
    bottom:1px; 
    position:absolute;
    background:#5264AE; 
    transition:0.2s ease all; 
    -moz-transition:0.2s ease all; 
    -webkit-transition:0.2s ease all;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container ">
            <div class="col-md-3 form-control main">
                <div class="lobo text-center">
                    <h1 style="text-shadow: 2px 1px 5px white">WELCOME</h1>
                    <hr style="box-shadow: 2px 1px 5px white" class="border border-light">
                </div>
                <form action="login_check.php" method="post">
                    <div class="m-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Username" id="username"
                            name="uname" required autofocus>
                    </div>
                    <div class="m-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" placeholder="Password" id="password"
                            name="pass" required>
                    </div>

                    <div class="m-2 text-center">
                        <button type="submit"
                            class="btn btn-sm col-md-12 mt-2 btn-outline-warning">log-In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>




</html>