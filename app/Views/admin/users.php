<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Data Users</div>
        <div class="float-right">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddUserModal">
            Tambah User
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>role</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $user['name']; ?></td>
                  <td><?= $user['email']; ?></td>
                  <td><?= $user['phone_no']; ?></td>
                  <td><?= $user['role']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/user/' . $user['id']) ?>" class="btn-sm btn-warning" title="Edit Pengguna"><i class="fas fa-pen"></i></a>
                    <a href="<?= base_url('admin/del_user/' . $user['id']) ?>" class="btn-sm btn-danger" onclick="return confirm('ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="AddUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" method="POST" action="<?= base_url('admin/user') ?>" autocomplete="off">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap">
          </div>
        </div>
        <div class="form-group row">
          <label for="phone_no" class="col-sm-2 col-form-label">Nomer HP</label>
          <div class="col-sm-10">
            <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="087*********">
          </div>
        </div>
        <div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
              <option value="">-- Pilih Role --</option>
              <option value="admin">Admin</option>
              <!-- <option value="siswa">Siswa</option> -->
              <option value="koordinator">Koordinator</option>
              <option value="hubin">Hubin</option>
              <option value="gurubk">Guru BK</option>
              <option value="kepsek">Kepala Sekolah</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>