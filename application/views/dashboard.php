<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('headscripts'); ?>
</head>
<body>

    <div class="page">
<?php $this->load->view('navbar'); ?>
        <div class="container" style="margin-top:60px;margin-bottom:15px">
            <div class="text-center">
                <h1>CORONA TRACKER</h1>
                <p style="margin-top:20px;font-size:19px">Coronavirus Indonesia Live Data</p>
            </div>
            <!-- row 1 open -->
            <div class="row card-row" style="margin-top:60px">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card card-banner text-white bg-primary mb-3 shadow">
                        <div class="card-body homecard">
                            <p>TOTAL POSITIF</p>
                            <h3><?php echo $pos; ?></h3>
                            <p>ORANG</p>
                        </div>
                        <i class="fal fa-bed fa-4x"></i>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card card-banner text-white bg-warning mb-3 shadow">
                        <div class="card-body homecard">
                            <p>TOTAL NEGATIF</p>
                            <h3><?php echo $neg; ?></h3>
                            <p>ORANG</p>
                        </div>
                        <i class="fal fa-search-minus fa-4x"></i>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card card-banner text-white bg-success mb-3 shadow">
                        <div class="card-body homecard">
                            <p>TOTAL SEMBUH</p>
                            <h3><?php echo $healed; ?></h3>
                            <p>ORANG</p>
                        </div>
                        <i class="fal fa-heart fa-4x"></i>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card card-banner text-white bg-danger mb-3 shadow">
                        <div class="card-body homecard">
                            <p>TOTAL MENINGGAL</p>
                            <h3><?php echo $died; ?></h3>
                            <p>ORANG</p>
                        </div>
                        <i class="fal fa-heart-broken fa-4x"></i>
                    </div>
                </div>
                <!-- <div class="col text-center">
                    <p style="margin-top:16px;font-size:13px">Sumber data : Kementerian Kesehatan & JHU. Update terakhir : 27 Maret 2020 03:35:09 WIB</p>
                </div> -->
            </div>
            <!-- row 1 end -->
            <div class="row statistik" style="margin-top:6px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-16">
                    <div class="card noborder shadow">
                        <div class="card-header bg-white">
                            <h4 class="card-title notosans"><strong>Statistik Kasus Coronavirus di Indonesia</strong></h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row global" style="margin-top:20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-16">
                    <div class="card noborder shadow">
                        <div class="card-header bg-white">
                            <h4 class="card-title notosans"><strong>Data Coronavirus Indonesia</strong></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover global-table">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Umur</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Provinsi</th>
                                            <th>Dirawat di</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 1; foreach ($locals as $local) { ?>
                                        <tr>
                                            <td><?php echo $num++; ?></td>
                                            <td><?php echo $local->dl_age; ?></td>
                                            <td>
                                                <?php
                                                if ($local->dl_gender == 'male') {
                                                    echo '<img src="' . base_url('assets/images/man.png') . '" style="width:1.6rem">';
                                                } elseif ($local->dl_gender == 'female') {
                                                    echo '<img src="' . base_url('assets/images/woman.png') . '" style="width:1.6rem">';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($local->dl_stats == 'pos')  {
                                                    echo '<span class="badge badge-primary">Positif</span>';
                                                } elseif ($local->dl_stats == 'neg') {
                                                    echo '<span class="badge badge-warning">Negatif</span>';
                                                } elseif ($local->dl_stats == 'healed') {
                                                    echo '<span class="badge badge-success">Sembuh</span>';
                                                } elseif ($local->dl_stats == 'died') {
                                                    echo '<span class="badge badge-danger">Meninggal</span>';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $local->dl_states; ?></td>
                                            <td><?php echo $local->dl_hospital; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row global" style="margin-top:20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-16">
                    <div class="card noborder shadow">
                        <div class="card-header bg-white">
                            <h4 class="card-title notosans"><strong>Data Coronavirus Global</strong></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover global-table">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Negara</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 1; foreach ($globals as $global) { ?>
                                        <tr>
                                            <td><?php echo $num++; ?></td>
                                            <td><?php echo $global->dg_country; ?></td>
                                            <td><?php echo number_format($global->dg_pos, 0 , '.' , ',' ); ?></td>
                                            <td><?php echo number_format($global->dg_healed, 0 , '.' , ',' ); ?></td>
                                            <td><?php echo number_format($global->dg_died, 0 , '.' , ',' ); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('footer'); ?>
    </div>

<?php $this->load->view('bottomscripts'); ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/chart.js'); ?>"></script>
    <script type="text/javascript">

        var uri = '<?php echo base_url(); ?>';
        
        var charts = {labels: [], datas: []};
        
        $.get(uri + 'DashboardController/getStatPos', function(response) {
            let r = $.parseJSON(response);
            r.forEach(function(entry) {
                charts['labels'].push(entry.dl_date);
                charts['datas'].push(entry.num);
            });
            drawChart(charts['labels'], charts['datas']);
        });

        var chart = c3.generate({
            bindto: '#chart',
            data: {
            columns: [
                ['Positif', 30, 200, 100, 400, 150, 250],
            ]
            }
        });

    </script>
</body>
</html>