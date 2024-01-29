<?php
ob_start(); // Mulai buffer output

include '../dashboard/atas.php';
include '../../koneksi.php';

$nip = isset($_GET['nip']) ? $_GET['nip'] : '0';

$query = "SELECT dosenmatkul.*, dosen.Nama AS dosen, dosen.NIP AS NIP, matkul.Nama AS matkul, kelas.Nama AS kelas FROM dosenmatkul 
LEFT JOIN dosen ON dosen.NIP = dosenmatkul.NIP
LEFT JOIN matkul ON matkul.ID_matkul = dosenmatkul.ID_matkul 
LEFT JOIN kelas ON kelas.ID_kelas = dosenmatkul.ID_kelas 
WHERE dosenmatkul.NIP = '$nip'";
$hasil = mysqli_query($conn, $query);
$i = 1;


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM dosenMatkul WHERE ID = $id";
    $query = "DELETE FROM jadwal WHERE ID_dosenMatkul = $id";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        header('Location: index.php');
        exit();
    } else {
        echo "Hapus Data Gagal";
    }
}

ob_start(); // Mulai buffer output

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
                                <td><?php echo $data['NIP'] ?></td>
                                <td><?php echo $data['dosen'] ?></td>
                                <td><?php echo $data['matkul'] ?></td>
                                <td><?php echo $data['kelas'] ?></td>

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