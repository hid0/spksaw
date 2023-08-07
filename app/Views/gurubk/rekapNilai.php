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
                            <th>Alpa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2980</td>
                            <td>Fajar Dwi Guntoro</td>
                            <td>TJKT</td>
                            <td>70</td>
                            <td>91.3</td>
                            <td>82.5</td>
                            <td>90.4</td>
                            <td>1</td>
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