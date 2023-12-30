<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemilihan Kandidat</title>
    <?php $this->load->view('_partials/head.php'); ?>
    <style>
        .swiper-container {
            width: 100%;
            padding: 20px;
        }
        .swiper-slide {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            width: 300px;

        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-10 mx-auto">
            <div class="au-card shadow-lg p-1 m-1">
                <div class="card-body">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url('assets/tut.png') ?>" alt="Logo" width="30" height="24" class="d-inline-block align-top">
                            SMK Assalafiyyah
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('page') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= site_url('page/home') ?>">Vote</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="au-card shadow-lg p-3 m-3">
                                <div class="card-body">
                                    <h3 class="card-title">Selamat Datang di Halaman Login</h3>
                                    <p class="card-text">Silakan Login Dulu sebelum Memilih.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="au-card shadow-lg p-3 m-3">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h3 class="text-center">Login Pemilih</h3>
                                            <p class="text-center">Masukkan NISN untuk masuk ke halaman pemilih.</p>
                                            <?php if ($this->session->flashdata('message_login_error')): ?>
                                                <div class="alert alert-danger">
                                                    <?= $this->session->flashdata('message_login_error') ?>
                                                </div>
                                            <?php endif ?>
                                            <form action="<?= site_url('Users/login') ?>" method="post" class="my-3">
                                                <div class="input-group">
                                                    <input type="text" name="nisn" class="form-control"
                                                        placeholder="Masukkan NISN"/>
                                                    
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-login">Login</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Tampilkan data pemilih jika NISN valid -->
                                            <?php if (isset($pemilih_data)): ?>
                                            <div class="mt-4">
                                                <h2>Data Pemilih:</h2>
                                                <p class="mb-2"><strong>NISN:</strong> <?= $pemilih_data['nisn'] ?></p>
                                                <p class="mb-2"><strong>Nama:</strong> <?= $pemilih_data['nama'] ?></p>
                                                <p class="mb-2"><strong>Kelas:</strong> <?= $pemilih_data['kelas'] ?></p>

                                                <?php
                                                $status = $pemilih_data['status'];

                                                if ($status == 'Belum Memilih') {
                                                    // Jika status belum memilih, arahkan ke halaman pemilihan
                                                    echo '<p class="mb-2"><strong>Status:</strong> Belum Memilih</p>';
                                                    echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                            <span class="badge badge-pill badge-success">Success</span>
                                                                Anda belum memilih, ayo memilih sekarang!!!
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>';
                                                    echo '<a href="' . site_url('page/home') . '" class="btn btn-success">Lanjutkan ke Halaman Pemilihan</a>';
                                                } else {
                                                    // Jika sudah memilih, berikan pesan
                                                    echo '<p class="mb-2"><strong>Status:</strong> Sudah Memilih</p>';
                                                    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                            <span class="badge badge-pill badge-danger">Success</span>
                                                                Anda sudah memilih dan tidak dapat mengakses halaman pemilihan lagi.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                          </div>';
                                                }
                                                ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
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

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
