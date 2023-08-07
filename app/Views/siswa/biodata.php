<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content" data-select2-id="33">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Biodata, <?= session()->get('name') ?></h3>
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
                            <td><?= session()->get('tbl_siswa.nis') ?></td>
                            <td><?= session()->get('name') ?></td>
                            <td><?= session()->get('email') ?></td>
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

                <div class="card card-default" style="display: none;">
                    <div class="card-header">
                        <h3 class="card-title">Select2 (Default Theme)</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                        </div>

                        <h5>Custom Color Variants</h5>
                        <div class="row">
                        </div>
                    </div>
                </div>
                <div class="card card-default" data-select2-id="31" style="display: none;">

                </div>

                <div class="card card-default" style="display: none;">
                </div>

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
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
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
                                    <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan:</label>
                                    <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Kelengkapan Dokumen</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="bs-stepper linear">
                                    <div class="bs-stepper-header" role="tablist">
                                        <div class="line"></div>
                                    </div>
                                    <div class="bs-stepper-content">

                                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Formulir Pendaftaran</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Kartu Pelajar</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Rapor Semester 1 s/d 3</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Kartu Vaksi</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Surat Kesehatan</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <h3>Upload dokumen dalam bentuk file (.pdf). Upload file sesuai kolom yang sudah tersedia.</h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
        </div>
    </div>

</section>

</section>
<?= $this->endSection() ?>