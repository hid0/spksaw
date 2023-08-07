<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang, <?= session()->get('name') ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul type="circle">
                <li>
                    Untuk menginput Jumlah Alpa calon peserta Prakerin pada sub-menu <a href="../gurubk/presensi" target="_parent" rel="noopener noreferrer">Presensi</a> pada menu Penilaian.
                </li>
                <li>
                    Untuk melihat Rekapitulasi penilaian calon peserta Prakerin pada sub-menu <a href="../gurubk/rekapNilai" target="_parent" rel="noopener noreferrer">Rekap Nilai</a> pada menu Penilaian.
                </li>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>