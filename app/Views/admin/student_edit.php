<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<div class="row">
  <div class="col-12">
    <form action="<?= base_url('admin/student'); ?>" method="POST" class="card card-info">
      <input type="hidden" name="id" value="<?= $student->id; ?>">
      <div class="card-header">
        <div class="card-title">Edit Siswa | <?= $student->name; ?></div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nis">Nama Lengkap</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-hotel"></i></span>
            </div>
            <input type="text" class="form-control" id="nis" name="nis" value="<?= $student->nis; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="nama_lengkap" name="name" value="<?= $student->name; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $student->tgl_lahir; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kelas">Kelas</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <select name="id_kelas" id="kelas" class="form-control">
              <option value="<?= $class[0]->id_kelas; ?>" <?= $student->id_kelas == $class[0]->id_kelas ? 'selected' : ''; ?>><?= $class[0]->nm_kelas; ?></option>
              <option value="<?= $class[1]->id_kelas; ?>" <?= $student->id_kelas == $class[1]->id_kelas ? 'selected' : ''; ?>><?= $class[1]->nm_kelas; ?></option>
              <option value="<?= $class[2]->id_kelas; ?>" <?= $student->id_kelas == $class[2]->id_kelas ? 'selected' : ''; ?>><?= $class[2]->nm_kelas; ?></option>
              <option value="<?= $class[3]->id_kelas; ?>" <?= $student->id_kelas == $class[3]->id_kelas ? 'selected' : ''; ?>><?= $class[3]->nm_kelas; ?></option>
              <option value="<?= $class[4]->id_kelas; ?>" <?= $student->id_kelas == $class[4]->id_kelas ? 'selected' : ''; ?>><?= $class[4]->nm_kelas; ?></option>
              <option value="<?= $class[5]->id_kelas; ?>" <?= $student->id_kelas == $class[5]->id_kelas ? 'selected' : ''; ?>><?= $class[5]->nm_kelas; ?></option>
              <option value="<?= $class[6]->id_kelas; ?>" <?= $student->id_kelas == $class[6]->id_kelas ? 'selected' : ''; ?>><?= $class[6]->nm_kelas; ?></option>
              <option value="<?= $class[7]->id_kelas; ?>" <?= $student->id_kelas == $class[7]->id_kelas ? 'selected' : ''; ?>><?= $class[7]->nm_kelas; ?></option>
              <option value="<?= $class[8]->id_kelas; ?>" <?= $student->id_kelas == $class[8]->id_kelas ? 'selected' : ''; ?>><?= $class[8]->nm_kelas; ?></option>
              <option value="<?= $class[9]->id_kelas; ?>" <?= $student->id_kelas == $class[9]->id_kelas ? 'selected' : ''; ?>><?= $class[9]->nm_kelas; ?></option>
              <option value="<?= $class[10]->id_kelas; ?>" <?= $student->id_kelas == $class[10]->id_kelas ? 'selected' : ''; ?>><?= $class[10]->nm_kelas; ?></option>
              <option value="<?= $class[11]->id_kelas; ?>" <?= $student->id_kelas == $class[11]->id_kelas ? 'selected' : ''; ?>><?= $class[11]->nm_kelas; ?></option>
              <option value="<?= $class[12]->id_kelas; ?>" <?= $student->id_kelas == $class[12]->id_kelas ? 'selected' : ''; ?>><?= $class[12]->nm_kelas; ?></option>
              <option value="<?= $class[13]->id_kelas; ?>" <?= $student->id_kelas == $class[13]->id_kelas ? 'selected' : ''; ?>><?= $class[13]->nm_kelas; ?></option>
              <option value="<?= $class[14]->id_kelas; ?>" <?= $student->id_kelas == $class[14]->id_kelas ? 'selected' : ''; ?>><?= $class[14]->nm_kelas; ?></option>
              <option value="<?= $class[15]->id_kelas; ?>" <?= $student->id_kelas == $class[15]->id_kelas ? 'selected' : ''; ?>><?= $class[15]->nm_kelas; ?></option>
              <option value="<?= $class[16]->id_kelas; ?>" <?= $student->id_kelas == $class[16]->id_kelas ? 'selected' : ''; ?>><?= $class[16]->nm_kelas; ?></option>
              <option value="<?= $class[17]->id_kelas; ?>" <?= $student->id_kelas == $class[17]->id_kelas ? 'selected' : ''; ?>><?= $class[17]->nm_kelas; ?></option>
              <option value="<?= $class[18]->id_kelas; ?>" <?= $student->id_kelas == $class[18]->id_kelas ? 'selected' : ''; ?>><?= $class[18]->nm_kelas; ?></option>
              <option value="<?= $class[19]->id_kelas; ?>" <?= $student->id_kelas == $class[19]->id_kelas ? 'selected' : ''; ?>><?= $class[19]->nm_kelas; ?></option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" name="email" value="<?= $student->email; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="phone_no">No.Handphone</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
            </div>
            <input type="text" class="form-control" id="phone_no" name="phone_no" value="<?= $student->phone_no; ?>">
          </div>
        </div>
        <div class="form-group">
          <a href="<?= base_url('admin/students'); ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
          <div class="float-right">
            <button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Edit Siswa</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>