<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/c3.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sweetalert2.min.css'); ?>">

    <style>

        body {
            background-image: url(../assets/images/dust_scratches.png);
        }

    </style>

</head>
<body class="vh-100">

    <div class="container h-100">
        <div class="row h-100 justify-content-center">
            <div class="col-md-5">
                <div class="card service shadow" style="margin-top:50%">
                    <div class="card-body">
                        <div class="item-box">
                            <h4 class="text-center">-- Login Admin --</h4>
                            <form id="formLogin" style="margin-top:24px">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control shadow" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control shadow" name="password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block" style="padding:.375rem 1.05rem">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    <script type="text/javascript">

        var uri = '<?php echo base_url(); ?>';
    
        $(document).ready(function() {
            $('#formLogin').submit(function(e) {
                e.preventDefault();
                let data = $(this).serializeArray();
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/do_login',
                    data: data
                }).done(function(response) {
                    let r = $.parseJSON(response);
                    if (r.stats == 1) {
                        document.location.href = uri + 'admin';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Username atau Password salah'
                        })
                    }
                });
            });
        });
    
    </script>
</body>
</html>