<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Data Siswa</div>
        <div class="float-right">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddStudentModal">
            Tambah Siswa
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>No.HP</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($students->getResult() as $st) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $st->nis ?></td>
                  <td><?= $st->name ?></td>
                  <td><?= $st->tgl_lahir ?? '-' ?></td>
                  <td><?= $st->nm_kelas ?></td>
                  <td><?= $st->email ?></td>
                  <td><?= $st->phone_no ?? '-' ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('admin/student/' . $st->id) ?>" class="btn-sm btn-success" title="Detail"><i class="fas fa-info-circle"></i> Detail</a>
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
<div class="modal fade" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" method="POST" action="<?= base_url('admin/student/add') ?>" autocomplete="off">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="nis" class="col-sm-2 col-form-label">NIS</label>
          <div class="col-sm-10">
            <input type="number" name="nis" class="form-control" id="nis" placeholder="NIS">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap">
          </div>
        </div>
        <!-- <div class="form-group mb-4">
          <div class="datepicker date input-group">
            <input type="text" placeholder="Choose Date" class="form-control" id="fecha1">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
          </div>
        </div> -->
        <div class="form-group row">
          <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-10">
            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="02/02/2009">
          </div>
        </div>
        <div class="form-group row">
          <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
          <div class="col-sm-10">
            <select name="id_kelas" id="kelas" class="form-control">
              <option value="">-- Pilih Kelas --</option>
              <?php foreach ($class->getResult() as $class) : ?>
                <option value="<?= $class->id_kelas; ?>"><?= $class->nm_kelas; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="phone_no" class="col-sm-2 col-form-label">Nomer HP</label>
          <div class="col-sm-10">
            <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="087*********">
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

<?= $this->section("css") ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"> -->
<?= $this->endSection() ?>

<?= $this->section("js") ?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
$(function () {
$('.datepicker').datepicker({
language: "es",
autoclose: true,
format: "dd/mm/yyyy"
});
}); -->
<?= $this->endSection() ?>