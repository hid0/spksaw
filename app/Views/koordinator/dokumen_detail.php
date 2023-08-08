<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="float-left">
        <a href="<?= base_url('koordinator/dokumen'); ?>" type="button" class="btn btn-warning">
          Kembali ke dokumen
        </a>
      </div>
    </div>
  </div>
  <?php if ($student->getNumRows() < 1) {
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    $db->table('tbl_penilaian')->insert(['id_kriteria' => 2, 'id_siswa' => $request->getUri()->getSegment(3), 'nilai' => 0]);
    header('location:' . $_SERVER['REQUEST_URI']);
  }
  ?>
  <?php foreach ($student->getResultObject() as $dt) : ?>
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">Penilaian | Kelengkapan Data <?= $dt->name; ?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form class="" method="POST" action="<?= base_url('koordinator/dokumen/nilai') ?>" autocomplete="off">
          <div class="form-group row">
            <label for="nilai" class="col-sm-2 col-form-label">Kelengkapan Data</label>
            <div class="col-sm-10">
              <select name="nilai" class="form-control">
                <option value="" <?= $dt->nilai == null || $dt->nilai == 0 ? 'selected' : ''; ?>>-- Belum Diisi --</option>
                <option value="100" <?= $dt->nilai == '100' ? 'selected' : ''; ?>>Lengkap</option>
                <option value="70" <?= $dt->nilai == '70' ? 'selected' : ''; ?>>Kurang Lengkap</option>
                <option value="30" <?= $dt->nilai == '30' ? 'selected' : ''; ?>>Tidak Lengkap</option>
              </select>
              <input type="hidden" name="<?= $dt->id_siswa; ?>" name="id_siswa">
            </div>
          </div>
          <div class="form-group row">
            <button type="submit" class="btn btn-danger">Simpan Penilaian</button>
          </div>
        </form>
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
  <?php endforeach; ?>
</section>

<?= $this->endSection() ?>