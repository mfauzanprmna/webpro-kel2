<?php
session_start();

if (!isset($_SESSION["nomorInduk"])) {
    header("Location: ../login");
    exit();
}
$nomorInduk = $_SESSION["nomorInduk"];
$kelas = isset($_COOKIE["kelas"]) ? $_COOKIE["kelas"] : '1';
$nama = isset($_COOKIE["nama"]) ? $_COOKIE["nama"] : 'user';
$role = isset($_COOKIE['role']) ? $_COOKIE['role'] : 'user';

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Room Management - Politeknik Negeri Jakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../dashboard/assets/img/favicon.png" rel="icon">
    <link href="../dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../dashboard/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 27 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php
        include 'head.php';
        include 'sidebar.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <?php
                include "../". $role . "/index.php";
            ?>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Kelompok 2 - Web Lanjut</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dashboard/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../dashboard/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../dashboard/assets/vendor/quill/quill.min.js"></script>
    <script src="../dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../dashboard/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../dashboard/assets/js/main.js"></script>

</body>

</html>