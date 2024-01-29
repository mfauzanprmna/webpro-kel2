<?php
include '../dashboard/atas.php';
include '../../koneksi.php';

$nip = isset($_GET['nip']) ? $_GET['nip'] : '0';

$query = "SELECT * FROM dosematkul WHERE nip = '$nip'";
$hasil = mysqli_query($conn, $query);
$i = 1;

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM dosenMatkul WHERE ID = $id";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        echo '<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        header('location:index.php');
        echo "<script>window.location.reload();</script>";
    } else {
        echo "Hapus Data Gagal";
    }
}

?>

<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Matkul</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $nip ?></td>
                                <?php
                                $query = "SELECT Nama FROM dosen WHERE nip = '$nip'";
                                $hasil = mysqli_query($conn, $query);
                                while ($dosen = mysqli_fetch_array($hasil)) {
                                ?>

                                    <td><?php echo $dosen['Nama'] ?></td>

                                <?php } ?>

                                <?php
                                $id_matkul = $data['ID_matkul'];
                                $query = "SELECT Nama FROM matkul WHERE ID_matkul = '$id_matkul'";
                                $hasil = mysqli_query($conn, $query);
                                while ($matkul = mysqli_fetch_array($hasil)) {
                                ?>

                                    <td><?php echo $matkul['Nama'] ?></td>

                                <?php } ?>
                                <?php
                                $id_kelas = $data['ID_kelas'];
                                $query = "SELECT Nama FROM kelas WHERE ID_kelas = '$id_kelas'";
                                $hasil = mysqli_query($conn, $query);
                                while ($kelas = mysqli_fetch_array($hasil)) {
                                ?>

                                    <td><?php echo $kelas['Nama'] ?></td>

                                <?php } ?>

                                <td>
                                    <a href="http://localhost/webprouas/admin/user/detail.php?hapus=<?php echo $data['ID'] ?>">
                                        <button type="button" class="btn btn-danger ms-2">
                                            Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
</div>


<?php
include '../dashboard/bawah.php';
?>