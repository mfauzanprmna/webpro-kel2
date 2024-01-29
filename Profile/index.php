<?php
include 'dashboard/atas.php';
include '../koneksi.php';
if ($role == 'dosen') {
  $sql = "SELECT * FROM dosen WHERE NIP = '$nomorInduk'";
} elseif ($role == 'mahasiswa') {
  $sql = "SELECT * FROM mahasiswa WHERE NIM = '$nomorInduk'";
}

$result = $conn->query($sql);
$data = $result->fetch_assoc();

?>
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body pt-4">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="user.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4><?php echo $data["Nama"] ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body pt-4">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $data["Nama"] ?>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">NIM</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $nomorInduk ?>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $data["Email"] ?>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Jenis Kelamin</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $data["JenisKel"] ?>
              </div>
            </div>

            <hr>
            <?php
            if ($role == 'mahasiswa') { ?>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Semester</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data["Semester"] ?>

                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Kelas</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  $kelas = $data["Kelas"];
                  $sql = "SELECT * FROM kelas WHERE ID_kelas = '$kelas'";
                  $result = $conn->query($sql);
                  $dataKelas = $result->fetch_assoc();

                  echo $dataKelas["Nama"]

                  ?>

                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Prodi</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data["Prodi"] ?>

                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Jurusan</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data["Jurusan"] ?>

                </div>
              </div>

              <hr>
            <?php } ?>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nomor Telepon</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $data["Telp"] ?>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include 'dashboard/bawah.php';
?>