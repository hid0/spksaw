<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<?php foreach ($user->getResultObject() as $dt) : ?>
  <section class="content" data-select2-id="33">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Biodata, <strong><?= session()->get('name') ?></strong></h3>
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
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td><?= $dt->email; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="container-fluid" data-select2-id="32">
          <form action="<?= base_url('siswa/biodata/upload'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Biodata</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tanggal Lahir:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $dt->tgl_lahir; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No. Handphone:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" min="0" class="form-control" placeholder="6289xxxxxxxxxx" name="phone_no" value="<?= $dt->phone_no; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Kontinyu</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tinggi Badan:</label>
                      <input type="number" min="0" class="form-control" name="t_badan" value="<?= $dt->t_badan ?? '0'; ?>">
                    </div>
                    <div class="form-group">
                      <label>Berat Badan:</label>
                      <input type="number" min="0" class="form-control" name="b_badan" value="<?= $dt->b_badan ?? '0'; ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title"><strong>Kelengkapan Dokumen</strong></h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFile">Formulir Pendaftaran</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="formulir" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Kartu Pelajar</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="kartu_pelajar" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Rapor Semester 1 s/d 3</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="raport" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Kartu Vaksin</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="vaksin" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Surat Kesehatan</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="surat_kesehatan" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id_siswa" value="<?= $dt->id; ?>">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
                  </div>
                  <div class="card-footer">
                    <h3 class="text-center text-danger"><strong>Upload dokumen dalam bentuk file (.pdf). Upload file sesuai kolom yang sudah tersedia.</strong></h3>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card-footer">
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
  </section>
<?php endforeach; ?>
<?= $this->endSection() ?>