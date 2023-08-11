<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Penilaian | Tes Tertulis</h3>
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
              <th class="text-center">Nilai Tes Tertulis</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($students->getResult() as $dt) : ?>
              <tr>
                <td class="text-center"><?= $no++; ?>.</td>
                <td class="text-center"><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td class="text-center"><?= $dt->alias_jurusan; ?></td>
                <td class="text-center">
                  <a href="<?= base_url('hubin/tes-tulis/' . $dt->id); ?>" class="btn btn-info btn-sm" title="klik untuk merubah">
                    <?= $dt->nilai_c4 ?? '0'; ?>
                  </a>
                </td>
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