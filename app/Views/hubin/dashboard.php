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
                    Untuk menginput Tes Tertulis calon peserta Prakerin pada sub-menu <a href="../hubin/tesTulis" target="_parent" rel="noopener noreferrer">Nilai Tes Tertulis</a> pada menu Penilaian.
                </li>
                <li>
                    Untuk menginput Tes Wawancara calon peserta Prakerin pada sub-menu <a href="../hubin/tesWawancara" target="_parent" rel="noopener noreferrer">Nilai Tes Wawancara</a> pada menu Penilaian.
                </li>
                <li>
                    Untuk melihat Rekapitulasi penilaian calon peserta Prakerin pada sub-menu <a href="../hubin/rekapNilai" target="_parent" rel="noopener noreferrer">Rekap Nilai</a> pada menu Penilaian.
                </li>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Analisis dan Perhitungan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul type="circle">
                <li>
                    Untuk menghitung penilaian dengan algoritma SAW pilih menu <a href="../hubin/hitung" target="_parent" rel="noopener noreferrer">Hitung SAW</a>.
                </li>
                <li>
                    Selanjutnya klik tombol NORMALISASI untuk memluai proses penilaian.
                </li>
                <li>
                    Selanjutnya klik tombol HITUNG untuk melakukan perhitungan penilaian.
                </li>
                <li>
                    Tombol RESET DATA digunakan apabila akan melakukan penghitungan ulang, kemudian ulangi dari NORMALISASI.
                </li>
                <li>
                    Untuk melihat hasil perhitungan, dapat dilihat pada sub-menu <a href="../hubin/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a> pada menu Hasil SAW.
                </li>
                <li>
                    Untuk mencetak/download hasil Rekomendasi, pilih menu HASIL SAW kemudian klik <a href="../hubin/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a>. Pada halaman <a href="../hubin/lihatHasil" target="_parent" rel="noopener noreferrer">Lihat Hasil</a> klik tombol DETAIL dari setiap DU/DI. Klik tombol <a href="../hubin/cetak" target="_parent" rel="noopener noreferrer">Laporan</a> berada dibagian bawah halaman.
                </li>
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>