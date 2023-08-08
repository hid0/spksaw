<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Penilaian | Kelengkapan Data Calon Peserta Prakerin</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
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
              <th>T.Badan</th>
              <th>B.Badan</th>
              <th>Formulir</th>
              <th>Rapor</th>
              <th>Vaksin</th>
              <th>Surat Kesehatan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($students->getResult() as $dt) : ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td class="text-center"><?= $dt->t_badan ?? '-'; ?></td>
                <td class="text-center"><?= $dt->b_badan ?? '-'; ?></td>
                <td><a href="<?= base_url() . $dt->formulir; ?>" target="_blank" rel="noopener noreferrer">formulir</a></td>
                <td>rapor</td>
                <td>vaksin</td>
                <td>suket</td>
                <td>
                  <a href="<?= base_url('koordinator/dokumen/' . $dt->id_siswa); ?>" class="btn btn-info btn-sm">Nilai Sekarang</a>
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
</section>

<?= $this->endSection() ?>