<?php
include '../dashboard/atas.php';
include '../../koneksi.php';


$query = "SELECT * FROM matkul";

$hasil = mysqli_query($conn, $query);
$i = 1;

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];

  $query = "DELETE FROM matkul WHERE ID_matkul = $id";
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
  <h1>Master Data Mata Kuliah</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active">Mata Kuliah</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">
    <div class="col-lg">

      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Tabel Mata Kuliah</h2>
          <div class="d-flex my-3">
            <a href="http://localhost/webprouas/admin/matkul/tambah.php">
              <button type="button" class="btn btn-success rounded-pill ms-2">
                Tambah Data
              </button>
            </a>
          </div>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $data['ID_matkul'] ?></td>
                  <td><?php echo $data['Nama'] ?></td>
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