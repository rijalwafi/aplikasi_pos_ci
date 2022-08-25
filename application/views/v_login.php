<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $title; ?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico">

        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <!-- <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home h1"></i></a>
        </div> -->

        <div class="account-pages">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div>
                            <div >
                                <a href="index.html" class="logo logo-admin"><!-- <img src="<?php echo base_url()?>assets/images/logo_dark.png" height="28" alt="logo"> -->&nbsp;</a>
                            </div>
                            
                            <h5 class="font-14 text-muted mb-4">Aplikasi Persediaan Stok Barang dengan Metode FIFO</h5>
                            <p class="text-muted mb-4">
                                Bertujuan untuk skripsi.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-2"><center>
                                    <h4>Halaman Login</h4>
                                    <div>
                                        <a href="index.html" class="logo logo-admin">&nbsp;</a>
                                        
                                    </center>
                                    </div>

                                </div>
                            
                        
        
                                <div class="p-2">
                                    <?php if (!empty($this->session->flashdata('gagal-login'))):?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" id="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Gagal !</strong> <?php echo $this->session->flashdata('gagal-login'); ?>
                                        </div>
                                    <?php endif ?>
                                    <form class="form-horizontal m-t-20" action="<?php echo base_url('C_login/proses_login')?>" method="post">
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" required="" placeholder="Username" name="username">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
        
                                        <!-- <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                            <div class="col-sm-5 m-t-20">
                                                <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                            </div>
                                        </div> -->
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>



        <!-- jQuery  -->
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/detect.js"></script>
        <script src="<?php echo base_url()?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url()?>assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url()?>assets/js/app.js"></script>
        <script>
           
                setTimeout(function() { 
                    $('#alert').fadeOut('slow'); 
                }, 4000); 
        </script>
    </body>
</html>