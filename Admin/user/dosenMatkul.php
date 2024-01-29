<?php
ob_start(); // Mulai buffer output

include "../../koneksi.php";
include "../dashboard/atas.php";

$nip = isset($_GET['nip']) ? $_GET['nip'] : '0';

if (isset($_POST['submit'])) {

    $matkul = $_POST['matkul'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO dosenMatkul (NIP, ID_matkul, ID_kelas) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nip, $matkul, $kelas);
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

<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Matkul Dosen</h5>

                <!-- General Form Elements -->
                <form action="dosenMatkul.php?nip=<?php echo $nip ?>" method="post">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="matkul">
                                <option>Pilih Mata Kuliah</option>
                                <?php
                                    $query = "SELECT * FROM matkul"; 
                                    $hasil = mysqli_query($conn, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                ?>
                                <option value="<?php echo $data['ID_matkul'] ?>"><?php echo $data['Nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="kelas">
                                <option>Pilih Kelas</option>
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

<?php
include '../dashboard/bawah.php';
?>