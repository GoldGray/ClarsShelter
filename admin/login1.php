<?php
    require_once './function/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="row">
        <div class="col-lg-7 m-auto">

            <div class="card mt-5">

                <div class="class-header">
                    <h3>login</h3>
                </div>
                <?php
                login_system();
                 display_message(); 
                 ?>
                <div class="card-body">
                    <form method="POST">
                        <input type="text" class="form-control mb-2" placeholder="Username or email" name="username">
                        <input type="password" class="form-control" placeholder="password" name="password">


                </div>

                    <div class="card-footer">
                        <button   button class="btn btn-primary" name="btn_login">Login</button>
                
                    </form>
                 </div>
            </div>


        </div>

       
        
    </div>



</body>

</html>