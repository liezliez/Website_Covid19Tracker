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
                    <h4 class="notosans" style="font-weight:700;margin-bottom:1rem">Covid Data Indonesia
                        <span class="float-right" style="font-size:13px;font-weight:400">
                            Admin Page \ Covid Data Indonesia
                        </span>
                    </h4>
                </div>
                <div class="bot">
                    <table id="maintable" class="table table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Provinsi</th>
                                <th>Dirawat di</th>
                                <th>Tanggal</th>
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
                                <td><?php echo $cov->dl_age; ?></td>
                                <td>
                                    <?php
                                    if ($cov->dl_gender == 'male') {
                                        echo '<img src="' . base_url('assets/images/man.png') . '" style="width:1.6rem">';
                                    } elseif ($cov->dl_gender == 'female') {
                                        echo '<img src="' . base_url('assets/images/woman.png') . '" style="width:1.6rem">';
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($cov->dl_stats == 'pos')  {
                                        echo '<span class="badge badge-primary">Positif</span>';
                                    } elseif ($cov->dl_stats == 'neg') {
                                        echo '<span class="badge badge-warning">Negatif</span>';
                                    } elseif ($cov->dl_stats == 'healed') {
                                        echo '<span class="badge badge-success">Sembuh</span>';
                                    } elseif ($cov->dl_stats == 'died') {
                                        echo '<span class="badge badge-danger">Meninggal</span>';
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $cov->dl_states; ?></td>
                                <td><?php echo $cov->dl_hospital; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($cov->dl_date)); ?></td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="left" title="Edit" data-id="<?php echo $cov->dl_id; ?>" data-placement="left" title="Edit" class="btn btn-edit btn-sm btn-success"><i class="fal fa-edit"></i></button>
                                    <button data-toggle="tooltip" data-placement="left" title="Delete" data-id="<?php echo $cov->dl_id; ?>" class="btn btn-delete btn-sm btn-danger"><i class="fal fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php } } else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data ditemukan</td>
                                <td style="display:none"></td>
                                <td style="display:none"></td>
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
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Provinsi</th>
                                <th>Dirawat di</th>
                                <th>Tanggal</th>
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
                    <h5 class="modal-title">Add Covid Data Indonesia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                                <input name="age" min="0" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="padding-top:0">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="gendermale" name="gender" type="radio" value="male">
                                    <label class="form-check-label" for="gendermale">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="genderfemale" name="gender" type="radio" value="female">
                                    <label class="form-check-label" for="genderfemale">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="padding-top:0">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_pos" value="pos">
                                    <label class="form-check-label" for="stats_pos">Positif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_neg" value="neg">
                                    <label class="form-check-label" for="stats_neg">Negatif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_healed" value="healed">
                                    <label class="form-check-label" for="stats_healed">Sembuh</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_died" value="died">
                                    <label class="form-check-label" for="stats_died">Meninggal</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="states">
                                    <option selected>Pilih Provinsi</option>
                                    <option>Nanggroe Aceh Darussalam</option>   
                                    <option>Sumatera Utara</option>
                                    <option>Sumatera Barat</option>
                                    <option>Riau</option>
                                    <option>Kepulauan Riau</option>
                                    <option>Jambi</option>
                                    <option>Bengkulu</option>
                                    <option>Sumatera Selatan</option>
                                    <option>Kepulauan Bangka Belitung</option>
                                    <option>Lampung</option>
                                    <option>Banten</option>
                                    <option>DKI Jakarta</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                    <option>Jawa Timur</option>
                                    <option>DI Yogyakarta</option>
                                    <option>Bali</option>
                                    <option>Nusa Tenggara Barat</option>
                                    <option>Nusa Tenggara Timur</option>
                                    <option>Kalimantan Barat</option>
                                    <option>Kalimantan Selatan</option>
                                    <option>Kalimantan Tengah</option>
                                    <option>Kalimantan Timur</option>
                                    <option>Kalimantan Utara</option>
                                    <option>Gorontalo</option>
                                    <option>Sulawesi Barat</option>
                                    <option>Sulawesi Selatan</option>
                                    <option>Sulawesi Tenggara</option>
                                    <option>Sulawesi Tengah</option>
                                    <option>Sulawesi Utara</option>
                                    <option>Maluku</option>
                                    <option>Maluku Utara</option>
                                    <option>Papua</option>
                                    <option>Papua Barat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dirawat di</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hospital">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal kejadian</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date">
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
                    <h5 class="modal-title">Edit Covid Data Indonesia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                                <input name="age" min="0" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="padding-top:0">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="gendermale2" name="gender" type="radio" value="male">
                                    <label class="form-check-label" for="gendermale2">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="genderfemale2" name="gender" type="radio" value="female">
                                    <label class="form-check-label" for="genderfemale2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" style="padding-top:0">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_pos2" value="pos">
                                    <label class="form-check-label" for="stats_pos2">Positif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_neg2" value="neg">
                                    <label class="form-check-label" for="stats_neg2">Negatif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_healed2" value="healed">
                                    <label class="form-check-label" for="stats_healed2">Sembuh</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="stats" type="radio" id="stats_died2" value="died">
                                    <label class="form-check-label" for="stats_died2">Meninggal</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="states">
                                    <option selected>Pilih Provinsi</option>
                                    <option>Nanggroe Aceh Darussalam</option>   
                                    <option>Sumatera Utara</option>
                                    <option>Sumatera Barat</option>
                                    <option>Riau</option>
                                    <option>Kepulauan Riau</option>
                                    <option>Jambi</option>
                                    <option>Bengkulu</option>
                                    <option>Sumatera Selatan</option>
                                    <option>Kepulauan Bangka Belitung</option>
                                    <option>Lampung</option>
                                    <option>Banten</option>
                                    <option>DKI Jakarta</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                    <option>Jawa Timur</option>
                                    <option>DI Yogyakarta</option>
                                    <option>Bali</option>
                                    <option>Nusa Tenggara Barat</option>
                                    <option>Nusa Tenggara Timur</option>
                                    <option>Kalimantan Barat</option>
                                    <option>Kalimantan Selatan</option>
                                    <option>Kalimantan Tengah</option>
                                    <option>Kalimantan Timur</option>
                                    <option>Kalimantan Utara</option>
                                    <option>Gorontalo</option>
                                    <option>Sulawesi Barat</option>
                                    <option>Sulawesi Selatan</option>
                                    <option>Sulawesi Tenggara</option>
                                    <option>Sulawesi Tengah</option>
                                    <option>Sulawesi Utara</option>
                                    <option>Maluku</option>
                                    <option>Maluku Utara</option>
                                    <option>Papua</option>
                                    <option>Papua Barat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dirawat di</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hospital">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal kejadian</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <input type="hidden" name="id">
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
                    url: uri + 'AdminController/dl_add',
                    data: data
                }).done(function(response) {
                    // console.log(response);
                    let r = $.parseJSON(response);
                    alert(r.msg);
                    if (r.stats == 1) {
                        window.location.reload(false);
                    }
                });
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                let data = $(this).serializeArray();
                $.ajax({
                    method: 'POST',
                    url: uri + 'AdminController/dl_edit',
                    data: data
                }).done(function(response) {
                    let r = $.parseJSON(response);
                    alert(r.msg);
                    if (r.stats == 1) {
                        window.location.reload(false);
                    }
                });
            });

            $('.btn-delete').click(function(e) {
                let id = $(this).attr('data-id');
                let conf = confirm('Apakah anda yakin?');
                if (conf) {
                    $.ajax({
                        method: 'POST',
                        url: uri + 'AdminController/dl_delete',
                        data: {id: id}
                    }).done(function(response) {
                        alert('Data berhasil dihapus');
                        window.location.reload(false);
                    });
                }
            });

            $('.btn-edit').click(function(e) {
                let id = $(this).attr('data-id');
                $.get(uri + 'AdminController/findLokal/' + id, function(response) {
                    let r = $.parseJSON(response);
                    $('#editForm input[name=age').val(r.dl_age);
                    if (r.dl_gender != '') {
                        $('#editForm input[name=gender][value=' + r.dl_gender + ']').prop('checked', true);
                    }
                    if (r.dl_stats != '') {
                        $('#editForm input[name=stats][value=' + r.dl_stats + ']').prop('checked', true);
                    }
                    if (r.dl_states != '-') {
                        $("#editForm select[name=states]").val(r.dl_states);
                    } else {
                        $("#editForm select[name=states]").val('Pilih Provinsi');
                    }
                    $('#editForm input[name=hospital').val(r.dl_hospital);
                    $('#editForm input[name=date').val(r.dl_date);
                    $('#editForm input[name=id').val(r.dl_id);
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