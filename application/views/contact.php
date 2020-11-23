<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('headscripts'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sweetalert2.min.css'); ?>">

</head>
<body>

    <div class="page">
<?php $this->load->view('navbar'); ?>
        <div class="container" style="margin-top:60px;margin-bottom:35px">
            <div class="text-center">
                <h1>Hubungi Kami</h1>
                <p style="margin-top:20px;font-size:19px">Lengkapi form di bawah untuk mengirim pesan</p>
            </div>
            <div class="row justify-content-center" style="margin-top:45px">
                <div class="col-md-5">
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control shadow" name="name">
                            <div class="line"></div>
                            <label>Nama</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control shadow" name="email">
                            <div class="line"></div>
                            <label>Email</label>
                        </div>
                        <div class="form-group">
                            <textarea name="msg" class="form-control shadow"></textarea>
                            <div class="line"></div>
                            <label>Pesan</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary noborder" style="padding:.375rem 1.05rem">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
<?php $this->load->view('footer'); ?>
    </div>
<?php $this->load->view('bottomscripts'); ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>

    <script type="text/javascript">

        var uri = '<?php echo base_url(); ?>';

        function swalSuccess(title) {
            Swal.fire({
                title: title,
                html: 'Memuat ulang laman dalam <b></b>..',
                icon: 'success',
                timer: 1200,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                                b.textContent = Swal.getTimerLeft()
                            }
                        }
                    }, 100)
                },
                onClose: () => {
                    window.location.reload(false);
                }
            });
        }
        function swalError(msg) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: msg
            })
        }
    
        $('.contact-form').submit(function(e) {
            e.preventDefault();
            let data = $(this).serializeArray();
            $.ajax({
                method: 'POST',
                url: uri + 'AdminController/msg_add',
                data: data
            }).done(function(response) {
                // console.log(response);
                let r = $.parseJSON(response);
                if (r.stats == 1) {
                    swalSuccess(r.msg);
                } else {
                    swalError(r.msg);
                }
            });
        });

        function checkForInput(element) {
            const $label = $(element).siblings('label');
            if ($(element).val().length > 0) {
                $label.addClass('contactlabel');
            } else {
                $label.removeClass('contactlabel');
            }
        }

        $('input').each(function() {
            checkForInput(this);
        });
        $('input').on('change keyup', function() {
            checkForInput(this);
        });

        $('textarea').each(function() {
            checkForInput(this);
        });
        $('textarea').on('change keyup', function() {
            checkForInput(this);
        });

    </script>

</body>
</html>