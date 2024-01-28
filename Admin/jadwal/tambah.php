<?php
include "../../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $matkul = $_POST['id_matkul'];
    $ruangan = $_POST['ruangan'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $status = $_POST['status'];

    $sql = "INSERT INTO jadwal (ID_jadwal, ID_dosenMatkul, ID_ruangan, Hari, Waktu, Status) VALUES ('$id', '$matkul', '$ruangan', '$hari', '$waktu', '$status)";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Successfully";
    } else {
        echo "Tes";
    }
}