2<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Rekomendasi | <strong><i><?= $dudi->nm_dudi; ?></i></strong></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIS</th>
              <th>Nama Lengkap</th>
              <th>Nilai Preferensi</th>
              <th class="text-center">Ranking</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($students->getNumRows() < 1) : ?>
              <tr>
                <td colspan="5" class="text-center"><strong>Data Kosong!</strong></td>
              </tr>
            <?php else : ?>
              <?php
              $no = 1;
              $rank = 1;
              ?>
              <?php foreach ($students->getResult() as $dt) : ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= $dt->nis; ?></td>
                  <td><?= $dt->name; ?></td>
                  <td><?= $dt->nilai_referensi; ?></td>
                  <td class="text-center"><?= $rank++; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <a class="btn btn-info" href="<?= base_url('hubin/cetak/' . $dt->id_jurusan . '/' . $dudi->id_dudi) ?>" target="_blank"><i class="fas fa-print"></i> Laporan</a>
      </div>
    </div>

    <div class="card-footer">
      <a href="<?= base_url('hubin/lihatHasil'); ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
    </div>
  </div>
</section>

<?= $this->endSection() ?>