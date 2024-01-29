<?php
ob_start(); // Mulai buffer output

include "../../koneksi.php";
include '../dashboard/atas.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $lokasi = $_POST['lokasi'];
    $kapasitas = $_POST['kapasitas'];

    $sql = "INSERT INTO ruangan (ID_ruangan, Nama, Jenis, Lokasi, Kapasitas) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $id, $nama, $jenis, $lokasi, $kapasitas);
    $query = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if ($query) {
        header('Location: index.php');
        exit();
    } else {
        echo "input data gagal";
    }
}

ob_end_flush(); // Flush buffer dan kirim output
?>

<div class="pagetitle">
    <h1>Tambah Data Ruangan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Ruangan</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Ruangan</h5>

                    <!-- General Form Elements -->
                    <form action="tambah.php" method="post">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">ID Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jenis Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Lokasi Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lokasi">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Kapasitas Ruangan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="kapasitas">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-info rounded-pill ms-2 px-4">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php
    include '../dashboard/bawah.php';
    ?>