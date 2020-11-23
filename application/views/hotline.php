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
                <h1>Coronavirus Hotline Indonesia</h1>
                <p style="margin-top:20px;font-size:19px">Layanan darurat via telepon yang disediakan oleh Kemkes dan Pulau Jawa</p>
            </div>
            <div class="row" style="margin-top:60px">
                <?php foreach ($hots as $hot) { ?>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                    <div class="card service shadow">
                        <div class="card-body">
                            <div class="item-box text-center">
                                <div class=" text-center  mb-4 text-primary">
                                    <?php echo ($hot->hl_img) ? '<img src="' . base_url('assets/images/hotlines/' . $hot->hl_img) . '" width="50" height="50" alt="Logo Daerah">' : '' ?>
                                </div>
                                <div class="item-box-wrap">
                                    <a href="tel:0215210411"><h5 class="mb-2"><?php echo $hot->hl_number; ?></h5></a>
                                    <p class="text-muted mb-0"><?php echo $hot->hl_name; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

<?php $this->load->view('footer'); ?>
    </div>

<?php $this->load->view('bottomscripts'); ?>
</body>
</html>