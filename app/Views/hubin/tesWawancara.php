<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Penilaian | Tes Wawancara</h3>
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
                            <th>Jurusan</th>
                            <th>Nilai Tes Wawancara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>2980</th>
                            <th>Fajar Dwi Guntoro</th>
                            <th>TJKT</th>
                            <th>
                                <div class="form-group">
                                    <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
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


        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>