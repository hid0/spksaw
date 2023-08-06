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
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lihat Hasil Perhitungan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul type="circle">
                <li>
                    Untuk melihat hasil perhitungan, dapat dilihat pada sub-menu <a href="../kepsek/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a> pada menu Hasil SAW.
                </li>
                <li>
                    Untuk mencetak/download hasil Rekomendasi, pilih menu HASIL SAW kemudian klik <a href="../kepsek/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a>. Pada halaman <a href="../kepsek/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a> klik tombol DETAIL dari setiap DU/DI. Klik tombol <a href="../kepsek/cetak" target="_parent" rel="noopener noreferrer">Laporan</a> berada dibagian bawah halaman.
                </li>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>