<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="http://localhost/webprouas/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <?php
        if ($role == 'admin') { ?>
            <li class="nav-heading">Master Data</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/user">
                <i class="ri-user-3-fill"></i>
                    <span>User</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/matkul/">
                    <i class="ri-book-2-fill"></i>
                    <span>Mata Kuliah</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/kelas/">
                    <i class="ri-briefcase-3-fill"></i>
                    <span>Kelas</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/ruangan">
                    <i class="ri-building-fill"></i>
                    <span>Ruangan</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/jadwal">
                    <i class="ri-calendar-2-line"></i>
                    <span>Jadwal</span>
                </a>
            </li><!-- End Dashboard Nav -->
        <?php } elseif ($role == 'mahasiswa')  {?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="http://localhost/webprouas/mahasiswa/ruangan">
                    <i class="bi bi-view-list"></i>
                    <span>Ruangan</span>
                </a>
            </li>
        <?php } else {?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="http://localhost/webprouas/dosen/ruangan">
                    <i class="bi bi-view-list"></i>
                    <span>Ruangan</span>
                </a>
            </li>
        <?php } ?>
    </ul>

</aside><!-- End Sidebar-->