<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok - Mohammad Raihan Bayuaji</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #f2f5f7;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #35A9DB;
            color: #fff;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 6px);
            padding: 6px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #35A9DB;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #307CAB;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }

        .message a {
            color: #35A9DB;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h2>Tambah Stok<br /> Mohammad Raihan Bayuaji</h2>
            <hr />
            <b>Tambah Data Baru</b>
        </div>

        <form action="tambah.php" method="post" name="form1">
            <table>
                <tr> 
                    <td>Kode</td>
                    <td><input type="text" name="id_barang" required></td>
                </tr>
                <tr> 
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" required></td>
                </tr>
                <tr> 
                    <td>Harga Barang</td>
                    <td><input type="text" name="harga_barang" required></td>
                </tr>
                <tr> 
                    <td>Stok Barang</td>
                    <td><input type="text" name="stok_barang" required></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="Submit" value="+ Tambahkan"></td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['Submit'])) {
            $id_barang = $_POST['id_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga_barang = $_POST['harga_barang'];
            $stok_barang = $_POST['stok_barang'];

            include "koneksi.php";

            $tambah_barang = "INSERT INTO barang (id_barang, nama_barang, harga_barang, stok_barang) VALUES ('$id_barang','$nama_barang', '$harga_barang', '$stok_barang')";
            $kerjakan = mysqli_query($konek, $tambah_barang);

            if($kerjakan) {
                echo "<div class='message'>Stok berhasil ditambahkan. <a href='index.php'>Lihat Stok</a></div>";
            } else {
                echo "<div class='message'>Maaf, proses tidak bisa dijalankan.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
