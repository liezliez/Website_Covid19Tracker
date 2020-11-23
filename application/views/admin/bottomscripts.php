    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    <script type="text/javascript">
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
    </script>