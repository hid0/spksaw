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
            Silakan lengkapi data dan upload dokumen di menu <a href="../siswa/biodata" target="_parent" rel="noopener noreferrer">Biodata</a> Anda.
            <br>
            Informasi penempatan prakerin akan disampaikan oleh Koordinator PRAKERIN!
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>