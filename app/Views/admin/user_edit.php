<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<div class="row">
  <div class="col-12">
    <form action="<?= base_url('admin/edit-user'); ?>" method="POST" class="card card-info">
      <input type="hidden" name="id" value="<?= $user->id; ?>">
      <div class="card-header">
        <div class="card-title">Edit User | <?= $user->name; ?></div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="role">Nama Lengkap</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="name" value="<?= $user->name; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="role">Email</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" value="<?= $user->email; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="role">No.Handphone</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
            </div>
            <input type="text" class="form-control" name="phone_no" value="<?= $user->phone_no; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user-check"></i></span>
            </div>
            <select name="role" id="role" class="form-control">
              <option value="">-- Pilih Role --</option>
              <option value="admin" <?= $user->role == 'admin' ? 'selected' : ''; ?>>Admin</option>
              <option value="siswa" <?= $user->role == 'siswa' ? 'selected' : ''; ?>>Siswa</option>
              <option value="koordinator" <?= $user->role == 'koordinator' ? 'selected' : ''; ?>>Koordinator</option>
              <option value="hubin" <?= $user->role == 'hubin' ? 'selected' : ''; ?>>Hubin</option>
              <option value="gurubk" <?= $user->role == 'gurubk' ? 'selected' : ''; ?>>Guru BK</option>
              <option value="kepsek" <?= $user->role == 'kepsek' ? 'selected' : ''; ?>>Kepala Sekolah</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-default"><i class="fas fa-chevron-left"></i> Kembali</a>
          <div class="float-right">
            <button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Edit User</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>