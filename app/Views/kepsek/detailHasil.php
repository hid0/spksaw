<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rekomendasi | PT. Telkom Jepara</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul type="circle">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nilai Preferensi</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>2980</th>
                                    <th>Fajar Dwi Guntoro</th>
                                    <th>0.941237168</th>
                                    <th>1</th>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-info" href="<?= base_url('kepsek/cetak') ?>"><i class="fas fa-print"></i> Laporan </a>
                    </div>
                </div>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>