<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Data Kriteria</div>
        <div class="float-right">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddKriteriaModal">
            Tambah Kriteria
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Kriteria</th>
                <th>Tipe</th>
                <th>Bobot</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($criterias->getResult() as $d) : ?>
                <tr>
                  <td><?= $no++ ?>.</td>
                  <td><?= $d->nm_kriteria ?></td>
                  <td><?= $d->tipe_kriteria ?></td>
                  <td><?= $d->bobot_kriteria ?></td>
                  <td></td>
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
<div class="modal fade" id="AddKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="AddKriteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" method="POST" action="<?= base_url('admin/criteria/add') ?>" autocomplete="off">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
          <div class="col-sm-10">
            <input type="text" name="nm_kriteria" class="form-control" id="kriteria" placeholder="Nama Kriteria">
          </div>
        </div>
        <div class="form-group row">
          <label for="tipe_kriteria" class="col-sm-2 col-form-label">Tipe Kriteria</label>
          <div class="col-sm-10">
            <select name="tipe_kriteria" id="tipe_kriteria" class="form-control">
              <option value="">-- Pilih Tipe Kriteria --</option>
              <option value="benefit">Benefit</option>
              <option value="cost">Cost</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
          <div class="col-sm-10">
            <input type="number" step="any" name="bobot_kriteria" class="form-control" id="bobot" placeholder="0.3">
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