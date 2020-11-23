<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/headscripts'); ?>

</head>
<body class="vh-100">

    <button data-toggle="modal" data-target=".addModal" title="Add new data" class="btn btn-add btn-lg"><i class="fa fa-plus"></i></button>

    <div class="container-fluid h-100">
        <div class="row h-100">
<?php $this->load->view('admin/sidebar'); ?>

            <div class="col-md-9 col-lg-9 content">
                <div class="top">
                    <h4 class="notosans" style="font-weight:700;margin-bottom:1rem">Hotlines
                        <span class="float-right" style="font-size:13px;font-weight:400">
                            Admin Page \ Hotlines
                        </span>
                    </h4>
                </div>
                <div class="bot">
                    <table id="maintable" class="table table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kontak</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($hots) > 0) {
                            $num = 1; foreach ($hots as $hot) {
                            ?>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $hot->hl_number; ?></td>
                                <td><?php echo $hot->hl_name; ?></td>
                                <td><?php echo ($hot->hl_img) ? '<img width="75" src="'. base_url('assets/images/hotlines/' . $hot->hl_img) .'"/>' : '<span class="badge badge-danger">No image</span>'; ?></td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="left" title="Edit" data-id="<?php echo $hot->hl_id; ?>" data-placement="left" title="Edit" class="btn btn-edit btn-sm btn-success"><i class="fal fa-edit"></i></button>
                                    <button data-toggle="tooltip" data-placement="left" title="Delete" data-id="<?php echo $hot->hl_id; ?>" class="btn btn-delete btn-sm btn-danger"><i class="fal fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php } } else { ?>
                            <tr>
                                <td colspan="5">Tidak ada data ditemukan</td>
                                <td style="display:none"></td>
                                <td style="display:none"></td>
                                <td style="display:none"></td>
                                <td style="display:none"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Kontak</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Hotlines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="img" accept="image/x-png, image/gif, image/jpeg" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submitButton" data-target="#addForm">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Hotlines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="img2" accept="image/x-png, image/gif, image/jpeg" required>
                                <input type="hidden" name="id">
                            </div>
                            <div class="col-sm-3 col-img">
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submitButton" data-target="#editForm">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
<?php $this->load->view('admin/bottomscripts'); ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#maintable').DataTable();
            $('[data-toggle="tooltip"]').tooltip();

            var uri = '<?php echo base_url(); ?>';

            $('.submitButton').click(function() {
                let f = $(this).attr('data-target');
                $(f).submit();
            });

            $('#addForm').submit(function(e) {
                e.preventDefault();
                let data = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/hl_add',
                    data: data,
                    processData: false,
                    contentType: false
                }).done(function(response) {
                    let r = $.parseJSON(response);
                    if (r.stats == 1) {
                        swalSuccess(r.msg);
                    } else {
                        swalError(r.msg);
                    }
                });
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                let data = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/hl_edit',
                    data: data,
                    processData: false,
                    contentType: false
                }).done(function(response) {
                    let r = $.parseJSON(response);
                    if (r.stats == 1) {
                        swalSuccess(r.msg);
                    } else {
                        swalError(r.msg);
                    }
                });
            });
            

            $('#maintable tbody').on('click', '.btn-delete', function () {
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Apa anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Kembali',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'POST',
                            url: uri + 'AdminController/hl_delete',
                            data: {id: id}
                        }).done(function(response) {
                            let timerInterval
                            Swal.fire({
                                title: 'Data berhasil dihapus',
                                html: 'Memuat ulang laman dalam <b></b>..',
                                icon: 'success',
                                timer: 1000,
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
                        });
                    }
                })
            });

            $('#maintable tbody').on('click', '.btn-edit', function () {
                let id = $(this).attr('data-id');
                $.get(uri + 'AdminController/findHotline/' + id, function(response) {
                    let r = $.parseJSON(response);
                    $('#editForm input[name=number').val(r.hl_number);
                    $('#editForm input[name=name').val(r.hl_name);
                    $('#editForm input[name=id').val(r.hl_id);
                    if (r.hl_img != '') {
                        $('#editForm .col-img').html('<img src="' + uri + 'assets/images/hotlines/' + r.hl_img + '"/>');
                    } else {
                        $('#editForm .col-img').html('<span class="badge badge-danger">No image</span>');
                    }
                    $('.editModal').modal('show');
                });
            });

            $('.editModal').on('hidden.bs.modal', function () {
                $('#editForm').trigger("reset");
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.col-img').html('');
                        $('.col-img').html('<img/>');
                        $('.col-img img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(document ).on('change','#editForm input[name=img2]' , function(){
                readURL(this);
            });

        });

    </script>
</body>
</html>