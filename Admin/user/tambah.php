<?php
ob_start(); // Mulai buffer output

include "../../koneksi.php";
include "../dashboard/atas.php";

$role = isset($_GET['role']) ? $_GET['role'] : 'mahasiswa';

if (isset($_POST['submit'])) {
    $induk = $_POST['induk'];
    $nama = $_POST['nama'];
    $password = password_hash("0652PNJ", PASSWORD_DEFAULT);
    $username = str_replace(' ', '.', strtolower($nama));
    $kelamin = $_POST['kelamin'];
    $telp = $_POST['telp'];

    if ($role == 'dosen') {
        $email = $username . ".@tik.pnj.id";

        $sql = "INSERT INTO dosen (NIP, Email, Nama, JenisKel, Telp) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $induk, $email, $nama, $kelamin, $telp);
        $query = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    } else {
        $email = $username . ".tik22@mhsw.pnj.id";
        $semester = $_POST['semester'];
        $kelas = $_POST['kelas'];
        $prodi = $_POST['prodi'];
        $jurusan = $_POST['jurusan'];

        $sql = "INSERT INTO mahasiswa (NIM, Email, Nama, JenisKel, Semester, Kelas, Prodi, Jurusan, Telp) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $induk, $email, $nama, $kelamin, $semester, $kelas, $prodi, $jurusan, $telp);
        $query = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    $sqlUser = "INSERT INTO users (NomorInduk, Password, Nama, Role) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sqlUser);
    mysqli_stmt_bind_param($stmt, "ssss", $induk, $password, $nama, $role);
    $queryUser = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if ($query && $queryUser) {
        header('Location: index.php');
        exit();
    } else {
        echo "input data gagal";
    }
}

ob_end_flush(); // Flush buffer dan kirim output
?>
<div class="pagetitle">
    <h1>Tambah Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body">
                <?php
                if ($role == 'dosen') { ?>
                    <h5 class="card-title">Tambah Data Dosen</h5>

                    <!-- General Form Elements -->
                    <form action="tambah.php?role=dosen" method="post">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="induk">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telp">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-info rounded-pill ms-2 px-4">
                                Save
                            </button>
                        </div>
                    </form>
                <?php } else { ?>
                    <h5 class="card-title">Tambah Data Mahasiswa</h5>

                    <!-- General Form Elements -->
                    <form action="tambah.php" method="post">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="induk">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="semester">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="kelas">
                                    <option selected>Pilih Kelas</option>
                                    <?php 
                                        $query = "SELECT * FROM kelas"; 
                                        $hasil = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <option value="<?php echo $data['ID_kelas'] ?>"><?php echo $data['Nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prodi">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jurusan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telp">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-info rounded-pill ms-2 px-4">
                                Save
                            </button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
include '../dashboard/bawah.php';
?>