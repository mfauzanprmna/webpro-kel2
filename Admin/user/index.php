<?php
include '../dashboard/atas.php';
include '../../koneksi.php';

$role = isset($_GET['role']) ? $_GET['role'] : 'mahasiswa';

if ($role == 'dosen') {
    $query = "SELECT * FROM dosen";
} else {
    $query = "SELECT mahasiswa.*, kelas.Nama AS Kelas FROM mahasiswa
    INNER JOIN kelas ON mahasiswa.kelas = kelas.ID_kelas";
}
$hasil = mysqli_query($conn, $query);
$i = 1;

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM tb_buku WHERE id_buku = $id";
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
    <h1>Master Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">
        <div class="d-flex justify-content-center mb-3">
            <a href="../../admin/user?role=mahasiswa">
                <button type="button" class="btn btn-info rounded-pill ms-2">
                    Mahasiswa
                </button>
            </a>
            <a href="../../admin/user?role=dosen">
                <button type="button" class="btn btn-info rounded-pill ms-2">
                    Dosen
                </button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tabel User</h2>
                    <div class="d-flex my-3">
                        <a href="../../admin/user/tambah.php?role=<?php echo $role ?>">
                            <button type="button" class="btn btn-success rounded-pill ms-2">
                                Tambah Data
                            </button>
                        </a>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <?php
                                if ($role == 'dosen') { ?>
                                    <th>No.</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telp</th>
                                    <th>Matkul</th>
                                <?php } else { ?>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Semester</th>
                                    <th>Kelas</th>
                                    <th>Prodi</th>
                                    <th>Jurusan</th>
                                    <th>Telp</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                                <tr>
                                    <?php if ($role == 'dosen') { ?>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $data['NIP'] ?></td>
                                        <td><?php echo $data['Nama'] ?></td>
                                        <td><?php echo $data['Email'] ?></td>
                                        <td><?php echo $data['JenisKel'] ?></td>
                                        <td><?php echo $data['Telp'] ?></td>
                                        <td>
                                            <a href="http://localhost/webprouas/admin/user/dosenMatkul.php?nip=<?php echo $data['NIP'] ?>">
                                                <button type="button" class="btn btn-warning ms-2">
                                                    Add
                                                </button>
                                            </a>
                                            <a href="http://localhost/webprouas/admin/user/detail.php?nip=<?php echo $data['NIP'] ?>">
                                                <button type="button" class="btn btn-success ms-2 mt-2">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                    <?php } else { ?>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $data['NIM'] ?></td>
                                        <td><?php echo $data['Nama'] ?></td>
                                        <td><?php echo $data['Email'] ?></td>
                                        <td><?php echo $data['JenisKel'] ?></td>
                                        <td><?php echo $data['Semester'] ?></td>
                                        <td><?php echo $data['Kelas'] ?></td>
                                        <td><?php echo $data['Prodi'] ?></td>
                                        <td><?php echo $data['Jurusan'] ?></td>
                                        <td><?php echo $data['Telp'] ?></td>
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