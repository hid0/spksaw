<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Lihat Hasil | Rekomendasi Siswa Untuk Penempatan Prakerin</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama DU/DI</th>
              <th>Jurusan</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dudi->getResult() as $dt) : ?>
              <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $dt->nm_dudi ?></td>
                <td><?= $dt->alias_jurusan ?></td>
                <td>
                  <a href="<?= base_url('siswa/dudi/' . $dt->id_jurusan . '/' . $dt->id_dudi) ?>" class="btn-sm btn-warning" title="Daftar Anak"><i class="fas fa-info-circle"></i> Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
    </div>
  </div>
</section>

<?= $this->endSection() ?>