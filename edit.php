<?php
include "koneksi.php";

if(isset($_POST['update'])) {   
    $id = $_POST['id'];

    $id_barang = $_POST['id_barang']; 
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stok_barang = $_POST['stok_barang'];

    $result = mysqli_query($konek, "UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', harga_barang='$harga_barang', stok_barang='$stok_barang' WHERE id_barang='$id'");

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        $update_error = "Update failed: " . mysqli_error($konek);
    }
}


$id = $_GET['id'];

$result = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang='$id'");

if ($result) {
    $r = mysqli_fetch_array($result);
    $id_barang = $r['id_barang'];
    $nama_barang = $r['nama_barang'];
    $harga_barang = $r['harga_barang'];
    $stok_barang = $r['stok_barang'];
} else {
    $fetch_error = "Query failed: " . mysqli_error($konek);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stok - Mohammad Raihan Bayuaji</title>
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
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
            color: #35A9DB;
            font-weight: bold;
        }

        .error {
            text-align: center;
            margin-top: 20px;
            color: #FF0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h2>Edit Stok <br /> Mohammad Raihan Bayuaji</h2>
            <hr />
            <b>Edit Data Barang</b>
        </div>

        <?php if(isset($fetch_error)) { ?>
            <div class="error"><?php echo $fetch_error; ?></div>
        <?php } ?>

        <form name="update_user" method="post" action="edit.php">
            <table>
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="id_barang" value="<?php echo $id_barang;?>"></td>
                </tr>
                <tr> 
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" value="<?php echo $nama_barang;?>"></td>
                </tr>
                <tr> 
                    <td>Harga Barang</td>
                    <td><input type="text" name="harga_barang" value="<?php echo $harga_barang;?>"></td>
                </tr>
                <tr> 
                    <td>Stok Barang</td>
                    <td><input type="text" name="stok_barang" value="<?php echo $stok_barang;?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>

        <?php if(isset($update_error)) { ?>
            <div class="error"><?php echo $update_error; ?></div>
        <?php } ?>

        <?php if(isset($result)) { ?>
            <div class="message">Stok berhasil diupdate. <a href='index.php'>Kembali ke Daftar Stok</a></div>
        <?php } ?>
    </div>
</body>
</html>

