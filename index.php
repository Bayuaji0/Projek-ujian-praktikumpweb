<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohammad Raihan Bayuaji</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heading {
            text-align: center;
            margin-top: 20px;
        }

        .table-container {
            margin-top: 20px;
        }

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #f2f5f7;
            margin-top: 20px;
        }

        .table1 th {
            background: #35A9DB;
            color: #fff;
            font-weight: bold;
            padding: 15px;
            text-align: left;
        }

        .table1 td, .table1 th {
            padding: 12px 20px;
            text-align: left;
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .options {
            text-align: center;
            margin-top: 20px;
        }

        .add-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #35A9DB;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #307CAB;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h2>Stok Barang <br /> Mohammad Raihan Bayuaji</h2>
            <hr />
            <a href="tambah.php" class="add-button">Tambah Stok Barang</a>
        </div>

        <div class="table-container">
            <b>Data Stok</b>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php 
                include "koneksi.php";
                $no = 1;
                $data = mysqli_query($konek, "select * from barang");
                while ($r = mysqli_fetch_array($data)) {
                    $id_barang = $r['id_barang'];
                    $nama_barang = $r['nama_barang'];
                    $harga_barang = $r['harga_barang'];
                    $stok_barang = $r['stok_barang'];
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $id_barang; ?></td>
                        <td><?php echo $nama_barang; ?></td>
                        <td><?php echo $harga_barang; ?></td>
                        <td><?php echo $stok_barang; ?></td>
                        <td align="right" width="70px"><a href="edit.php?id=<?php echo $id_barang; ?>" class="options">Edit</a></td>
                        <td align="right" width="70px"><a href="hapus.php?id=<?php echo $id_barang; ?>" class="options">Hapus</a></td>
                    </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
