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
                                            <h3 class="text-center">Login Token</h3>
                                            <p class="text-center">Masukkan token untuk melanjutkan memilih.</p>
                                    </div>
                                    <div>
                                        <?php $error = $this->session->flashdata('error'); ?>
                                        <?php if ($error): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $error ?>
                                            </div>
                                        <?php endif; ?>

                                        <form action="" method="POST" class="my-3">
                                            <div class="input-group">
                                                <input type="text" id="id" name="id" class="form-control" placeholder="Masukkan token...." required />
                                                
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-login">Submit</button>
                                                </div>
                                            </div>
                                        </form>

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
