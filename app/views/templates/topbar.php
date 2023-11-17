<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <?php if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) { ?>
            <span class="btn btn-outline-success font-weight-bold">Selamat Datang <b class="text-danger"><?= ucwords($_SESSION['username']) ?></b></span>
            <?php } ?>
            <ul class="navbar-nav ml-auto">

                <?php if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a href="<?= BASEURL . 'auth/logout' ?>" class="btn btn-danger btn-flat"><i class="fa fa-lock-open"></i> Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?= BASEURL . 'auth' ?>" class="btn btn-success btn-flat"><i class="fa fa-lock"></i> Login</a>
                    </li>
                <?php } ?>
            </ul>

        </nav>
        <!-- End of Topbar -->