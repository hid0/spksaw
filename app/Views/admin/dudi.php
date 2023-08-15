<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Data DUDI</div>
        <div class="float-right">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddDUDIModal">
            Tambah DUDI
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th width="5%">No.</th>
                <th>Nama DUDI</th>
                <th>Jurusan</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($dudi->getResult() as $d) : ?>
                <tr>
                  <td><?= $no++ ?>.</td>
                  <td><?= $d->nm_dudi ?></td>
                  <td><?= $d->alias_jurusan ?></td>
                  <td width="15%">
                    <a href="<?= base_url('admin/dudi/' . $d->id_jurusan) ?>" class="btn btn-sm btn-info" title="Daftar Anak"><i class="fas fa-info-circle"></i> Detail</a>
                    <a href="<?= base_url('admin/dudi/' . $d->id_dudi . '/edit') ?>" class="btn btn-sm btn-warning" title="Edit DUDI"><i class="fas fa-pen-alt"></i> Edit</a>
                    <form action="<?= base_url('admin/dudi/delete'); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?= $d->id_dudi; ?>">
                      <button type="submit" onclick="return confirm('Yakin Ingin Menghapus DUDI ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
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
<div class="modal fade" id="AddDUDIModal" tabindex="-1" role="dialog" aria-labelledby="AddDUDIModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" method="POST" action="<?= base_url('admin/dudi/add') ?>" autocomplete="off">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah DUDI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="nm_dudi" class="col-sm-2 col-form-label">Nama DUDI</label>
          <div class="col-sm-10">
            <input type="text" name="nm_dudi" class="form-control" id="nm_dudi" placeholder="Nama DUDI">
          </div>
        </div>
        <div class="form-group row">
          <label for="id_jurusan" class="col-sm-2 col-form-label">Jurusan</label>
          <div class="col-sm-10">
            <select name="id_jurusan" id="id_jurusan" class="form-control">
              <option value="">-- Pilih Jurusan --</option>
              <option value="1">Desain Produksi Kriya</option>
              <option value="2">Teknik Otomotif</option>
              <option value="3">Teknik Jaringan Komputer dan Telekomunikasi</option>
              <option value="4">Akuntansi Keuangan Lembaga</option>
            </select>
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