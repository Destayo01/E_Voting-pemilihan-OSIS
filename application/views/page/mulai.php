<!DOCTYPE html>
<html>
<head>
    <title>Halaman Mulai</title>
    <?php $this->load->view('_partials/head.php'); ?>
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
                                    <a class="nav-link active" href="<?= site_url('page') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('page/home') ?>">Vote</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="au-card shadow-lg p-3 m-3">
                                <div class="card-body">  
                                    <div class="page-banner home-banner">
                                        <div class="row align-items-center flex-wrap-reverse h-100">
                                        <div class="col-md-6 py-5 wow fadeInLeft">
                                            <h1 class="mb-4">Ayo jadikan sekolahmu menjadi yang terbaik!</h1>
                                            <p class="text-lg text-grey mb-5">Pilih pemimpin yang terbaik untuk sekolah yang baik</p>
                                            <a href="<?= site_url('page/token') ?>" class="btn btn-primary btn-split">Vote now  <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="col-md-6 py-5 wow zoomIn">
                                            <div class="img-fluid text-center">
                                            <img src="<?= base_url('assets/tut.png') ?>" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Swiper Container -->
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                <!-- Kandidat Cards -->
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
</body>
</html>
