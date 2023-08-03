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
                    Untuk memeriksa kelengkapan data calon peserta Prakerin pilih sub-menu <a href="../koordinator/dokumen" target="_parent" rel="noopener noreferrer">Kelengkapan Data</a> pada menu Penilaian.
                </li>
                <li>
                    Untuk menginput rata-rata nilai mapel produktif calon peserta Prakerin pada sub-menu <a href="../koordinator/rapor" target="_parent" rel="noopener noreferrer">Nilai Rapor</a> pada menu Penilaian.
                </li>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>