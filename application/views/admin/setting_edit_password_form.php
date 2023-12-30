<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemilih</title>
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
                        <li>
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
                        <li class="active has-sub">
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
                                    <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="CoolAdmin" style="weidth:50px; height:50px"/>
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
                            <li>
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
                            <li class="active has-sub">
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
                                            <li class="list-inline-item">Edit password</li>
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
                                    <div class="card-header">
                                        <h2 class="title">Edit Password</h2>
                                    </div>

                                        <div class="au-card">
                                            <div class="card-body">
											<div class="card">
												<!-- Modified form based on the second code snippet -->
												<form action="" method="POST">
													<div class="form-group">
														<label for="password">Password Baru</label>
														<input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" value="<?= set_value("password") ?>" required/>
														<div class="invalid-feedback">
															<?= form_error('password') ?>
														</div>
													</div>
													<div class="form-group">
														<label for="password_confirm">Konfirmasi Password Baru</label>
														<input type="password" name="password_confirm" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : '' ?>" value="<?= set_value("password_confirm") ?>" required/>
														<div class="invalid-feedback">
															<?= form_error('password_confirm') ?>
														</div>
													</div>
											<div class="card-footer">
												<button type="submit" class="btn btn-primary btn-sm">
													<i class="fa fa-dot-circle-o"></i> Submit
												</button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <a href="<?= site_url('admin/setting') ?>" style="color: white; text-decoration: none;">
                                                            <i class="fa fa-ban"></i> Kembali
                                                        </a>
                                                    </button>
											</div>
												</form>
											</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->load->view('admin/_partials/footer.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

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
