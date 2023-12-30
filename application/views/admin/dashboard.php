<!DOCTYPE html>
<html lang="en">

<head>
   <?php $this->load->view('_partials/head.php'); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                            <div class="image img-cir img-120">
                            <?php
                            $avatar = $current_user->avatar ?
                                base_url('upload/avatar/' . $current_user->avatar)
                                : get_gravatar($current_user->email)
                            ?>
                                <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" alt="John Doe" />
                            </div>
                            <h4 class="name"><?= htmlentities($current_user->name) ?></h4>
                            <a href="<?= site_url('auth/logout') ?>">Logout</a>
                        </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="<?= site_url('admin/dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/pemilih') ?>">
                                <i class="fas fa-chart-bar"></i>Tabel Pemilih
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/kandidat') ?>">
                                <i class="fas fa-shopping-basket"></i>Tabel Kandidat
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/kelas') ?>">
                                <i class="fas fa-trophy"></i>Tabel Kelas
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/hasil') ?>">
                                <i class="fas fa-copy"></i>Hasil pemilihan
                            </a>
                        </li>
                        <li>
                             <a href="<?= site_url('admin/setting') ?>">
                                <i class="fas fa-desktop"></i>Setelan
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                            <div class="image img-cir img-120">
                            <?php
                            $avatar = $current_user->avatar ?
                                base_url('upload/avatar/' . $current_user->avatar)
                                : get_gravatar($current_user->email)
                            ?>
                                <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" alt="John Doe" />
                            </div>
                            <h4 class="name"><?= htmlentities($current_user->name) ?></h4>
                            <a href="<?= site_url('auth/logout') ?>">Logout</a>
                        </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a href="<?= site_url('admin/dashboard') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pemilih') ?>">
                                    <i class="fas fa-chart-bar"></i>Tabel Pemilih
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/kandidat') ?>">
                                    <i class="fas fa-shopping-basket"></i>Tabel kandidat
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/kelas') ?>">
                                    <i class="fas fa-trophy"></i>Tabel kelas
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/hasil') ?>">
                                    <i class="fas fa-copy"></i>Hasil pemilihan
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/setting') ?>">
                                    <i class="fas fa-desktop"></i>Setelan
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Dashboard</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
 <!-- MAIN CONTENT-->
 <br>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-card">
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="au-card">
                                                <div class="card-body">
                                                    <h2 class="card-title number"><?= $jumlah_pemilih ?></h2>
                                                    <span class="desc card-text">Jumlah pemilih</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="au-card">
                                                <div class="card-body">
                                                    <h2 class="card-title number"><?= $jumlah_pemilih_sudah ?></h2>
                                                    <span class="desc card-text">Sudah memilih</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="au-card">
                                                <div class="card-body">
                                                    <h2 class="card-title number"><?= $jumlah_pemilih_belum ?></h2>
                                                    <span class="desc card-text">Belum memilih</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="au-card">
                                                <div class="card-body">
                                                    <h2 class="card-title number"><?= $jumlah_kandidat ?></h2>
                                                    <span class="desc card-text">Jumlah kandidat</span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="col-md-12 mb-4">
                                                <div class="au-card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Selamat Datang di Halaman Dashboard</h3>
                                                        <p class="card-text">Silakan ubahlah yang anda inginkan.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <br>
                                            <div class="col-md-6 mb-4">
                                                <div class="au-card recent-report">
                                                    <h3 class="title-2">Pemilihan 1</h3>
                                                    <div class="row chart-info">
                                                        <div class="recent-report__chart">
                                                            <canvas id="doughnutChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-xl-6">
                                            <div class="au-card">
                                                <h3 class="title-3">Task Progress</h3>
                                                <div class="au-skill-container">
                                                    <?php foreach ($percentage_votes as $label => $percentage) { ?>
                                                    <div class="au-progress">
                                                        <span class="au-progress__title"><?= $label ?></span>
                                                        <div class="au-progress__bar">
                                                            <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?= $percentage ?>">
                                                                <span class="au-progress__value js-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="au-card">
                                                <h3 class="title-3">Nama dari id kandidat</h3>
                                                <div class="au-skill-container">
                                                    <?php foreach ($kandidat as $k) { ?>
                                                        <div class="au-progress">
                                                            <span class="au-progress__title"><?= $k['id'] ?> : <?= $k['nama'] ?></span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <?php $this->load->view('admin/_partials/footer.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>

    </div>

    <script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');

    // Misalnya, $percentage_votes adalah array yang berisi persentase pemilihan untuk setiap kandidat
    var percentageVotesData = Object.values(<?= json_encode($percentage_votes); ?>);
    var labels = Object.keys(<?= json_encode($percentage_votes); ?>);

    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pemilihan by %',
                data: percentageVotesData,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.9)', // Merah
                    'rgba(0, 255, 0, 0.7)', // Hijau
                    'rgba(255, 255, 0, 0.5)', // Kuning
                    'rgba(0, 0, 255, 0.07)' // Biru
                ],
                hoverBackgroundColor: [
                    'rgba(255, 0, 0, 0.9)', // Merah
                    'rgba(0, 255, 0, 0.7)', // Hijau
                    'rgba(255, 255, 0, 0.5)', // Kuning
                    'rgba(0, 0, 255, 0.07)' // Biru
                ]
            }],
        },
    });
</script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Jquery JS-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('assets/') ?>vendor/slick/slick.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url('assets/') ?>js/main.js"></script>

</body>

</html>
<!-- end document-->
