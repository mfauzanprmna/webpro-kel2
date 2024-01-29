<?php
ob_start(); // Mulai buffer output

include "../../koneksi.php";
include '../dashboard/atas.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    $sql = "INSERT INTO kelas (Nama) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nama);
    $query = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    // $query = mysqli_query($conn, $stmt);

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
    <h1>Tambah Data Kelas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Kelas</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Kelas</h5>

                    <!-- General Form Elements -->
                    <form action="tambah.php" method="post">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" required>
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