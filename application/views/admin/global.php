<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/headscripts'); ?>

</head>
<body style="height: 100vh!important">

    <button data-toggle="modal" data-target=".addModal" title="Add new data" class="btn btn-add btn-lg"><i class="fa fa-plus"></i></button>

    <div class="container-fluid h-100">
        <div class="row h-100">
<?php $this->load->view('admin/sidebar'); ?>

            <div class="col-md-9 col-lg-9 content">
                <div class="top">
                    <h4 class="notosans" style="font-weight:700;margin-bottom:1rem">Covid Data Global
                        <span class="float-right" style="font-size:13px;font-weight:400">
                            Admin Page \ Covid Data Global
                        </span>
                    </h4>
                </div>
                <div class="bot">
                    <table id="maintable" class="table table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Negara</th>
                                <th>Positif</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($covs) > 0) {
                            $num = 1; foreach ($covs as $cov) {
                            ?>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $cov->dg_country; ?></td>
                                <td><?php echo number_format($cov->dg_pos, 0 , '.' , ',' ); ?></td>
                                <td><?php echo number_format($cov->dg_healed, 0 , '.' , ',' ); ?></td>
                                <td><?php echo number_format($cov->dg_died, 0 , '.' , ',' ); ?></td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="left" title="Edit" data-id="<?php echo $cov->dg_id; ?>" data-placement="left" title="Edit" class="btn btn-edit btn-sm btn-success"><i class="fal fa-edit"></i></button>
                                    <button data-toggle="tooltip" data-placement="left" title="Delete" data-id="<?php echo $cov->dg_id; ?>" class="btn btn-delete btn-sm btn-danger"><i class="fal fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php } } else { ?>
                            <tr>
                                <td colspan="6">Tidak ada data ditemukan</td>
                                <td style="display:none"></td>
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
                                <th>Negara</th>
                                <th>Positif</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
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
                    <h5 class="modal-title">Add Covid Data Global</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Negara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Positif</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="pos" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sembuh</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="healed" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Meninggal</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="died" required>
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
                    <h5 class="modal-title">Edit Covid Data Global</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Negara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Positif</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="pos" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sembuh</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="healed" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Meninggal</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" class="form-control" name="died" required>
                                <input type="hidden" name="id">
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
                let data = $(this).serializeArray();
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/dg_add',
                    data: data
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
                let data = $(this).serializeArray();
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/dg_edit',
                    data: data
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
                            url: uri + 'AdminController/dg_delete',
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
                $.get(uri + 'AdminController/findGlobal/' + id, function(response) {
                    let r = $.parseJSON(response);
                    $('#editForm input[name=country').val(r.dg_country);
                    $('#editForm input[name=pos').val(r.dg_pos);
                    $('#editForm input[name=healed').val(r.dg_healed);
                    $('#editForm input[name=died').val(r.dg_died);
                    $('#editForm input[name=id').val(r.dg_id);
                    $('.editModal').modal('show');
                });
            });

            $('.editModal').on('hidden.bs.modal', function () {
                $('#editForm').trigger("reset");
            })

        });
    </script>
</body>
</html>