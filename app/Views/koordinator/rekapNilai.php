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
        <table class="table table-striped table-hover">
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
              <th class="text-center">Alpa</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($students->getResult() as $dt) : ?>
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