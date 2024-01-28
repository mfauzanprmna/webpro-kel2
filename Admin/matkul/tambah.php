<?php
include "../../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $sql = "INSERT INTO ruangan (ID_matkul, Nama) VALUES ('$id', '$nama')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Successfully";
    } else {
        echo "Tes";
    }
}