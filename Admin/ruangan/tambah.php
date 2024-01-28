<?php
include "../../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];
    $kapasitas = $_POST['kapasitas'];

    $sql = "INSERT INTO ruangan (ID_ruangan, Nama, Jenis, Lokasi, Kapasitas) VALUES ('$id', '$nama', '$jenis', '$lokasi', '$kapasitas')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Successfully";
    } else {
        echo "Tes";
    }
}