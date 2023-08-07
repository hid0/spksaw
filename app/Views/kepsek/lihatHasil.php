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
                            <td>1</td>
                            <td>PT. Telkom Jepara</td>
                            <td>TJKT</td>
                            <td>
                                <a href="<?= base_url('kepsek/detailHasil/') ?>" class="btn-sm btn-success" title="Detail"><i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PT. HINO Cemaco Kudus</td>
                            <td>TO</td>
                            <td>
                                <a href="<?= base_url('kepsektd/detailHasil/') ?>" class="btn-sm btn-success" title="Detail"><i class="fas fa-info-circle"></i></a>
                            </td>
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