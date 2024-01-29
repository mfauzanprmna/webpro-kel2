<?php
include '../koneksi.php';

$query = "SELECT jadwal.*, dosenMatkul.ID AS ID_dosmat, ruangan.nama As Nama, ruangan.lokasi As Lokasi FROM jadwal 
INNER JOIN dosenMatkul ON dosenmatkul.ID = jadwal.ID_dosenMatkul
INNER JOIN ruangan ON ruangan.ID_ruangan = jadwal.ID_ruangan
INNER JOIN kelas ON dosenmatkul.ID_kelas = kelas.ID_kelas
WHERE kelas.ID_kelas = $kelas";

$hasil = mysqli_query($conn, $query);
$i = 1;

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM jadwal WHERE ID_jadwal = $id";
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
                <h2 class="card-title">Tabel Jadwal <?php $kelas ?></h2>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Dosen</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <?php
                                $id_dosmat = $data['ID_dosmat'];
                                $query = "SELECT dosenmatkul.ID AS ID, dosen.Nama AS NamaDosen, matkul.Nama AS Matkul, kelas.Nama AS Kelas FROM dosenmatkul
                                INNER JOIN dosen ON dosenmatkul.NIP = dosen.NIP
                                INNER JOIN matkul ON dosenmatkul.ID_matkul = matkul.ID_matkul
                                INNER JOIN kelas ON dosenmatkul.ID_kelas = kelas.ID_kelas WHERE dosenmatkul.ID = '$id_dosmat'";

                                $hasil = mysqli_query($conn, $query);
                                while ($dosmat = mysqli_fetch_array($hasil)) {
                                ?>
                                    <td><?php echo $dosmat['Matkul'] ?></td>
                                    <td><?php echo $dosmat['Kelas'] ?></td>
                                    <td><?php echo $dosmat['NamaDosen'] ?></td>
                                <?php } ?>
                                <td><?php echo $data['Hari'] ?></td>
                                <td><?php echo $data['Waktu'] ?></td>
                                <td><?php echo $data['Nama'] . ' - ' . $data['Lokasi'] ?></td>
                                <td><?php echo $data['Status'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
</div>