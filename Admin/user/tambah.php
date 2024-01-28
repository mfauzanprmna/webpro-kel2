<?php
include "../../koneksi.php";

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kelamin = $_POST['kelamin'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $telp = $_POST['telp'];

    $sql = "INSERT INTO mahasiswa (NIM, Email, Nama, JenisKel, Semester, Kelas, Prodi, Jurusan, Telp) VALUES ('$nim', '$email', '$nama', '$kelamin', '$semester', '$kelas', '$prodi', '$jurusan', '$telp')";
    $query = mysqli_query($conn, $sql);

    $sqlUser = "INSERT INTO users (NomorInduk, Email, Password, Role) VALUES ('$nim', '$password', 'Mahasiswa')";
    $queryUser = mysqli_query($conn, $sqlUser);

    if ($query && $queryUser) {
        echo "Successfully";
    } else {
        echo "Tes";
    }
}