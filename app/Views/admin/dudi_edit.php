<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<div class="row">
  <div class="col-12">
    <form action="<?= base_url('admin/dudi'); ?>" method="POST" class="card card-info">
      <input type="hidden" name="id" value="<?= $dudi->id_dudi; ?>">
      <div class="card-header">
        <div class="card-title">Edit DUDI | <?= $dudi->nm_dudi; ?></div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="id_jurusan">Jurusan</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
              <option value="1" <?= $dudi->id_jurusan == '1' ? 'selected' : ''; ?>>Desain Produksi Kriya</option>
              <option value="2" <?= $dudi->id_jurusan == '2' ? 'selected' : ''; ?>>Teknik Otomotif</option>
              <option value="3" <?= $dudi->id_jurusan == '3' ? 'selected' : ''; ?>>Teknik Jaringan Komputer dan Telekomunikasi</option>
              <option value="4" <?= $dudi->id_jurusan == '4' ? 'selected' : ''; ?>>Akuntansi Keuangan Lembaga</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="nm_dudi">Nama Dunia Usaha / Dunia Industri</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="nm_dudi" name="nm_dudi" value="<?= $dudi->nm_dudi; ?>">
          </div>
        </div>
        <div class="form-group">
          <a href="<?= base_url('admin/dudi'); ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
          <div class="float-right">
            <button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Edit DUDI</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>