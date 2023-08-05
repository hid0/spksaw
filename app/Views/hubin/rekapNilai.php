<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Penilaian | Rekapitulasi Penilaian</h3>
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

            </div>
        </div>


        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>