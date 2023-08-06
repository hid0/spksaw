<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lihat Hasil | Rekomendasi Siswa Untuk Penempatan Prakerin</h3>
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
                            <th>Nama DU/DI</th>
                            <th>Jurusan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>PT. Telkom Jepara</th>
                            <th>TJKT</th>
                            <th>
                                <a href="<?= base_url('kepsek/detailHasil/') ?>" class="btn-sm btn-success" title="Detail"><i class="fas fa-info-circle"></i></a>
                            </th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>PT. HINO Cemaco Kudus</th>
                            <th>TO</th>
                            <th>
                                <a href="<?= base_url('kepsek/detailHasil/') ?>" class="btn-sm btn-success" title="Detail"><i class="fas fa-info-circle"></i></a>
                            </th>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>


        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>