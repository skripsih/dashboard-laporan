<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #4CAF50!important">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <br>
            <br>
            <h5 style="font-size:70%; font-weight:bold;">Sistem Pendukung Keputusan Penerimaan Bantuan Sosial Tahunan Di Kecamatan Ambalawi Dengan Metode SAW</h5>
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <div class="sidebar-heading">
        DATA MASTER
    </div>
    <?php
    $url = explode('/', $_GET['url']);
    $active = '';
    $menuMaster = [
        [
            'menu' => 'Halaman Utama',
            'link' => 'dashboard',
            'icon' => 'fa fa-fw fa-tachometer-alt'
        ],

        [
            'menu' => 'Data Kriteria',
            'link' => 'kriteria',
            'icon' => 'fa fa-fw fa-tags'

        ],
        [
            'menu' => 'Data Alternatif',
            'link' => 'alternatif',
            'icon' => 'fa fa-fw fa-users'
        ],

        [
            'menu' => 'Penghitungan',
            'link' => 'hitung',
            'icon' => 'fa fa-fw fa-file-invoice'
        ],
        [
            'menu' => 'Data Users',
            'link' => 'users',
            'icon' => 'fa fa-fw fa-user-tie'

        ]
    ];




    foreach ($menuMaster as $m) {
        if($_SESSION['role'] != "pengelola" && $m['link'] != "dashboard"){
            continue;
        }else{
            if ($url[0] == $m['link']) {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        

    ?>
        <a class="nav-link pb-0" href="<?= BASEURL . $m['link'] ?>">
            <i class="<?= $m['icon'] ?>"></i>
            <span><?= $m['menu'] ?></span></a>
        </li>
    <?php } } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-3">
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <li class="nav-item <?= $url[0] == "laporan" ? "active" : "" ?>">
        <a class="nav-link pb-0" href="<?= BASEURL.'laporan' ?>">
            <i class="fa fa-file-alt"></i>
            <span>Penerima Bantuan</span></a>
    </li>
    </li>
    <hr class="sidebar-divider d-none d-md-block mt-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->