<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="TfJocSVsNWexYkZykdGKFNETBWgfhhwgDKRHCJNu">

    <title>PPDB | Login Admin</title>
    <link rel="icon" type="image/ico" href="<?= base_url('assets/templates/front/'); ?>img/smk.png">

    <link rel="stylesheet" href="<?= base_url('assets/templates/front/'); ?>css/app.css">
    <link href="<?= base_url('assets/templates/front/'); ?>css/style.css?v=1.2" rel="stylesheet">

    <script src="<?= base_url('assets/templates/front/'); ?>js/jquery.min.js"></script>

    <style>
        body {
            padding-top: 0px ;
        }
        .misc-box {
            box-shadow: 0px 0px 0px 0px #888888;
            transition: 0.2s;
            border-radius: 5px;
        }
        .misc-box:hover {
            box-shadow: 0px 0px 5px 5px #888888;
            border-radius: 10px;
        }
        .btn {
            border-radius: 2px !important;
            transition: 0.2s;
        }
        .btn:hover {
            border: 1px solid red !important;
        }
    </style>

</head>
<div class="flash_data" data-flash_data="<?= $this->session->flashdata('error');?>"></div>

<body class="bg-light" style="height: auto;background-image:url(<?= base_url('assets/templates/front/'); ?>img/bg-3.jpg);">
    <div id="app" class="misc-wrapper">
        <div class="misc-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center mb-3">
                        <a href="<?= base_url();?>" title="Kembali ke Dashboard">
                            <img alt="" src="<?= base_url('assets/templates/front/'); ?>img/smk.png" class="logo-icon margin-r-10">
                        </a>
                        <br><br>
                        <h3>ADMINISTRATOR</h3>
                        <h5>Penerimaan Peserta Didik Baru</h5>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="misc-box">
                            <form id="main-form" role="form" method="POST" action="<?= base_url('auth/login_admin'); ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash() ;?>" style="display:none">
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input id="username" name="username" type="email" value="" placeholder="Email " class="form-control " required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i> </span>
                                        </div>
                                        <input id="pass" name="pass" type="password" value="" placeholder="Password " class="form-control " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validasi">Validasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i> </span>
                                        </div>
                                        <input id="validasi" name="validasi" type="text" value="" placeholder="<?= $a.' + '.$b.' = ....';?>" class="form-control " required>
                                    </div>
                                </div>

                                

                                

                                <div class="clearfix">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-flat btn-primary btn-block"><i class="fa fa-sign-in"></i> Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center misc-footer">
                            <p class="small">
                                Copyright &copy; 2020 | Penerimaan Peserta Didik Baru 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/templates/front/'); ?>js/popper.min.js">
    </script>
    <script src="<?= base_url('assets/templates/front/'); ?>js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    </script>
    <!-- Scripts -->
    
    <!-- <script src="<?= base_url('assets/templates/front/'); ?>js/sweetalert.all.js"></script> -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const flash_data = $('.flash_data').data('flash_data');
           
            if (flash_data) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: flash_data,
                })
           }
        })
        </script>

</body>

</html>