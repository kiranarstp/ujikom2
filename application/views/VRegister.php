<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <!-- <link href="assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <style>
        /* Background animation */
        body {
            background: linear-gradient(-45deg, #B784B7, #A94438, #74E291, #A94438);
            background-size: 400% 400%;
            animation: gradientBG 5s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="bg-gradient-style">

    <div class="container">
    <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-3">Create an Account!</h1>
                            </div>
                            <form class="user" action="<?php echo site_url('Regis/registerNewUser');?>" method="post">
                            <?= $this->session->flashdata('msg'); ?>
                                <input type="hidden" class="form-control form-control-user" name="UserID" placeholder="ID User">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Username" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="NamaLengkap" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Alamat" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Email" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="Password" class="form-control form-control-user" name="Password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="Password" class="form-control form-control-user" name="ConfirmPassword" placeholder="ConfirmPassword">
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block">Register Account</button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo site_url('Login')?>">Already have an account?
                                    Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<tbody>
    <?php
                if (!empty($DataRegis)) {
                    $no = 1; }
                    foreach ($DataRegis as $ReadDS) { 
                    }
                ?>
</tbody>

</html>