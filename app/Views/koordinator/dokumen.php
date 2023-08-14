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
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>NIS</th>
              <th>Nama Lengkap</th>
              <th class="text-center">T.Badan</th>
              <th class="text-center">B.Badan</th>
              <th class="text-center">Formulir</th>
              <th class="text-center">Rapor</th>
              <th class="text-center">Kartu Pelajar</th>
              <th class="text-center">Vaksin</th>
              <th class="text-center">Surat Kesehatan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($students->getResult() as $dt) : ?>
              <tr>
                <td class="text-center"><?= $no++; ?>.</td>
                <td><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td class="text-center"><?= $dt->t_badan ?? '-'; ?></td>
                <td class="text-center"><?= $dt->b_badan ?? '-'; ?></td>
                <td class="text-center">
                  <?php if ($dt->formulir != NULL) : ?>
                    <a href="<?= base_url('uploads/' . $dt->formulir); ?>" target="_blank" title="Lihat PDF" rel="noopener noreferrer">&#9989;</a>
                  <?php else : ?>
                    <span title="File Belum diupload">❌</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($dt->kartu_pelajar != NULL) : ?>
                    <a href="<?= base_url('uploads/' . $dt->kartu_pelajar); ?>" target="_blank" title="Lihat PDF" rel="noopener noreferrer">&#9989;</a>
                  <?php else : ?>
                    <span title="File Belum diupload">❌</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($dt->raport != NULL) : ?>
                    <a href="<?= base_url('uploads/' . $dt->raport); ?>" target="_blank" title="Lihat PDF" rel="noopener noreferrer">&#9989;</a>
                  <?php else : ?>
                    <span title="File Belum diupload">❌</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($dt->vaksin != NULL) : ?>
                    <a href="<?= base_url('uploads/' . $dt->vaksin); ?>" target="_blank" title="Lihat PDF" rel="noopener noreferrer">&#9989;</a>
                  <?php else : ?>
                    <span title="File Belum diupload">❌</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($dt->surat_kesehatan != NULL) : ?>
                    <a href="<?= base_url('uploads/' . $dt->surat_kesehatan); ?>" target="_blank" title="Lihat PDF" rel="noopener noreferrer">&#9989;</a>
                  <?php else : ?>
                    <span title="File Belum diupload">❌</span>
                  <?php endif ?>
                </td>
                <td>
                  <?php if ($dt->nilai_c2 == null || $dt->nilai_c2 == 0) : ?>
                    <a href="<?= base_url('koordinator/dokumen/' . $dt->id); ?>" title="klik untuk merubah" class="btn btn-info btn-sm">
                      Nilai Sekarang
                    </a>
                  <?php elseif ($dt->nilai_c2 == '100') : ?>
                    <a href="<?= base_url('koordinator/dokumen/' . $dt->id); ?>" class="btn btn-success btn-sm" title="klik untuk merubah">
                      Lengkap
                    </a>
                  <?php elseif ($dt->nilai_c2 == '70') : ?>
                    <a href="<?= base_url('koordinator/dokumen/' . $dt->id); ?>" class="btn btn-warning btn-sm" title="klik untuk merubah">
                      Kurang Lengkap
                    </a>
                  <?php elseif ($dt->nilai_c2 == '30') : ?>
                    <a href="<?= base_url('koordinator/dokumen/' . $dt->id); ?>" class="btn btn-danger btn-sm" title="klik untuk merubah">
                      Tidak Lengkap
                    </a>
                  <?php endif; ?>
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