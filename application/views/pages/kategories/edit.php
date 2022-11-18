<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Kategori</h4>
                    <form action="<?= base_url("kategories/edit/$input->id") ?>" method="POST">
                        <?= form_hidden('id', $input->id) ?>
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Nama Kategori</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-box"></i></label>
                                                    </div>
                                                    <?= form_input('nama_kategori', $input->nama_kategori, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Nama Kategori Baru']) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                                <?= form_error('nama_kategori') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row">
                                        <label class="col-lg-2">Kategori</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="supplier-options"><i class="fas fa-check-square"></i></label>
                                                        </div>
                                                        <select class="form-control" name="status" id="supplier-options">
                                                            <option value="valid" <?= $input->status == 'valid' ? 'selected' : '' ?>>Valid</option>
                                                            <option value="invalid" <?= $input->status == 'invalid' ? 'selected' : '' ?>>Tidak Valid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="<?= base_url('kategories') ?>" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->