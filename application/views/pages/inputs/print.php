<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title; ?></title>
    <style>
        @media print {
            .btn-print a{
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card mt-3 border-0 shadow">
            <div class="card-header">
                <h4>Data Barang Masuk</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Pemasukan</th>
                            <th scope="col">Nama Staf</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Waktu Pemasukan</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $totalharga = 0;
                            foreach($barang_masuk as $masuk):
                            $barang = $this->db->get_where('barang',['id' => $masuk['id_barang']])->row();
                            $user = $this->db->get_where('user',['id' => $masuk['id_user']])->row();
                        ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $user->nama; ?></td>
                            <td><?= $barang->nama; ?></td>
                            <td><?= date('d F Y h:i:s', strtotime($masuk['waktu'])); ?></td>
                            <td><?= 'Rp.'. number_format($masuk['total_harga'], 2,',','.'); ?></td>
                        </tr>
                        <?php $totalharga += $masuk['total_harga']; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="fw-bold">Total Harga</td>
                            <td><?= 'Rp. ', number_format($totalharga, 2,',','.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-print">
                    <a href="<?= base_url(); ?>Inputs" class="btn btn-outline-danger">Kembali</a>
                    <a href="<?= base_url(); ?>Outputs/print_barang_masuk" class="btn btn-outline-success">Print</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>