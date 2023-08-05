<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hitung SAW | Rekapitulasi Penilaian</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>N. Kelengkapan Data</th>
                            <th>N. Rapor</th>
                            <th>N. Tes Tertulis</th>
                            <th>N. Tes Wawancara</th>
                            <th>N. Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>2980</th>
                            <th>Fajar Dwi Guntoro</th>
                            <th>TJKT</th>
                            <th>70</th>
                            <th>91.3</th>
                            <th>82.5</th>
                            <th>90.4</th>
                            <th>1</th>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">NORMALISASI</button>
                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo session()->getFlashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong><?= $validation->listErrors() ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="card-footer">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hitung SAW | Tabel Normalisasi</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>N. Kelengkapan Data</th>
                            <th>N. Rapor</th>
                            <th>N. Tes Tertulis</th>
                            <th>N. Tes Wawancara</th>
                            <th>N. Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>2980</th>
                            <th>Fajar Dwi Guntoro</th>
                            <th>TJKT</th>
                            <th>0.7</th>
                            <th>0.9860</th>
                            <th>0.9270</th>
                            <th>1</th>
                            <th>1</th>
                        </tr>
                    </tbody>
                </table>
                <div class="button-container">
                    <button type="submit" class="btn btn-success">HITUNG</button>
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong><?= $validation->listErrors() ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-warning">RESET DATA</button>
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong><?= $validation->listErrors() ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hitung SAW | Nilai Preferensi</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>2980</th>
                            <th>Fajar Dwi Guntoro</th>
                            <th>TJKT</th>
                            <th>0.941237168</th>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-info" href="<?= base_url('hubin/lihatHasil') ?>"><i class="fas fa-check"></i> Lihat Hasil </a>
            </div>
        </div>
    </div>
    <div class="card-footer">
    </div>
    </div>
</section>

<?= $this->endSection() ?>