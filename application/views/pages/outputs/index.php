<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <?php $this->load->view('layouts/_alert') ?>

    <div class="row" id="printOut">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">List Pengeluaran Obat</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap v-middle mb-0">
                            <thead>
                            <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">ID Pemasukan</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Nama Staff</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Nama Barang</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2 text-center">Waktu Pemasukan</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">Total Harga</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <?php $user = $this->db->get_where('user', ['id' => $row->id_user])->row(); ?>
                                    <?php $barang = $this->db->get_where('barang', ['id' => $row->id_barang])->row(); ?>
                                    <tr>
                                        <td class="border-top-0 px-2 py-4 font-weight-medium"><?= $row->id ?></td>
                                        <td class="border-top-0 text-muted px-2 py-4 font-14"><?= $user->nama ?></td>
                                        <td class="border-top-0 text-muted px-2 py-4 font-14"><?= $barang->nama ?></td>
                                        <td class="border-top-0 text-muted px-2 py-4 font-14 text-center"><?= date('d-m-Y H:i:s', strtotime($row->waktu)) ?></td>
                                        <td class="border-top-0 text-center text-muted px-2 py-4">Rp.<?= number_format($row->total_harga, 0, ',', '.') ?>,-</td>
                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                            <a href="<?= base_url("inputs/detail/$row->id") ?>" class="btn btn-primary btn-rounded"><i data-feather="shopping-cart"></i>&nbsp;&nbsp;Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if ($this->uri->segment(2)) : ?>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <a href="<?= base_url('outputs') ?>" class="btn btn-primary btn-rounded text-white"><i class="fas fa-angle-left"></i> List Pengeluaran</a>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2 d-flex justify-content-center">
                                <div class="row d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <?= $pagination ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <?= $pagination ?>
                        </nav>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="card-footer bg-white">
        <div class="row">
                <a href="<?= base_url(); ?>Outputs/print_barang_keluar" class="btn btn-success btn-rounded float-right">Cetak Laporan <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="d-flex">
                <form action="<?= base_url(); ?>Outputs/cari_tanggal" method="post">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="awal">Awal</label>
                                <input type="date" name="awal" class="form-control" id="awal" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="akhir">Akhir</label>
                                <input type="date" name="selesai" class="form-control" id="akhir" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col mt-2">
                            <button type="submit" class="btn btn-success mt-4">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->