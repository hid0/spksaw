<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<div class="row">
  <div class="col-12">
    <div class="float-left">
      <a href="<?= base_url('admin/dudi'); ?>" type="button" class="btn btn-warning">
        Kembali ke DUDI
      </a>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Data DUDI</div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php if ($students->getResult()) : ?>
                <?php foreach ($students->getResult() as $dt) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt->nis; ?></td>
                    <td><?= $dt->name; ?></td>
                    <td><?= $dt->nm_kelas; ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="4" class="text-center"><strong>Data Kosong</strong></td>
                </tr>
              <?php endif; ?>
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
<?= $this->endSection() ?>