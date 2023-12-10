<?php
include "koneksi.php";

$id = $_GET['id'];

$result = mysqli_query($konek, "DELETE FROM barang WHERE id_barang='$id'");

if (!$result) {
    die("Deletion failed: " . mysqli_error($konek));
}

header("Location: index.php");
?>
