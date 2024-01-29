<?php
ob_start(); // Mulai buffer output

include "../../koneksi.php";
include '../dashboard/atas.php';

if (isset($_POST['submit'])) {
    $matkul = $_POST['matkul'];
    $ruangan = $_POST['ruangan'];
    $hari = $_POST['hari'];
    $waktu = $_POST['masuk'] . ' - ' . $_POST['keluar'];
    $status = 'OFFLINE';

    $sql = "INSERT INTO jadwal (ID_dosenMatkul, ID_ruangan, Hari, Waktu, Status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $matkul, $ruangan, $hari, $waktu, $status);
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
    <h1>Tambah Data Jadwal</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Jadwal</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Jadwal</h5>

                    <!-- General Form Elements -->
                    <form action="tambah.php" method="post">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Matkul</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="matkul">
                                    <option selected>Pilih Mata Kuliah</option>
                                    <?php
                                    $query = "SELECT dosenmatkul.ID AS ID, dosen.Nama AS NamaDosen, matkul.Nama AS Matkul, kelas.Nama AS Kelas FROM dosenmatkul
                                INNER JOIN dosen ON dosenmatkul.NIP = dosen.NIP
                                INNER JOIN matkul ON dosenmatkul.ID_matkul = matkul.ID_matkul
                                INNER JOIN kelas ON dosenmatkul.ID_kelas = kelas.ID_kelas";
                                    $hasil = mysqli_query($conn, $query);
                                    if (!$hasil) {
                                        die("Query error: " . mysqli_error($conn));
                                    }
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                        <option value="<?php echo $data['ID'] ?>"><?php echo $data['NamaDosen'] . ' - ' .  $data['Matkul'] . ' - ' . $data['Kelas']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Ruangan</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="ruangan">
                                    <option selected>Pilih Ruangan</option>
                                    <?php
                                    $query = "SELECT * FROM ruangan";
                                    $hasil = mysqli_query($conn, $query);
                                    if (!$hasil) {
                                        die("Query error: " . mysqli_error($conn));
                                    }
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                        <option value="<?php echo $data['ID_ruangan'] ?>"><?php echo $data['Nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Hari</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="hari">
                                    <option selected>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jam Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="masuk">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jam Keluar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keluar">
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