<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Hitung SAW | Rekapitulasi Penilaian</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <form action="<?= base_url('hubin/normalisasi'); ?>" method="POST" class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th width="25">No.</th>
              <th width="30">NIS</th>
              <th>Nama Lengkap</th>
              <th class="text-center">Jurusan</th>
              <th class="text-center">N. Kelengkapan Data</th>
              <th class="text-center">N. Rapor</th>
              <th class="text-center">N. Tes Wawancara</th>
              <th class="text-center">N. Tes Tertulis</th>
              <th class="text-center">N. Presensi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($rekapitulasi->getResult() as $dt) : ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td class="text-center"><?= $dt->alias_jurusan; ?></td>
                <td class="text-center">
                  <?php if ($dt->nilai_c2 == '0') : ?>
                    <span class="badge badge-primary">Belum Diisi</span>
                  <?php elseif ($dt->nilai_c2 == '30') : ?>
                    <span class="badge badge-danger">Tidak Lengkap</span>
                  <?php elseif ($dt->nilai_c2 == '70') : ?>
                    <span class="badge badge-warning">Kurang Lengkap</span>
                  <?php elseif ($dt->nilai_c2 == '100') : ?>
                    <span class="badge badge-success">Lengkap</span>
                  <?php endif; ?>
                </td>
                <td class="text-center"><?= $dt->nilai_c1 ?? '-'; ?></td>
                <td class="text-center"><?= $dt->nilai_c3 ?? '-'; ?></td>
                <td class="text-center"><?= $dt->nilai_c4 ?? '-'; ?></td>
                <td class="text-center"><?= $dt->nilai_c5 ?? '-'; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Melakukan Normalisasi?');">NORMALISASI</button>
      </div>
    </form>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Hitung SAW | Tabel Normalisasi</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <form action="<?= base_url('hubin/normalisasi/referensi'); ?>" method="POST" class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th width="25">No.</th>
              <th width="30">NIS</th>
              <th>Nama Lengkap</th>
              <th class="text-center">Jurusan</th>
              <th>N. Kelengkapan Data</th>
              <th>N. Rapor</th>
              <th>N. Tes Tertulis</th>
              <th>N. Tes Wawancara</th>
              <th>N. Presensi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($normalisasi->getNumRows() < 1) : ?>
              <tr>
                <td colspan="9" class="text-center"><strong>Data Belum Dinormalisasikan!</strong></td>
              </tr>
            <?php else : ?>
              <?php $no = 1; ?>
              <?php foreach ($normalisasi->getResult() as $dt) : ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= $dt->nis; ?></td>
                  <td><?= $dt->name; ?></td>
                  <td class="text-center"><?= $dt->alias_jurusan; ?></td>
                  <td class="text-center"><?= $dt->c1 ?? '-'; ?></td>
                  <td class="text-center"><?= $dt->c2 ?? '-'; ?></td>
                  <td class="text-center"><?= $dt->c3 ?? '-'; ?></td>
                  <td class="text-center"><?= $dt->c4 ?? '-'; ?></td>
                  <td class="text-center"><?= $dt->c5 ?? '-'; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <div class="button-container">
          <button type="submit" class="btn btn-success">HITUNG</button>
          &nbsp;&nbsp;
          <a href="<?= base_url('hubin/normalisasi/reset'); ?>" class="btn btn-warning" onclick="return confirm('Yakin reset tabel normalisasi?');">RESET DATA</a>
        </div>
      </div>
    </form>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Hitung SAW | Nilai Preferensi</h3>
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
              <th width="25">No.</th>
              <th width="30">NIS</th>
              <th>Nama Lengkap</th>
              <th class="text-center">Jurusan</th>
              <th>Nilai Preferensi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($referensi->getNumRows() < 1) : ?>
              <tr>
                <td colspan="5" class="text-center"><strong>Data Belum Dihitung!</strong></td>
              </tr>
            <?php else : ?>
              <?php $no = 1; ?>
              <?php foreach ($referensi->getResult() as $dt) : ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td class="text-center"><?= $dt->nis; ?></td>
                  <td class="text-center"><?= $dt->name; ?></td>
                  <td class="text-center"><?= $dt->alias_jurusan; ?></td>
                  <td class="text-center"><?= $dt->nilai_referensi; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
            <!-- <tr>
              <td>1</td>
              <td>2980</td>
              <td>Fajar Dwi Guntoro</td>
              <td>TJKT</td>
              <td>0.941237168</td>
            </tr> -->
          </tbody>
        </table>
        <a class="btn btn-info" href="<?= base_url('hubin/lihatHasil') ?>"><i class="fas fa-check"></i> Lihat Hasil </a>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>
    <?php if (isset($validation)) : ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <strong><?= $validation->listErrors() ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
  </div>
  </div>
</section>

<?= $this->endSection() ?>