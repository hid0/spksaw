<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="float-left">
        <a href="<?= base_url('hubin/tesTulis'); ?>" type="button" class="btn btn-warning">
          Kembali ke Tes Tulis
        </a>
      </div>
    </div>
  </div>
  <?php if ($student->getNumRows() < 1) {
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    $db->table('c4')->insert(['id_siswa' => $request->getUri()->getSegment(3), 'nilai_c4' => 0]);
    header('location:' . $_SERVER['REQUEST_URI']);
  }
  ?>
  <?php foreach ($student->getResultObject() as $dt) : ?>
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">Penilaian Tes Tertulis | <strong><?= $dt->name; ?></strong></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form class="" method="POST" action="<?= base_url('hubin/tes-tulis/save') ?>" autocomplete="off">
          <div class="form-group row">
            <label for="nilai_c4" class="col-sm-9 col-form-label">Nilai Tes Tertulis</label>
            <div class="col-sm-4">
              <input type="text" name="nilai_c4" id="nilai_c4" class="form-control" value="<?= $dt->nilai_c4; ?>">
            </div>
            <input type="hidden" value="<?= $dt->id_siswa; ?>" name="id_siswa">
          </div>
          <div class="form-group row">
            <button type="submit" class="btn btn-danger">Simpan Penilaian</button>
          </div>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<?= $this->endSection() ?>