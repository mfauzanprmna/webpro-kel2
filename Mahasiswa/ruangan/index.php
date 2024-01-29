<?php
include '../dashboard/atas.php';
include '../../koneksi.php';


$query = "SELECT ruangan.*, jadwal.Waktu AS Waktu, jadwal.Status AS Status FROM ruangan
LEFT JOIN jadwal ON jadwal.ID_ruangan = ruangan.ID_ruangan";

$hasil = mysqli_query($conn, $query);
$i = 1;

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM ruangan WHERE ID_ruangan = $id";
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

<div class="pagetitle">
    <h1>Ruangan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Home</a></li>
            <li class="breadcrumb-item active">Ruangan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tabel Ruangan</h2>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Ruangan</th>
                                <th>Ruangan</th>
                                <th>Jenis Ruangan</th>
                                <th>Lokasi</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $data['ID_ruangan'] ?></td>
                                    <td><?php echo $data['Nama'] ?></td>
                                    <td><?php echo $data['Jenis'] ?></td>
                                    <td><?php echo $data['Lokasi'] ?></td>
                                    <td><?php echo $data['Kapasitas'] ?></td>

                                    <?php
                                    if ($data['Status'] == 'Offline') {
                                        date_default_timezone_set('Asia/Jakarta');
                                        $array_kata = explode(" ", $data['Waktu']);
                                        $awal = $array_kata[0];
                                        $akhir = $array_kata[1];
                                        $sekarang = date('H:i');

                                        if ($awal <= $sekarang && $akhir >= $sekarang) { ?>
                                            <td>
                                                <span class="badge bg-info text-dark">Sedang Digunakan</span>
                                            </td>

                                        <?php } else { ?>
                                            <td>
                                                <span class="badge bg-info text-dark">Tidak Digunakan</span>
                                            </td>
                                        <?php }
                                    } else { ?>
                                        <td>
                                            <span class="badge bg-info text-dark">Tidak Digunakan</span>
                                        </td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include '../dashboard/bawah.php';
?>