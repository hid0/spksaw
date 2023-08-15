<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<div class="row">
  <div class="col-12">
    <form action="<?= base_url('admin/criteria'); ?>" method="POST" class="card card-info">
      <input type="hidden" name="id" value="<?= $criteria->id_kriteria; ?>">
      <div class="card-header">
        <div class="card-title">Edit Kriteria | <?= $criteria->nm_kriteria; ?></div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nm_kriteria">Nama Kriteria</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-tags"></i></span>
            </div>
            <input type="text" class="form-control" id="nm_kriteria" name="nm_kriteria" value="<?= $criteria->nm_kriteria; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="tipe_kriteria">Tipe Kriteria</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-tools"></i></span>
            </div>
            <select name="tipe_kriteria" id="tipe_kriteria" class="form-control">
              <option value="benefit" <?= $criteria->tipe_kriteria == 'benefit' ? 'selected' : ''; ?>>Benefit</option>
              <option value="cost" <?= $criteria->tipe_kriteria == 'cost' ? 'selected' : ''; ?>>Cost</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="bobot_kriteria">Bobot Kriteria</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-weight"></i></span>
            </div>
            <input type="text" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="<?= $criteria->bobot_kriteria; ?>">
          </div>
        </div>
        <div class="form-group">
          <a href="<?= base_url('admin/criterias'); ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
          <div class="float-right">
            <button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Edit Kriteria</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>