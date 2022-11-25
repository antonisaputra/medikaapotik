<div class="container-fluid">
    
    <?php $this->load->view('layouts/_alert') ?>

    <div class="row" id="printBukti">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    Pengeluaran Obat Selesai
                </div>
                <div class="card-body">
                    <table class="table-responsive mb-3 no-wrap">
                        <tr>
                            <td>Nomor pengeluaran</td>
                            <td>:</td>
                            <td><?= $barang_keluar->id; ?></td>
                        </tr>
                        <tr>
                            <td>NIP Staff</td>
                            <td>:</td>
                            <td><?= $barang_keluar->id_user ?></td>
                        </tr>
                        <tr>
                            <td>Nama Staff</td>
                            <td>:</td>
                            <td><?= $user->nama ?></td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td><?= date('d/m/Y H:i:s', strtotime($barang_keluar->waktu)) ?></td>
                        </tr>
                    </table>
                    <p>Obat berhasil dikeluarkan & Stoknya berhasil dikurangi</p>
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th>Obat</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_barang as $barang) : ?>
                                <?php $barang2 = $this->db->get_where('barang',['id' => $barang->id_barang])->row();  ?>
                                <tr>
                                    <td>
                                        <strong><?= $barang2->nama ?></strong> / 
                                        <small><?= ucfirst(getUnitName($barang2->id_satuan)) ?></small>
                                    </td>
                                    <td class="text-center"><?= $barang->qty ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <a href="<?= base_url('items') ?>" class="btn btn-primary btn-rounded text-white"><i class="fas fa-angle-left"></i> List Obat</a>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <button class="btn btn-success btn-rounded float-right" onclick="printDiv('printBukti')">Cetak Bukti <i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>